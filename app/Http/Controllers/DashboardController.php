<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function statistical(){
        $user = User::count();
        $product = Product::count();
        $order = Order::count();
        $orderDetail = OrderDetail::sum('total');
        return view('back.index', ['user' => $user, 'product' => $product,'order' => $order,'orderDetail' => $orderDetail]);
        
    }
}
