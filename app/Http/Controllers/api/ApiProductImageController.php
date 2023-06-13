<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;

class ApiProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImages = ProductImage::orderByDesc('id')->get();
        return new ProductCollection($productImages);
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
        return ProductImage::all();
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
            'product_id' => 'required',
            'path' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $productImage = new ProductImage($request->all());
        $productImage->save();
        return new ProductResource($productImage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productImageId)
    {
        $productImage = ProductImage::find($productImageId);
        if (is_null($productImage)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return response()->json(
            $productImage
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

        $productImage = ProductImage::find($request->id);
        if (is_null($productImage)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        $productImage->update($request->all());
        return new ProductResource($productImage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($productImageId)
    {
        $productImage = ProductImage::find($productImageId);
        if (is_null($productImage)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return $productImage->delete();
    }
}