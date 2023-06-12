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
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productDetails as $detail)
                                <tr>
                                    <th scope="row">{{ $detail->id }}</th>
                                    <td>{{ $detail->product->name }}</td>
                                    <td>{{ $detail->size }}</td>
                                    <td>{{ $detail->qty }}</td>
                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm" href="{{ route('productDetails.edit',$detail->id)}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('productDetails.destroy',$detail->id)}}">
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
