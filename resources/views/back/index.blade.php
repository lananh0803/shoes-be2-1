<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="col_3">
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-dollar icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>{{$orderDetail}} VND</strong></h5>
                            <span>Tổng doanh thu</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>{{$product}}</strong></h5>
                            <span>Tổng sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-cart-shopping user2 icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>{{$order}}</strong></h5>
                            <span>Tổng đơn hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>{{$user}}</strong></h5>
                            <span>Tổng người dùng</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row-one widgettable">

                <div class="clearfix"></div>
            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
</x-dashboard>
