<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <h2 class="title1">Danh sách thương hiệu</h2>
                <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                    <h4>Hover Rows Table:</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                                    <td>{{$order->address}}-{{$order->city}}-{{$order->country}}</td>                                
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->orderDetails->first()->product->name}}</td>
                                    <td>{{$order->orderDetails->first()->size}}</td>
                                    <td>{{$order->orderDetails->first()->qty}}</td>
                                    <td>{{$order->orderDetails->first()->total}}</td>
                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm" href="{{ route('orders.edit',$order->id)}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('orders.destroy',$order->id)}}">
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
