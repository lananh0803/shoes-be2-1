<x-dashboard>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <h2 class="title1">Thêm người dùng</h2>
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Người dùng</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ route('users.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên người dùng</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" />
                            </div>

                            <div class="form-group">
                                <label for="email">Email người dùng</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email" />
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Password" />
                            </div>

                           
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>