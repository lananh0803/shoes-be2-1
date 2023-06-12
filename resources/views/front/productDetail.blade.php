<x-layout>
    <main>
        <section class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slider product-main-img">
                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="slider product-imgs">
                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="{{ asset('fornt/img/logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="product-price">{{ $product->price }}đ <del
                                        class="product-old-price">$990.00</del></h3>
                            </div>

                            <form action="{{ route('viewCart.store')}}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" id="product" value="{{$product->id}}">
                                <input type="hidden" name="price" id="price" value="{{$product->price}}">
                                <div class="size-color clearfix">
                                    <div class="product-form product-size">
                                        <div class="row">
                                            <label
                                                class="font-weight-bold text-uppercase h6 mb-2 d-block col-12"></label>
                                            <div class="col-12">
                                                <ul
                                                    class="wapper_cb size d-flex flex-wrap justify-content-center justify-content-lg-start">
                                                    @foreach ($product->productDetails as $detail)
                                                        <li class="cb">
                                                            <label for="radio{{ $detail->size }}">
                                                                <input type="radio" data-id="{{ $detail->size }}"
                                                                    value="{{ $detail->size }}"
                                                                    id="radio{{ $detail->size }}" name="size"
                                                                    class="radio" checked="">
                                                                <div class="rd_in">{{ $detail->size }}</div>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                    <div class="clear"></div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div
                                    class="form-group d-block d-sm-flex align-items-sm-center justify-content-center justify-content-lg-start">
                                    <div class="product-form product-qty">
                                        <div class="product-form-group">
                                            <div class="number_price d-flex justify-content-center">
                                                <div class="custom input-number">
                                                    <button class="reduced items-count sub" type="button">-</button>

                                                    <input type="text" class="input-text qty" title="Qty"
                                                        min="1" maxlength="12" id="qty" name="quantity"
                                                        value="1" readonly="">

                                                    <button class="increase items-count add" type="button">+</button>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row m-0">
                                    <div id="message-box" class="col-12 p-0"></div>
                                    <div class="col-12 col-lg-6 p-0">
                                        <button
                                            class="ps-btn btn-add-cart d-block m-0 w-100 mb-10 text-center btn-pro-detail"
                                            data-action="addCart"><i class="fa-solid fa-cart-plus"></i> Thêm vào
                                            giỏ</button>
                                    </div>
                                    <div class="col-12 col-lg-6 p-0">
                                        <button
                                            class="ps-btn btn-buy-now d-block m-0 w-100 mb-10 text-center btn-pro-detail"
                                            data-action="buyNow"> Mua ngay <i
                                                class="fa-solid fa-arrow-right-to-bracket"></i></button>
                                    </div>
                                </div>
                            </form>
                           

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav nav-pills" id="pills-tab" role="tablist">
                                <li><a class="active" id="tab1" data-bs-toggle="pill" data-bs-target="#pills-tab1"
                                        type="button" role="tab" aria-controls="pills-tab1"
                                        aria-selected="true">Description</a></li>
                                <li><a class="" id="tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-tab2" type="button" role="tab"
                                        aria-controls="pills-tab2" aria-selected="false">Cotent</a></li>
                                <li><a class="" id="tab3" data-bs-toggle="pill"
                                        data-bs-target="#pills-tab3" type="button" role="tab"
                                        aria-controls="pills-tab3" aria-selected="false">Reviews ({{$product->productComments->count()}})</a></li>
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel"
                                    aria-labelledby="tab1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <div class="tab-pane fade" id="pills-tab2" role="tabpanel" aria-labelledby="tab2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{{ $product->content }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab2  -->

                                <!-- tab3  -->
                                <div class="tab-pane fade" id="pills-tab3" role="tabpanel" aria-labelledby="tab3">
                                    <div class="row">
                                        <!-- Rating -->
                                        <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span>{{ $percentage }}</span>
                                                    <div class="rating-stars">
                                                        @for ($i = 0; $i < $percentage; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $percentage; $i++)
                                                            <i class="fa fa-star-o"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <ul class="rating">
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div
                                                                style="width: {{ ($rating5 / $totalRatings) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <span class="sum">{{ $rating5 }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div
                                                                style="width: {{ ($rating4 / $totalRatings) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <span class="sum">{{ $rating4 }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div
                                                                style="width: {{ ($rating3 / $totalRatings) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <span class="sum">{{ $rating3 }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div
                                                                style="width: {{ ($rating2 / $totalRatings) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <span class="sum">{{ $rating2 }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div
                                                                style="width: {{ ($rating1 / $totalRatings) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                        <span class="sum">{{ $rating1 }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Rating -->

                                        <!-- Reviews -->
                                        <div class="col-md-6">
                                            <div id="reviews">
                                                <ul class="reviews">
                                                    @foreach ($comments as $comment)
                                                        <li>
                                                            <div class="review-heading">
                                                                <h5 class="name">{{ $comment->user->name }}</h5>
                                                                <p class="date">{{ $comment->created_at }}</p>
                                                                <div class="review-rating">
                                                                    @for ($i = 0; $i < $comment->rating; $i++)
                                                                        <i class="fa fa-star"></i>
                                                                    @endfor
                                                                    @for ($i = 0; $i < 5 - $comment->rating; $i++)
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endfor

                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>{{ $comment->content }}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                                <div class="store-filter clearfix">
                                                    <ul class="store-pagination">
                                                        @if ($previousPageUrl)
                                                            <li><a href="{{ $previousPageUrl }}"><i
                                                                        class="fa fa-angle-left"></i></a></li>
                                                        @endif
                                                        @if ($nextPageUrl)
                                                            <li><a href="{{ $nextPageUrl }}"><i
                                                                        class="fa fa-angle-right"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Reviews -->

                                        <!-- Review Form -->
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form" action="{{ route('comments.store') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="productId" id="productId"
                                                        value="{{ $product->id }}">
                                                    <textarea class="input" placeholder="Your Review" name="commentContent" required></textarea>
                                                    <div class="input-rating">
                                                        <span>Your Rating: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5"
                                                                type="radio"><label for="star5"></label>
                                                            <input id="star4" name="rating" value="4"
                                                                type="radio"><label for="star4"></label>
                                                            <input id="star3" name="rating" value="3"
                                                                type="radio"><label for="star3"></label>
                                                            <input id="star2" name="rating" value="2"
                                                                type="radio"><label for="star2"></label>
                                                            <input id="star1" name="rating" value="1"
                                                                type="radio"><label for="star1" required></label>
                                                        </div>
                                                    </div>
                                                    <button class="primary-btn">Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /Review Form -->
                                    </div>
                                </div>
                                <!-- /tab3  -->
                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-related" id="product-hot">
            <div class="container-product">
                <div class="product-new-tittle">
                    <h3>SẢN PHẨM LIÊN QUAN</h3>
                </div>
                <div class="product-list">

                    <div class="owl-carousel owl-theme">
                        @foreach ($relates as $relate)
                            <div class="item">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ asset('fornt/img/sneaker_airforce1.jpg') }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-{{ $relate->rating }}%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">{{ $relate->name }}</a></h3>
                                        <h4 class="product-price">{{ $relate->price }} đ <br> <del
                                                class="product-old-price">3,300,000
                                                đ</del></h4>
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

</x-layout>
