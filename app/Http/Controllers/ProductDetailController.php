<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
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
    public function getAll()
    {
        $productDetails = ProductDetail::with('product')->orderByDesc('id')->paginate(5);
        $nextPageUrl = $productDetails->nextPageUrl();
        $previousPageUrl = $productDetails->previousPageUrl();
        return view('productDetail.index',['productDetails'=> $productDetails, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productDetail.create');
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
            'product_id'=> 'required|numeric|min:1',
            'size'=> 'required|numeric|min:30|max:50',
            'qty'=> 'required|numeric|min:0',
        ]);

        $productDetails = new ProductDetail($request->all());
        $productDetails->save();
        return redirect()->route('productDetails.getAll')->with('success','Added successFully');
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
        $productDetails = ProductDetail::with('product')->find($id);
        return view('productDetail.edit', ['productDetail' => $productDetails]);
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
            'product_id'=> 'required|numeric|min:1',
            'size'=> 'required|numeric|min:30|max:50',
            'qty'=> 'required|numeric|min:0',
        ]);

        $productDetails = ProductDetail::find($id);
        $productDetails->product_id = $request->input('product_id');
        $productDetails->size = $request->input('size');
        $productDetails->qty = $request->input('qty');
        $productDetails->save();
        return redirect()->route('productDetails.getAll',['id'=> $productDetails->id])->with('success','Added successFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDetails = ProductDetail::find($id);
        $productDetails->delete();
        return redirect()->route('productDetails.getAll')->with('success','Delete successFully');
    }
}
