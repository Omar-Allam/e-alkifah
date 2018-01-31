<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kifah</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('header')
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{url('/')}}">
                <img class="image navbar-brand" src="{{asset('/images/kifahlogo.png')}}" style="width: 80px;height:50px;padding: 0" >
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">التصنيف <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Academics</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">بحث</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">كورساتي</a></li>
                <li><a href="{{route('report.index')}}">التقارير</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">الحساب <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/register')}}">التسجيل</a></li>
                        <li><a href="{{url('/login')}}">تسجيل الدخول</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div id="app">
        @yield('body')
    </div>
</div>

<footer>
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2018 Copyright: <a href="#"> KIFAH</a>

        </div>
    </div>
</footer>
<script src="{{asset('js/app.js')}}"></script>
@yield('javascript')
</body>
</html>