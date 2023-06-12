<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Product;

class ApiCartController extends Controller
{
    public function __construct()
    {
        // Những hàm không cần chứng thực bằng jwt
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('cartItems', 'products')->where('user_id', '=', $user->id)->get();
        return new ProductCollection($carts);
    }

    public function getUserCart(Request $request)
    {
        $id = auth()->user()->id;
        $cart = Cart::with('cartItems')->where('user_id', $id)->get();
        return response()->json($cart);
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

    public function addnew(Request $request)
    {
        $user_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'size' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $existingCart = Cart::where('user_id', $user_id)->first();
        $product = Product::find($request->product_id);

        if (is_null($existingCart)) {
            $carts = new Cart(['user_id' => $user_id, 'total_price' => 0]);
            $carts->save();
            $cartItem = new CartItem();
            $cartItem->cart_id = $carts->id;
            $cartItem->product_id = $request->product_id;
            $cartItem->size = $request->size;
            $cartItem->qty = $request->quantity;
            $cartItem->price = $product->price * $request->quantity;
            $cartItem->save();
            $carts->cartItems()->save($cartItem);
            return $cartItem;

        } else {
            $existingCartItem = CartItem::where('cart_id', '=', $existingCart->id)->where('product_id', '=', $request->product_id)->first();

            if (is_null($existingCartItem)) {
                $cartItem = new CartItem();
                $cartItem->cart_id = $existingCart->id;
                $cartItem->product_id = $request->product_id;
                $cartItem->size = $request->size;
                $cartItem->qty = $request->quantity;
                $cartItem->price = $product->price * $request->quantity;
                $cartItem->save();
                $existingCart->cartItems()->save($cartItem);
                return $existingCart;
            } else {
                $existingCartItem->qty = $existingCartItem->qty + $request->quantity;
                $existingCartItem->price = $product->price * $existingCartItem->qty;
                $existingCartItem->save();
                return $existingCartItem;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cartId)
    {
        $cart = Cart::with('cartItems')->find($cartId);
        if (is_null($cart)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return response()->json(
            $cart
        );
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $cart = Cart::find($request->id);
        if (is_null($cart)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        $cart->update($request->all());
        return new ProductResource($cart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($cartId)
    {
        $cart = Cart::with('cartItems')->find($cartId);
        if (is_null($cart)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        $cart->delete();
        return $cart->cartItems()->delete();
    }
}