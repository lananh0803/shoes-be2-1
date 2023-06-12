<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();

        $role = $user->roles->pluck('name')->toArray();
        foreach ($role as $v) {
            if ($v == 'Admin') {
                return redirect()->intended('admin');
            }
            if ($v == 'Customer') {
                $carts = Cart::where('user_id', $user->id)->first();
                if ($carts == null) {
                    $cart = new Cart();
                    $cart->user_id = $user->id;
                    $cart->total_price = 0;
                    $cart->save();
                    $cartExists = CartItem::where('cart_id', $cart->id)
                        ->exists();
                    if ($cartExists == false) {
                        $cart = Cart::find($cart->id);
                        $cart->user_id = $user->id;
                        $cart->total_price = 0;
                        $cart->save();
                    }
                } else {
                    $cartExists = CartItem::where('cart_id', $carts->id)
                        ->exists();
                    if ($cartExists == false) {
                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->total_price = 0;
                        $cart->save();
                    }
                }
                return redirect()->intended('/');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->first();
        if ($carts != null) {
            $cartExists = CartItem::where('cart_id', $carts->id)
                ->exists();
            if ($cartExists == false) {
                $carts->delete();
            }
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
