<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <h2 class="title1">Thêm sản phẩm</h2>
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Sản phẩm</h4>
                    </div>
                    <div class="form-body">
                        <form  action="{{ route('orders.update',$orders->id)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$orders->first_name}}"
                                    placeholder="First Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$orders->last_name}}"
                                    placeholder="Last Name" required/>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$orders->address}}"
                                    placeholder="Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{$orders->city}}"
                                    placeholder="City" required/>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{$orders->country}}"
                                    placeholder="Country" required/>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$orders->phone}}"
                                    placeholder="Phone" min="0" required/>
                            </div>

                            <div class="form-group">
                                <label for="node">Node</label>
                                <textarea class="form-control" id="node" name="node"
                                cols="30" rows="5">{{$orders->note}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_id">Sản phẩm</label>
                                <input type="number" class="form-control" id="product_id" name="product_id" value="{{$orders->orderDetails->first()->product_id}}"
                                    placeholder="Sản phẩm" min="1" required/>
                            </div>
                            <div class="form-group">
                                <label for="qty">Số lượng</label>
                                <input type="number" class="form-control" id="qty" name="qty" value="{{$orders->orderDetails->first()->qty}}"
                                    placeholder="Quantity" min="1" required/>
                            </div>
                            <div class="form-group">
                                <label for="total">Tổng tiền</label>
                                <input type="number" class="form-control" id="total" name="total" value="{{$orders->orderDetails->first()->total}}"
                                    placeholder="Total" min="1" required/>
                            </div>
                         
                            <button type="submit" class="btn btn-default">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>