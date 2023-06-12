<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
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

    public function getNewsProduct(Request $request)
    {
        $products = Product::with('productDetails', 'productImages', 'productComments')->orderBy('updated_at', 'DESC')->take(8)->get();
        return $products;
    }

    public function getHotsProduct(Request $request)
    {
        $products = Product::with('productDetails', 'productImages', 'productComments')->orderBy('rating', 'DESC')->take(10)->get();
        return $products;
    }


    public function getAll(Request $request)
    {
        $products = Product::with('productDetails', 'productImages', 'productComments')->orderBy('updated_at', 'DESC')->get();
        return $products;
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
        $product->product_images = $product->productImages;
        $product->product_details = $product->productDetails;
        $product->product_comments = $product->productComments;
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