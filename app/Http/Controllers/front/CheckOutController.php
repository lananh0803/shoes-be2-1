<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        $cart = Cart::with('cartItems','products')->where('user_id' , $user->id)->first();
        return view('front.checkOut',['carts' => $cart]);
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
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'address'=> 'required',
            'city'=> 'required',
            'country'=> 'required',
            'phone'=> 'required',
            
        ]);
        $order = Order::create($request->only([
            'first_name', 'last_name', 'address', 'city', 'country', 'phone'
        ]));
        // $order->save();
        $orderDetails = [];
        $productIds = $request->input('product_id');
        $qtys = $request->input('qty');
        $sizes = $request->input('size');
        $prices = $request->input('price');
       
        for ($i = 0; $i < count($productIds); $i++) {
            $orderDetails[] = new OrderDetail([
                'order_id' => $order->id,
                'product_id' => $productIds[$i],     
                'size' => $sizes[$i],
                'qty' => $qtys[$i],
                'total' => $prices[$i],
            ]);
        }
        $order->orderDetails()->saveMany($orderDetails);
        $user = Auth::user();
        $cart = Cart::with('cartItems','products')->where('user_id' , $user->id)->first();
        $cart->delete();    
        $cart->cartItems()->delete();
        $cartExists = CartItem::where('cart_id', $cart->id)
        ->exists();
        if($cartExists == false){
            $carts = new Cart();
            $carts->user_id = $user->id;
            $carts->total_price = 0;
            $carts->save();
        }   
        return redirect()->route('home.getProduct');
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
    public function destroy($id)
    {
        //
    }
}
