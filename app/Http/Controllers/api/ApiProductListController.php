<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductListController extends Controller
{
    //
    public function getProductListFilte(Request $request)
    {
        $arrBrandId = $request->arrBrandId;
        $arrCategoryId = $request->arrCategoryId;
        $page = $request->page; // Get the current page number
        $sortValue = $request->sortValue;
        if($sortValue == 0){
            if(count($arrCategoryId) > 0) {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderByDesc('id')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderByDesc('id')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            } else {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->orderByDesc('id')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->orderByDesc('id')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            }
        }
        if($sortValue == 1){
            if(count($arrCategoryId) > 0) {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderBy('name', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderBy('name', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            } else {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->orderBy('name', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->orderBy('name', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            }
        }
        if($sortValue == 2){
            if(count($arrCategoryId) > 0) {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderByDesc('name')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderByDesc('name')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            } else {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->orderByDesc('name')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->orderByDesc('name')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            }
        }
        if($sortValue == 3){
            if(count($arrCategoryId) > 0) {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->whereIn('products.product_category_id', $arrCategoryId)
                         ->orderByDesc('price')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.product_category_id', $arrCategoryId)
                         ->orderByDesc('price')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            } else {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                         ->orderByDesc('price')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                         ->orderByDesc('price')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            }
        }
        

        if($sortValue == 4){
            if(count($arrCategoryId) > 0) {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderBy('price', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.product_category_id', $arrCategoryId)
                        ->orderBy('price', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            } else {
                if (count($arrBrandId)) {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->whereIn('products.brand_id', $arrBrandId)
                        ->orderBy('price', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                } else {
                    $products = Product::distinct('products.id')
                        ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.discount')
                        ->orderBy('price', 'asc')
                        ->paginate(9, ['*'], 'page', $page); // Apply pagination to the query
                }
            }
        }
        

        return $products; // Trả về dữ liệu dạng JSON nếu là yêu cầu AJAX

    }

}
