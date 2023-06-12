<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $orders = Order::with('orderDetails')->get(); 
        // return view('order.index',['orders' => $orders]);
    }
    public function getAll()
    {
        $orders = Order::with('orderDetails')->orderByDesc('id')->paginate(10); 
        $nextPageUrl = $orders->nextPageUrl();
        $previousPageUrl = $orders->previousPageUrl();
        return view('order.index',['orders' => $orders, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl] );

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
        $orders = Order::with('orderDetails')->find($id); 
        return view('order.edit',['orders' => $orders]);
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
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'address'=> 'required',
            'city'=> 'required',
            'country'=> 'required',
            'phone'=> 'required',
            // 'node'=> 'required'
        ]);
        $orders = Order::find($id);      
        $orders->first_name = $request->input('first_name');
        $orders->last_name = $request->input('last_name');
        $orders->address = $request->input('address');
        $orders->city = $request->input('city');
        $orders->country = $request->input('country');
        $orders->phone = $request->input('phone');
        $orders->node = $request->input('node');
        $orders->save();
        $orderDetail = OrderDetail::where('order_id', '=', $orders->id)->first();
        $orderDetail->product_id = $request->input('product_id');
        $orderDetail->qty = $request->input('qty');
        $orderDetail->total = $request->input('total');
        $orders->orderDetails()->save($orderDetail);
        return redirect()->route('orders.getAll',['id'=> $orders->id])->with('success','Added successFully');
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
        $orders = Order::find($id);
        $orders->delete();
        $orderDetail = OrderDetail::where('order_id', '=', $orders->id)->first();
        $orders->orderDetails()->delete($orderDetail);
        return redirect()->route('orders.getAll')->with('success','Delete successFully');
    }
}
