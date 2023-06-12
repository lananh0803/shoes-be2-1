<?php

namespace App\Http\Controllers\front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    //
    public function getProduct(){
        $productNews = Product::orderByDesc('id')->paginate(6);
        $productHots = Product::orderByDesc('qty')->paginate(7);
        return view('front.home', ['newProducts' => $productNews, 'hotProducts' => $productHots]);
    }
}
