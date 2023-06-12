<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">

    <!-- link icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Form Animate</title>
</head>
<body>
    <div class="container">
        <div class="box register">
            <div class="content">
                <h3 class="title">
                    Register
                </h3>
    
                <span class="details">
                    Lorem ipsum is sipmly dummy text of the printing and typesetting industry.
                </span>
    
                <form action="{{ route('register') }}" id="form" method="POST">
                    @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="form_input">
                        <input type="text" name="name" id="name" value="{{old('name')}}" required>
                        <label for="name">Username</label>
                        <span class="text-danger">@error('name')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form_input">
                        <input type="email" name="email" id="email" value="{{old('email')}}" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form_input">
                        <input type="password" name="password" id="password" value="{{old('password')}}" required>
                        <label for="password">Password</label>
                        <span class="text-danger">@error('password')
                            {{$message}}
                        @enderror</span>
                    </div>

                    <div class="form_input">
                        <input type="password_confirmation" name="password_confirmation" id="password_confirmation" value="" required>
                        <label for="password Confirmation">password_confirmation</label>
                        <span class="text-danger">@error('password_confirmation')
                            {{$message}}
                        @enderror</span>
                    </div>

                    <button class="btn submit">
                        Register
                    </button>
                </form>
            </div>
        </div>

        <div class="box navigation">
            <div class="content">
                <div class="nav navigation_signIn">
                    <p>
                        If you already have an account login here and have fun
                    </p>
    
                    <button class="btn layer log">
                        Login
                    </button>
                </div>
    
                <div class="nav navigation_signUp">
                    <p>
                        If you don't have an account yet, join us and start your journey
                    </p>
    
                    <button class="btn layer out">
                        Register
                    </button>
                </div>
            </div>
        </div>

        <div class="box login">
            <div class="content">
                <h3 class="title">
                    Login
                </h3>
    
                <span class="details">
                    Lorem ipsum is sipmly dummy text of the printing and typesetting industry.
                </span>
    
                <form action="{{ route('login') }}" id="form" method="POST">
                    @csrf
                    
                    <div class="form_input">
                        <input type="text" name="email" id="email" value="{{old('email')}}" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form_input">
                        <input type="password" name="password" id="password" value="{{old('password')}}" required>
                        <label for="password">Password</label>
                        <span class="text-danger">@error('password')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <button class="btn submit" type="submit">
                        Login
                    </button>
                </form>


              
            </div>
        </div>

        <div class="marks">
        </div>
    </div>
    
    <!-- link javascript -->
    <script src="{{ asset('dashboard/js/main.js') }}"></script>
</body>
</html>