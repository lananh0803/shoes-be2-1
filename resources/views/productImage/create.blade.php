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
                        <form action="{{ route('productImages.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_id">Sản phẩm</label>
                                <input type="number" class="form-control" id="product_id" name="product_id"
                                    placeholder="Sản phẩm" min="1"/>
                            </div>

                            <div class="form-group">
                                <label for="pathImage">Hình ảnh</label>
                                <input type="file" class="form-control" id="pathImage" name="path"
                                    />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>