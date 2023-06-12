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
                        <form action="{{ route('productDetails.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_id">Sản phẩm</label>
                                <input type="number" class="form-control" id="product_id" name="product_id"
                                    placeholder="Product" min="1" />
                            </div>
                          
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="number" class="form-control" id="size" name="size"
                                    placeholder="Size" min="30" max="50"/>
                            </div>
                            
                            <div class="form-group">
                                <label for="qty">Số lượng</label> 
                                <input type="number" class="form-control" id="qty" name="qty"
                                    placeholder="Quantity"  min="0"/>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>