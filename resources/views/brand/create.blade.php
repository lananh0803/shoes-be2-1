<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <h2 class="title1">Thêm thương hiệu</h2>
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Thương hiệu</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ route('brands.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brandName">Tên thương hiệu</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>