<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cartExists = Cart::where('user_id', $user->id)->exists();
        if ($cartExists) {
            $carts = Cart::with('cartItems','products')->where('user_id', '=', $user->id)->first();
             return view('front.viewCart',['carts' => $carts]);
        }
        else{
            $carts = Cart::with('cartItems','products')->first();
            return view('front.viewCart');
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $carts = new Cart();
        $user = Auth::user();     
        $carts->user_id = $user->id;
        $carts = Cart::with('cartItems','products')->where('user_id', '=', $user->id)->first();  
        $cartItem = new CartItem();
        $cartExists = CartItem::where('product_id', $request->input('product_id'))
        ->where('size', $request->input('size'))
        ->exists();
        
        if($cartExists){
            $cartItem = CartItem::where('product_id', $request->input('product_id'))->first();
            $cartItem->cart_id = $carts->id;
            $cartItem->product_id = $request->input('product_id');
            $cartItem->size = $request->input('size');
            $cartItem->qty = ($cartItem->qty + $request->input('quantity'));
            $cartItem->price = ($request->input('price') * $cartItem->qty);
            $carts->cartItems()->save($cartItem);
           
        }
        else{
            $cartItem->cart_id = $carts->id;
            $cartItem->product_id = $request->input('product_id');
            $cartItem->size = $request->input('size');
            $cartItem->qty = $request->input('quantity');
            $cartItem->price = ($request->input('price') * $cartItem->qty);
            $carts->cartItems()->save($cartItem);
            
        }
      
        $total = $cartItem->sum('price');
        $carts->total_price = $total;
        $carts->save();
        return redirect()->route('productDetail.show',['id'=> $cartItem->product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $carts = Cart::find($request->input('cart_id'));
        $cartExists = CartItem::where('cart_id', $carts->id)
        ->exists();
        if($cartExists == false){
            $carts->delete();
        }   
        $cartItem = CartItem::find($id);
        $cartItem->delete($cartItem);
        $total = $cartItem->sum('price');
        $carts->total_price = $total;
        $carts->save();
        return redirect()->route('viewCart.index');
    }
}
