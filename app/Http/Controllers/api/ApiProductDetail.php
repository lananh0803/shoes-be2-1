<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Validator;

class ApiProductDetail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productDetails = ProductDetail::orderByDesc('id')->get();
        return new ProductCollection($productDetails);
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
    public function getAll(Request $request)
    {
        return ProductDetail::all();
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
            'product_id'=> 'required|numeric|min:1',
            'size'=> 'required|numeric|min:30|max:50',
            'qty'=> 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $productDetail = new ProductDetail($request->all());
        $productDetail->save();
        return new ProductResource($productDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($producDetailtId)
    {
        $productDetail = ProductDetail::find($producDetailtId);
        if (is_null($productDetail)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return response()->json(
            $productDetail
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

        $productDetail = ProductDetail::find($request->id);
        if (is_null($productDetail)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        $productDetail->update($request->all());
        return new ProductResource($productDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($producDetailtId)
    {
        $productDetail = ProductDetail::find($producDetailtId);
        if (is_null($productDetail)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return $productDetail->delete();
    }
}
