<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Validator;

class ApiCheckOut extends Controller
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
    public function getAll(Request $request)
    {
        $order = Order::with('orderDetails')->get();
        return $order;
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
    public function addNew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required', 
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $order = new Order($request->all());
        $order->save();
        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $order->id;
        $orderDetail->product_id = $request->input('product_id');
        $orderDetail->size = $request->input('size');
        $orderDetail->qty = $request->input('quantity');
        $orderDetail->total = $request->input('price') * $request->input('total');
        $orderDetail->save();
        $order->orderDetails()->save($orderDetail);
        return new ProductResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = Order::with('orderDetails')->find($orderId);
        if (is_null($order)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return response()->json(
            $order
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

        $order = Order::with('orderDetails')->find($request->id);
        if (is_null($order)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        $order->update($request->all());
        return new ProductResource($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($orderId)
    {
        $order = Order::with('orderDetails')->find($orderId);
        if (is_null($order)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        $order->delete();
        return $order->orderDetails()->delete();
    }
}
