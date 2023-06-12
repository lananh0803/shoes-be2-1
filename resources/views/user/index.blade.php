<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <h2 class="title1">Danh sách người dùng</h2>
                <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                    <h4>Người dùng:</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Admin</th>
                                <th>User</th>
                                <th>Auth</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if ($user->roles()->where('name', 'admin')->exists())
                                            Admin
                                        @else
                                            User
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>

                                    <form action="{{ Route('users.role', $user->id) }}" method="POST" id="roleForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if (
                                            $user->roles()->where('name', 'admin')->exists() &&
                                                $user->roles()->where('name', 'customer')->exists())
                                            <td>
                                                <input type="checkbox" id="admin" name="admin" checked>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="user" name="user" checked>
                                            </td>
                                        @else
                                            @if (
                                                $user->roles()->where('name', 'customer')->doesntExist() &&
                                                    $user->roles()->where('name', 'admin')->doesntExist())
                                                <td>
                                                    <input type="checkbox" id="admin" name="admin">
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="user" name="user">
                                                </td>
                                            @endif
                                            @if ($user->roles()->where('name', 'admin')->exists())
                                            <td>
                                                <input type="checkbox" id="admin" name="admin" checked>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="user" name="user">
                                            </td>
                                        @endif
                                        @if ($user->roles()->where('name', 'customer')->exists())
                                            <td>
                                                <input type="checkbox" id="admin" name="admin">
                                            </td>
                                            <td>
                                                <input type="checkbox" id="user" name="user"checked>
                                            </td>
                                        @endif
                                        @endif
                                        

                                        <td>
                                            <button class="btn btn-success btn-sm submitButton">
                                                <i class="fa-solid fa-toolbox"></i>
                                                Trao quyền
                                            </button>
                                        </td>
                                    </form>

                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm" href="{{ Route('users.edit', $user->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ Route('users.destroy', $user->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> <i
                                                    class="fa-solid fa-trash-can"></i>
                                                Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="store-filter clearfix">
                        <ul class="store-pagination">
                            @if ($previousPageUrl)
                                <li><a href="{{ $previousPageUrl }}"><i class="fa fa-angle-left"></i></a></li>
                            @endif
                            @if ($nextPageUrl)
                                <li><a href="{{ $nextPageUrl }}"><i class="fa fa-angle-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
