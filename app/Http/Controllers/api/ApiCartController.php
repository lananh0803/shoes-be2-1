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

class ApiCartController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addnew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required', 
            'total_price' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $carts = new Cart($request->all());
        $carts->save();
        $cartItem = new CartItem();
        $cartItem->cart_id = $carts->id;
        $cartItem->product_id = $request->input('product_id');
        $cartItem->size = $request->input('size');
        $cartItem->qty = $request->input('quantity');
        $cartItem->price = $request->input('price') * $request->input('quantity');
        $cartItem->save();
        $carts->cartItems()->save($cartItem);
        return new ProductResource($carts);
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
