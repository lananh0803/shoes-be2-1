<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('brand', 'productCategories')->orderByDesc('id')->paginate(5);
        return new ProductCollection($products);
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
        return Product::all();
    }
    public function addNew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required',
            'product_category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'required',
            'rating' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $product = new Product($request->all());
        $product->save();
        return new ProductResource($product);
    }


    public function show($productId)
    {
        $product = Product::find($productId);
        if (is_null($product)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }
        return response()->json(
            $product
        );
    }


    public function edit($id)
    {

    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $product = Product::find($request->id);
        if (is_null($product)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        $product->update($request->all());
        return new ProductResource($product);
    }


    public function delete($productId)
    {
        $product = Product::find($productId);
        if (is_null($product)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        return $product->delete();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::with('brand', 'productCategories')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orderByDesc('id')
            ->paginate(5);

        return new ProductResource($products);
    }
}