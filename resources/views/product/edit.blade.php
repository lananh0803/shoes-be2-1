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
                        <form  action="{{ route('products.update',$product->id)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"
                                    placeholder="Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Thương hiệu</label>
                                <select name="brand_id" id="brand_id" class="form-control custom-select">
                                <option selected value="{{$product->brand->id}}">{{$product->brand->name}}</option> 
                                @foreach ($brands as $br)                                   
                                <option value="{{$br->id}}">{{$br->name}}</option>
                                @endforeach                                

                              
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_category_id">Loại</label>
                                <select name="product_category_id" id="product_category_id" class="form-control custom-select">
                                <option selected value="{{$product->productCategories->id}}">{{$product->productCategories->name}}</option>   
                                @foreach ($categories as $category)                                      
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Miêu tả</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}"
                                    placeholder="Description" />
                            </div>

                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <input type="text" class="form-control" id="content" name="content" value="{{$product->content}}"
                                    placeholder="Content" />
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}"
                                    placeholder="Price" min="1" required/>
                            </div>
                            
                            <div class="form-group">
                                <label for="qty">Số lượng</label>
                                <input type="number" class="form-control" id="qty" name="qty" value="{{$product->qty}}"
                                    placeholder="Quantity" min="1" required/>
                            </div>

                            <div class="form-group">
                                <label for="discount">Giảm giá</label>
                                <input type="number" class="form-control" id="discount" name="discount" value="{{$product->discount}}"
                                    placeholder="Discount" min="0" max="100"/>
                            </div>

                            
                            <div class="form-group">
                                <label for="rating">Đánh giá</label>
                                <input type="number" class="form-control" id="rating" name="rating" value="{{$product->rating}}"
                                    placeholder="rating" min="1" max="5"/>
                            </div>

                         
                            <button type="submit" class="btn btn-default">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>