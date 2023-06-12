<?php

namespace App\Http\Controllers\front;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //
    public function getProductNew()
    {
        $brands = Brand::all();
        $category = ProductCategory::all();
        $productNews = Product::orderByDesc('id')->paginate(9);
        $nextPageUrl = $productNews->nextPageUrl();
        $previousPageUrl = $productNews->previousPageUrl();
        return view('front.productList', ['newProducts' => $productNews,'categories' =>$category, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl, 'brands' => $brands]);
    }

    public function getProductOfBrand($id)
    {
        $category = ProductCategory::all();
        $brandProducts = Product::with('brand')->where('brand_id', '=', $id)->orderByDesc('id')->paginate(9);
        $brand = Brand::find($id);
        $nextPageUrl = $brandProducts->nextPageUrl();
        $previousPageUrl = $brandProducts->previousPageUrl();
        return view('front.productOfType', ['brandProducts' => $brandProducts, 'categories' => $category, 'brand' => $brand, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }
    public function getProductOfGander($id)
    {
        $brands = Brand::all();
        $categoryProducts = Product::with('brand')->where('product_category_id', '=', $id)->orderByDesc('id')->paginate(9);
        $category = ProductCategory::find($id);
        $nextPageUrl = $categoryProducts->nextPageUrl();
        $previousPageUrl = $categoryProducts->previousPageUrl();
        return view('front.productOfGander', ['categoryProducts' => $categoryProducts, 'brands'=> $brands , 'category' => $category, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }
    public function searchProduct(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->orderByDesc('id')
            ->paginate(9);
        $nextPageUrl = $products->nextPageUrl();
        if ($nextPageUrl) {
            $nextPageUrl = $nextPageUrl . '&keyword=' . urlencode($keyword);
        }
        $previousPageUrl = $products->previousPageUrl();
        if ($previousPageUrl) {
            $previousPageUrl = $previousPageUrl . '&keyword=' . urlencode($keyword);
        }
        return view('front.search', ['products' => $products, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }

}
