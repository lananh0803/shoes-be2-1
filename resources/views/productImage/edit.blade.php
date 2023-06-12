<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <h2 class="title1">Thêm ảnh sản phẩm</h2>
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Ảnh sản phẩm</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ route('productImages.update',$productImages->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="product_id">Sản phẩm</label>
                                <input type="text" class="form-control" id="product_id" name="product_id" value="{{$productImages->product_id}}"
                                    placeholder="Sản phẩm" />
                            </div>

                            <div class="form-group">
                                <label for="pathImage">Hình ảnh</label>
                                <input type="file" class="form-control" id="pathImage" name="path" />
                                <p>{{$productImages->path}}</p>
                                <img src="{{ asset('productPhoto')}}/{{$productImages->path}}" alt="" style="width:100px">
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>