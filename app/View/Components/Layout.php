<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $userExists = Auth::check();
        if($userExists){
            $user = Auth::user();
            $cartExists = Cart::where('user_id', '=', $user->id)->exists();
            if( $cartExists){
                $carts = Cart::with('cartItems','products')->where('user_id', '=', $user->id)->first();
                $qtyCart = $carts->cartItems->count();
                return view('components.layout',['brands' => $brands, 'categories' => $categories, 'qtyCart' => $qtyCart]);
            }      
            else{
                $qtyCart = 0;
                return view('components.layout',['brands' => $brands, 'categories' => $categories,'qtyCart' => $qtyCart]);
            }
        }        
       
    }
}
