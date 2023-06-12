<x-layout>
    <main>
        <!-- Banner -->
        <section class="banner-bg">
            <div class="container-banner">
                <div class="banner">
                    <div class="left">
                        <h2>Bata Shoes</h2>
                        <h1>Series 7</h1>
                        <p class="price">Giá chỉ 2.400.000VND</p>
                        <p class="text">Với giá cực rẻ bạn đã sở hữu ngay đôi giày siêu đẹp này rồi.
                            Còn chờ gì nửa thêm vào giỏ hàng ngay thôi.
                        </p>
                       
                    </div>
                    <div class="right">
                        <div class="bg"></div>
                        <div class="img">
                            <img src="{{ asset('fornt/img/banner.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features -->
        <section class="features">
            <div class="container-features">
                <div class="row">
                    <div class="col col-md-4">
                        <div class="ps-iconbox">
                            <i class="fa-regular fa-credit-card"></i>
                            <h3>Cam Kết chính hãng</h3>
                            <p class="content-text">100 % Authentic</p>
                        </div>
                        <div class="ps-iconbox-content">
                            <p>Cam kết sản phẩm chính hãng từ Châu Âu, Châu Mỹ...</p>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="ps-iconbox">
                            <i class="fa-solid fa-truck-fast"></i>
                            <h3>Giao hàng hỏa tốc</h3>
                            <p class="content-text">Express delivery</p>
                        </div>
                        <div class="ps-iconbox-content">
                            <p>SHIP hỏa tốc 1h nhận hàng trong nội thành HCM</p>
                        </div>
                    </div>
                    <div class="col col-md-4 ">
                        <div class="ps-iconbox">
                            <i class="fa-solid fa-phone"></i>
                            <h3>Hỗ trợ 24/24</h3>
                            <p class="content-text">Supporting 24/24</p>
                        </div>
                        <div class="ps-iconbox-content">
                            <p>Gọi ngay <a href="tel:"></a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-new" id="product-new">
            <div class="container-product">
                <div class="product-new-tittle">
                    <a href="{{Route('productLists.new')}}"><h3>Sản phẩm mới</h3></a>
                </div>
                <div class="product-list">
                    <div class="row">
                      @foreach ($newProducts as $newProduct)                                           
                        <div class="col col-md-4 col-sm-6 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{ asset('fornt/img/sneaker_airforce1.jpg')}}" alt="">
                                    <div class="product-label">
                                        <span class="sale">-{{$newProduct->discount}}%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="{{ route('productDetail.show', $newProduct->id) }}">{{ substr($newProduct->name,0,25)}}...</a></h3>
                                    <h4 class="product-price">@if($newProduct->discount > 0)
                                        {{number_format($newProduct->price - ($newProduct->price * $newProduct->discount / 100))}} đ 
                                        @else
                                        {{number_format($newProduct->price)}} đ 
                                        @endif
                                        <br> 
                                            @if($newProduct->discount > 0)
                                                <del
                                                class="product-old-price">{{number_format($newProduct->price)}}  đ</del>
                                            @endif</h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                       
                        @endforeach                         
                    </div>
                </div>
            </div>
        </section>

        <section class="product-hot" id="product-hot">
            <div class="container-product">
                <div class="product-new-tittle">
                    <h3>SẢN PHẨM BÁN CHẠY</h3>
                </div>
                <div class="product-list">
                    <div class="owl-carousel owl-theme">
                        @foreach ($hotProducts as $hotProduct)                                             
                        <div class="item">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{ asset('fornt/img/sneaker_airforce1.jpg')}}" alt="">
                                    <div class="product-label">
                                        <span class="sale">-{{$hotProduct->discount}}%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="{{ route('productDetail.show', $newProduct->id) }}">{{ substr($hotProduct->name,0,25)}}...</a></h3>
                                    <h4 class="product-price">@if($hotProduct->discount > 0)
                                        {{number_format($hotProduct->price - ($hotProduct->price * $hotProduct->discount / 100))}} đ 
                                        @else
                                        {{number_format($hotProduct->price)}} đ 
                                        @endif
                                        <br> 
                                            @if($hotProduct->discount > 0)
                                                <del
                                                class="product-old-price">{{number_format($hotProduct->price)}}  đ</del>
                                            @endif</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <a href="#" class="cd-top text-replace js-cd-top"></a>
</x-layout>