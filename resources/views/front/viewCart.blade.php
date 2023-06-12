<x-layout>
    <main>
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">

                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-12">
                        <h1>GIỎ HÀNG</h1>
                        <div class="goods-page">
                            <div class="goods-data clearfix">
                                <div class="table-wrapper-responsive">
                                    <table summary="Shopping cart">
                                        <tr>
                                            <th class="goods-page-image">Image</th>
                                            <th class="goods-page-description">Name product</th>
                                            <th class="goods-page-description">Size</th>
                                            <th class="goods-page-quantity">Quantity</th>
                                            <th class="goods-page-price">Old price</th>
                                            <th class="goods-page-total" colspan="2">Total</th>
                                        </tr>
                                        
                                            @foreach ($carts->cartItems as $cartItem)
                                                <tr>
                                                    <td class="goods-page-image">
                                                        <a href="javascript:;"><img
                                                                src="./assert/img/sneaker_airforce1.jpg"
                                                                alt=""></a>
                                                    </td>
                                                    <td class="goods-page-description">
                                                        <h3><a href=""
                                                                style="text-decoration: none">{{ $cartItem->product->name }}</a>
                                                        </h3>

                                                    </td>
                                                    <td class="goods-page-size">
                                                        <h3>{{ $cartItem->size }}
                                                        </h3>

                                                    </td>
                                                    <td class="goods-page-quantity">
                                                        <div class="product-quantity">
                                                            <div class="input-number">
                                                                <input id="product-quantity" type="number"
                                                                    name="qty" value="{{ $cartItem->qty }}" readonly
                                                                    class="form-control input-sm">
                                                                <span id="qty-up" class="qty-up">+ </span>
                                                                <span id="qty-down" class="qty-down">-</span>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="goods-page-price">
                                                        <strong>{{  number_format($cartItem->product->price) }} đ</strong>
                                                    </td>
                                                    <input type="hidden" name="price" id="price" value="{{$cartItem->product->price}}">
                                                    <td class="goods-page-total" id="total-price">
                                                        <strong>{{number_format( ($cartItem->product->price * $cartItem->qty) )}} đ
                                                        </strong>
                                                    </td>
                                                    <input type="hidden" name="total" id="total" value="{{$cartItem->price}}">
                                                    <form method="POST" action="{{ route('viewCart.destroy',$cartItem->id)}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="cart_id" value="{{$carts->id}}">
                                                        <td class="del-goods-col">
                                                           <button class="delete"><i
                                                                        class="fa-solid fa-xmark"></i></button>
    
                                                        </td>
                                                    </form>
                                                   
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>


                                <div class="shopping-total">
                                    <ul>
                                        <li class="shopping-total-price">
                                            <em>Total</em>
                                            <strong class="price"><span></span>{{ number_format($carts->total_price) }} đ</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <a href="{{Route('productLists.new')}}"><button class="btn btn-default" type="submit">Continue shopping <i
                                        class="fa fa-shopping-cart"></i></button></a>
                            <a href="{{Route('checkouts.create')}}"><button class="btn btn-primary" type="submit">Checkout <i
                                        class="fa fa-check"></i></button></a>
                        </div>


                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END SIDEBAR & CONTENT -->
            </div>
            <!-- /container -->
        </div>
    </main>
</x-layout>
