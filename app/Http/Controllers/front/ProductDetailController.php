<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    //
    public function show($id){
        $product = Product::with('productDetails','productComments')->find($id);
        $comment = ProductComment::where('product_id', '=', $product->id)->paginate(3);
        $relate = Product::where('brand_id', '=', $product->brand_id)->paginate(6);
        $nextPageUrl = $comment->nextPageUrl();
        $previousPageUrl = $comment->previousPageUrl();
        $totalRatings = $comment->count();
        $positiveRatings = $comment->where('rating', '>=', 4)->count();
       
        if($totalRatings > 0){
            $rating1 =  $positiveRatings = $comment->where('rating', '=', 1)->count();
            $rating2 =  $positiveRatings = $comment->where('rating', '=', 2)->count();
            $rating3 =  $positiveRatings = $comment->where('rating', '=', 3)->count();
            $rating4 =  $positiveRatings = $comment->where('rating', '=', 4)->count();
            $rating5 =  $positiveRatings = $comment->where('rating', '=', 5)->count();
            $percentage = 5 * (($positiveRatings / $totalRatings));
        }
        else{
            $totalRatings = 1;
            $rating1 =  0;
            $rating2 =  0;
            $rating3 =  0;
            $rating4 =  0;
            $rating5 =  0;
            $percentage = 0;
        }
      
        return view('front.productDetail', ['product' => $product, 'comments' => $comment, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl, 'relates' => $relate ,'percentage' => $percentage, 'totalRatings' => $totalRatings,'rating1' => $rating1,'rating2' => $rating2,'rating3' => $rating3,'rating4' => $rating4,'rating5' => $rating5]);
    }
   
}
