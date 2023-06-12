<x-layout>
    <main>
        <section class="store">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{Route('home.getProduct')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">LOẠI</h3>
                            <div class="checkbox-filter">
                                @foreach ($brands as $brand)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-{{$brand->id}}" name="brands" value="{{$brand->id}}">
                                    <label for="brand-{{$brand->id}}">
                                        <span></span>
                                        {{$brand->name}}
                                        <small>({{$brand->products->count()}})</small>
                                    </label>
                                </div>
                                @endforeach                        
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">GIỚI TÍNH</h3>
                            <div class="checkbox-filter">
                                @foreach ($categories as $category)                                                         
                                <div class="input-checkbox">
                                    <input type="checkbox" id="gender-{{$category->id}}" name="categories" value="{{$category->id}}">
                                    <label for="gender-{{$category->id}}">
                                        <span></span>
                                        {{$category->name}}
                                        <small>({{$category->products->count()}})</small>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">SẮP XẾP THEO</h3>
                            <div class="radio-filter">
                                <div class="input-radio">
                                    <input type="radio" id="name-1" name="arrange" value="1">
                                    <label for="name-1">
                                        <span></span>
                                        Tên A-Z
                                    </label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" id="name-2" name="arrange" value="2">
                                    <label for="name-2">
                                        <span></span>
                                        Tên Z-A
                                    </label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" id="price-1" name="arrange" value="3">
                                    <label for="price-1">
                                        <span></span>
                                        Giá cao đến thấp
                                    </label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" id="price-2" name="arrange" value="4">
                                    <label for="price-2">
                                        <span></span>
                                        Giá thấp đến cao
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="store" class="col-md-9">
                        <div class="product-list">
                            <div class="row" id="product-list">
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
                                            <h4 class="product-price"> @if($newProduct->discount > 0)
                                                {{number_format($newProduct->price - ($newProduct->price * $newProduct->discount / 100))}} đ 
                                                @else
                                                {{number_format($newProduct->price)}} đ 
                                                @endif
                                                <br> 
                                                    @if($newProduct->discount > 0)
                                                        <del
                                                        class="product-old-price">{{number_format($newProduct->price)}}  đ</del>
                                                    @endif
                                                </h4>
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
                </div>
                <div class="store-filter clearfix">
                    <ul class="store-pagination">
                        @if ($previousPageUrl)
                        <li ><a href="{{$previousPageUrl}}" class="prev-btn"><i class="fa fa-angle-left"></i></a></li>
                        @endif
                        @if ($nextPageUrl)
                        <li><a href="{{$nextPageUrl}}" class="next-btn"><i class="fa fa-angle-right"></i></a></li>
                        @endif
                    </ul>
                </div>
        </section>
    </main>
</x-layout>