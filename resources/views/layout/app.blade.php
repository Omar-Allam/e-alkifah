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

<nav class="navbar navbar-default" style="min-height: 120px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" dir="rtl">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-left" style="margin: 20px;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">الحساب <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/register')}}"> التسجيل</a></li>
                        <li><a href="{{url('/login')}}">تسجيل الدخول</a></li>
                    </ul>
                </li>

                <li><a href="#">دوراتي  <i class="fa fa-twitch"></i> </a></li>
                <li><a href="{{route('report.index')}}"> التقارير <i class="fa fa-bar-chart"></i></a></li>
            </ul>


            <form class="navbar-form navbar-left" style="margin: 30px;">
                <div class="form-group">
                    <input type="text" class="form-control " placeholder="بحث" >
                </div>
                <button type="submit" class="btn btn-default"> بحث <i class="fa fa-search"></i></button>
            </form>




            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('/')}}">
                        <img class="image navbar-brand" src="{{asset('/images/kifahlogo.png')}}" style="width: 90px;height:90px;padding: 0" >
                    </a>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right" style="margin: 20px;">
                <li><a href="{{route('announce')}}">{{t('الإعلان عن دورة جديدة')}} <i class="fa fa-bullhorn" ></i></a></li>
                <li><a href="{{route('rate.add')}}">{{t('إضافة  تقييم')}} <i class="fa fa-plus"></i></a></li>
                <li><a href="{{route('course.create')}}">{{t('إضافة دورة')}} <i class="fa fa-hacker-news"></i></a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div id="app">
        @yield('body')
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
@yield('javascript')
</body>
</html>