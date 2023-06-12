<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <h2 class="title1">Danh sách thương hiệu</h2>
                <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                    <h4>@if($success = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{$success}}
                        </div>
                        @endif</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productImages as $productImage)
                            <tr>
                                    <th scope="row">{{$productImage->id}}</th>
                                    <td>
                                        <img src="{{ asset('productPhoto')}}/{{$productImage->path}}" alt="Ảnh"
                                            style="width: 100px;">
                                    </td>
                                    <td>{{$productImage->product->name}}</td>
                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm" href="{{Route('productImages.edit', $productImage->id)}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('productImages.destroy',$productImage->id)}}">
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
