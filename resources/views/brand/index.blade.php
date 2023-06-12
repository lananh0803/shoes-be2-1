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
                                <th>Brand Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)                                                       
                            <tr>
                                <th scope="row">{{  $brand->id}}</th>                            
                                <td>{{ $brand->name }}</td>
                                <td class="project-actions text-left">
                                    <a class="btn btn-info btn-sm" href="{{ route('brands.edit',$brand->id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                     <form method="POST" action="{{ route('brands.destroy',$brand->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash-can"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>