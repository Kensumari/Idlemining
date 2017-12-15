<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Idle Mining</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{-- <link href="css/bootstrap-theme.min.css" rel="stylesheet"> --}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#more">More</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
                @auth
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ auth()->user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown {{ (session()->get('info') == 'login') ? 'open' : '' }}">
                        <a id="dropdownMenu1" data-toggle="dropdown" class="dropdown-toggle">Login</a>
                        <ul class="dropdown-menu">
                            <li style="width: 235px;">
                                <form action="{{ route('auth.login') }}" method="POST" class="navbar-form" role="form">
                                    {{ csrf_field() }}
                                    @if(session()->get('info') == 'login')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="login-error">{{ session()->get('error') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" id="email" name="email"
                                                       placeholder="example@example.com" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="password" class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" id="password" name="password"
                                                       placeholder="Password" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 login-spacer"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary form-control">Login</button>
                                            <span class="pull-right"><a href="#">Forgot Password?</a></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li><a href="register">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@yield('homepage')

<div class="container">
    @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $("a").on('click', function (event) {
            if (this.hash !== "") {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 300);
            }
        });
    });
</script>
</body>
</html>