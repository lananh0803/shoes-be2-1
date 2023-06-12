<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    public function getAll()
    {
        $productImages = ProductImage::with('product')->orderByDesc('id')->paginate(5);
        $nextPageUrl = $productImages->nextPageUrl();
        $previousPageUrl = $productImages->previousPageUrl();
        return view('productImage.index', ['productImages' => $productImages, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productImage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=> 'required',
            'path' => 'required'
        ]);
        //upload
        $file = $request->file('path');
        $fileName = time() . $file->getClientOriginalName();
        $path = 'productPhoto';
        $file->move($path,$fileName);

        $productImages = new ProductImage($request->all());
        $productImages->path = $fileName;
        $productImages->save();
        return redirect()->route('productImages.getAll')->with('success','Added successFully');
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
        $productImages = ProductImage::find($id);
        return view('productImage.edit', ['productImages' => $productImages]);
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
            'product_id'=> 'required',
            'path' => 'required'
        ]);
        //upload
        $file = $request->file('path');
        $fileName = time() . $file->getClientOriginalName();
        $path = 'productPhoto';
        $file->move($path,$fileName);

        $productImages = ProductImage::find($id);
        $productImages->path = $fileName;
        $productImages->save();
        return redirect()->route('productImages.getAll')->with('success','Added successFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productImages = ProductImage::find($id);
        $productImages->delete();
        return redirect()->route('productImages.getAll')->with('success','Delete successFully');
    }
}
