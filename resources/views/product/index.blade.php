<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">            
            <div class="tables">
                <h2 class="title1">Danh sách thương hiệu</h2>
                <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                    
                    @if($success = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{$success}}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id}}</th>                                
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->productCategories->name }}</td>
                                    @php
                                        $description = substr($product->description, 0, 20);
                                    @endphp
                                    <td>{{ $description }}...</td>
                                    @php
                                    $content = substr($product->content, 0, 15);
                                    @endphp
                                    <td>{{ $content }}...</td>
                                    @php
                                    $price = number_format($product->price);
                                    @endphp
                                    <td>{{ $price }}đ</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>{{ $product->discount }} %</td>
                                    <td>{{ $product->rating }}</td>
                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm" href="{{ route('products.edit',$product->id)}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('products.destroy',$product->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash-can"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="store-filter clearfix">
                        <ul class="store-pagination">
                            @if ($previousPageUrl)
                            <li><a href="{{$previousPageUrl}}"><i class="fa fa-angle-left"></i></a></li>
                            @endif
                            @if ($nextPageUrl)
                            <li><a href="{{$nextPageUrl}}"><i class="fa fa-angle-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
