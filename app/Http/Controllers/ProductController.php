<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products = Product::with('brand','productCategories')->get();
        // return view('product.index', ['products' => $products]);
    }
    public function getAll()
    {
        $products = Product::with('brand','productCategories')->orderByDesc('id')->paginate(5);
        $nextPageUrl = $products->nextPageUrl();
        $previousPageUrl = $products->previousPageUrl();
        return view('product.index', ['products' => $products, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::all();
        $categories = ProductCategory::all();
        return view('product.create', ['brands' => $brands, 'categories' => $categories]);

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
            'brand_id'=> 'required',
            'product_category_id'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
            'content'=> 'required',
            'price'=> 'required',
            'qty'=> 'required',
            'discount'=> 'required',
            'rating'=> 'required'
        ]);

        $products = new Product($request->all());
        $products->save();
        return redirect()->route('products.getAll')->with('success','Added successFully');
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
        $products = Product::with('brand','productCategories')->find($id);
        $brands = Brand::where('id', '!=' , $id)->get();
        $categories = ProductCategory::where('id', '!=' , $id)->get();
        return view('product.edit', ['product' => $products,'brands' => $brands, 'categories' => $categories]);
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
        $request->validate([
            'brand_id'=> 'required',
            'product_category_id'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
            'content'=> 'required',
            'price'=> 'required',
            'qty'=> 'required',
            'discount'=> 'required',
            'rating'=> 'required'
        ]);
        $products = Product::find($id);
        $products->brand_id = $request->input('brand_id');
        $products->product_category_id = $request->input('product_category_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->content = $request->input('content');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->discount = $request->input('discount');
        $products->rating = $request->input('rating');
        $products->save();
        return redirect()->route('products.getAll',['id'=> $products->id])->with('success','Added successFully');
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
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('products.getAll')->with('success','Delete successFully');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::with('brand','productCategories')
        ->where('name', 'LIKE', '%' . $keyword . '%')
        ->orderByDesc('id')
        ->paginate(5);
        $nextPageUrl = $products->nextPageUrl();
        if ($nextPageUrl) {
            $nextPageUrl = $nextPageUrl . '&keyword=' . urlencode($keyword);
        }
        $previousPageUrl = $products->previousPageUrl();
        if ($previousPageUrl) {
            $previousPageUrl = $previousPageUrl . '&keyword=' . urlencode($keyword);
        }
        return view('product.search', ['products' => $products, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }
}
