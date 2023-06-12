<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('fornt/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fornt/sass/index.css')}}">
    <link rel="stylesheet" href="{{ asset('fornt/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('fornt/fontawesome-free-6.1.1-web//css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fornt/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fornt/owlcarousel/assets/owl.theme.default.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('fornt/owlcarousel/owl.carousel.min.js')}}"></script>

     <!-- Slick -->
     <link type="text/css" rel="stylesheet" href="{{ asset('fornt/css/slick.css')}}" />
     <link type="text/css" rel="stylesheet" href="{{ asset('fornt/css/slick-theme.css')}}" />

         <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('fornt/css/nouislider.min.css')}}" />
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navigation">
            <div class="container-nav">
                <!-- Navigation-left -->
                <div class="navigation-column left">
                    <div class="header-logo"><a class="ps-logo" href="{{Route('home.getProduct')}}"><img src="{{ asset('fornt/img/logo.png')}}"></a></div>
                </div>
                <!-- Navigation-center -->
                <div class="navigation-column center">
                    <ul class="main-menu menu">
                        <li class="menu-item "><a href="{{Route('home.getProduct')}}" >TRANG CHỦ</a></li>
                        <li class="menu-item "><a href="#product-new" >SẢN PHẨM MỚI</a></li>
                        <li class="menu-item "><a href="#product-hot" >BÁN CHẠY</a></li>
                        <li class="menu-item menu-dropdown "><a href="">GIỚI TÍNH</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category) 
                                <li><a href="{{Route('productLists.category', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- <i class="ti-angle-down"></i> -->
                        <li class="menu-item menu-dropdown "><a href="">Loại</a>
                            <ul class="sub-menu">
                                @foreach ($brands as $brand)   
                                <li><a href="{{Route('productLists.brand', $brand->id)}}">{{$brand->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Navigation-right -->
                <div class="navigation-column right">
                    
                    <form class="ps-search searchform" id="searchform" method="get" action="{{Route('productsList.search')}}">
                        <input type="search" class="form-cnt inputString" autocomplete="off" name="keyword" id="inputString"
                            placeholder="Nhập từ cần tìm">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <button id="btnSearch" type="button" class=""><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div class="ps-cart" id="reloaddiv">
                        <a class="ps-cart-toggle" rel="noindex nofollow" href="{{Route('viewCart.index')}}">
                            <span><i class="numberSumProduct">{{$qtyCart}}</i></span>
                            <i class="fa-solid fa-cart-plus"></i>
                        </a>
                    </div>
                    <div class="menu-toggle"><i class="fa-solid fa-bars"></i></div>

                    <ul class="header-links pull-right">
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa-solid fa-lock"></i>
                                        My account
                                </a>
                                <div class="noidung_dropdown">
                                    <a href="">Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();"><i
                                                class="fa fa-sign-out"></i> Logout</a>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Sidebar -->
    <div class="header-sidebar">
        <div class="sidebar-container">
            <div class="sidebar-close "><i class="ti-close"></i></div>
            <form class="ps-search searchform" id="searchform" method="get" action="">
                <input class="form-cnt inputString" autocomplete="off" name="search" id="inputString"
                    placeholder="Nhập từ cần tìm">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="main-menu menu">
                <li class="menu-item "><a href="#">TRANG CHỦ</a></li>
                <li class="menu-item "><a href="#product-new">SẢN PHẨM MỚI</a></li>
                <li class="menu-item "><a href="#product-hot">BÁN CHẠY</a></li>
                <li class="menu-item menu-dropdown gender">GIỚI TÍNH <i class="ti-angle-down"></i>
                    <ul class="sub-menu sub-gender">
                        <li><a href="productOfGander.html">NAM</a></li>
                        <li><a href="productOfGander.html">NỮ</a></li>
                    </ul>
                </li>
                <!-- <i class="ti-angle-down"></i> -->
                <li class="menu-item menu-dropdown type">Loại <i class="ti-angle-down"></i>
                    <ul class="sub-menu sub-type">
                        <li><a href="productOfType.html">NIKE</a></li>
                        <li><a href="productOfType.html">ADDIAS</a></li>
                        <li><a href="productOfType.html">JORDAN</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>

    <!-- Main -->
  
    {{ $slot }}

    <!-- Footer -->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img class="img-fluid w-50 h-50" src="{{ asset('fornt/img/logo_ft.png')}}" alt="">
                <p class="pt-3">Hãy đến với Shoe Store nơi bạn tìm thấy đam mê của chính mình. Vào đặt hàng ngay để có
                    những đôi giày hợp với phong cách của bạn</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase list-unstyled">
                    <li><a href="{{Route('home.getProduct')}}">TRANG CHỦ</a></li>
                    <li><a href="#product-new">SẢN PHẨM MỚI</a></li>
                    <li><a href="#product-hot">BÁN CHẠY NHẤT</a></li>
                    <li><a href="#">NIKE</a></li>
                    <li><a href="#">ADDIAS</a></li>
                    <li><a href="#">JORDAN</a></li>
                </ul>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>42A Đường An Bình, Phường An Bình, Thành Phố Dĩ An, Tỉnh Bình Dương</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>0968673591</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>shoes117@gmail.com</p>

                </div>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-12 mb-4">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img class="img-fluid w-50 h-100 m-2" src="{{ asset('fornt/img/slider1.png')}}" alt="">
                    <img class="img-fluid w-50 h-100 m-2" src="{{ asset('fornt/img/slider2.png')}}" alt="">
                    <img class="img-fluid w-50 h-100 m-2" src="{{ asset('fornt/img/slider3.png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-6 col-md-6 col-12 text-nowrap mb-2">
                    <p>© Bản quyền thuộc về SHOES.VN</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>

                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('fornt/js/app.js')}}"></script>
    <script src="{{ asset('fornt/js/api.js')}}"></script>
    <script src="{{ asset('fornt/js/owlcarousel.js')}}"></script>
    <script src="{{ asset('fornt/js/backTop.js')}}"></script>
    <script src="{{ asset('fornt/js/util.js')}}"></script>
    <script src="{{ asset('fornt/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('fornt/js/jquery.min.js')}}"></script>
    <script src="{{ asset('fornt/js/slick.min.js')}}"></script>
    <script src="{{ asset('fornt/js/main.js')}}"></script>
    

</body>

</html>