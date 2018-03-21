<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    {{--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>--}}
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kifah</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 300,
            theme: 'modern',
            image_advtab: true,
            plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor  imagetools  contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
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
                       aria-expanded="false"> @if(!Auth::guest()) {{Auth::user()->first_name}} @else {{t('الحساب')}} @endif
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{route('user.certifications')}}">شهادتي</a></li>
                            <li><a href="{{url('/logout')}}">تسجيل الخروج</a></li>
                        @else
                            <li><a href="{{url('/register')}}"> التسجيل</a></li>
                            <li><a href="{{url('/login')}}">تسجيل الدخول</a></li>
                        @endif
                    </ul>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->isAdmin() )
                        <li><a href="{{route('report.index')}}"> التقارير <i class="fa fa-bar-chart"></i></a></li>
                    @endif
                    <li><a href="{{route('course.mycourses')}}">دوراتي <i class="fa fa-twitch"></i> </a></li>
                @endif
            </ul>


            <form action="{{route('course.search')}}" class="navbar-form navbar-left" style="margin: 30px;" method="post" >
                {{csrf_field()}} {{method_field('POST')}}
                <div class="form-group">
                    <input type="text" class="form-control " placeholder="بحث" name="course_name">
                </div>
                <button type="submit" class="btn btn-default"> بحث <i class="fa fa-search"></i></button>
            </form>


            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('/')}}">
                        <img class="image navbar-brand" src="{{asset('/images/kifahlogo.png')}}"
                             style="width: 90px;height:90px;padding: 0">
                    </a>
                </li>
            </ul>


            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right" style="margin: 20px;">
                    @if(Auth::user()->isAdmin() || Auth::user()->isTrainer())
                        <li><a href="{{route('exam.create')}}">{{t('الإختبارات')}} <i
                                        class="fa fa-file"></i></a>
                        </li>
                    @endif
                    @if(Auth::user()->isAdmin())
                        <li><a href="{{route('announce')}}">{{t('الإعلان عن دورة جديدة')}} <i
                                        class="fa fa-bullhorn"></i></a></li>
                    @endif
                    @if(Auth::user()->isAdmin() || Auth::user()->isTrainer())
                        <li><a href="{{route('rate.add')}}">{{t('إضافة  تقييم')}} <i class="fa fa-plus"></i></a></li>
                    @endif
                    @if(Auth::user()->isAdmin() || Auth::user()->isTrainer())
                        <li><a href="{{route('course.create')}}">{{t('إضافة دورة')}} <i
                                        class="fa fa-hacker-news"></i></a>
                        </li>
                    @endif
                </ul>
            @endif

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div id="app">
        @yield('body')
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

@yield('javascript')
</body>
</html>