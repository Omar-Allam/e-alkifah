@extends('layout.app')

@section('body')
    <div class="jumbotron">
        <h1 class="text-center">أهلا بكم في موقع كفاح</h1>
        <p></p>
        <p><a class="btn btn-primary btn-lg" href="{{route('about.index')}}" role="button">للمزيد عن الموقع ....</a></p>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">آخر الدورات</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('images/logo-course.jpg')}}" width="100%" height="300">
                        <div class="caption">
                            <h3>دورة #١</h3>
                            <p>معلومات الدورة</p>
                            <p><a href="{{route('course.show')}}" class="btn btn-danger" role="button">عرض</a>
                            <a href="{{route('course.show')}}" class="btn btn-warning" role="button">التسجيل</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('images/logo-course.jpg')}}" width="100%" height="300">
                        <div class="caption">
                            <h3>دورة #١</h3>
                            <p>معلومات الدورة</p>
                            <p><a href="{{route('course.show')}}" class="btn btn-danger" role="button">عرض</a>
                                <a href="{{route('course.show')}}" class="btn btn-warning" role="button">التسجيل</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('images/logo-course.jpg')}}" width="100%" height="300">
                        <div class="caption">
                            <h3>دورة #١</h3>
                            <p>معلومات الدورة</p>
                            <p><a href="{{route('course.show')}}" class="btn btn-danger" role="button">عرض</a>
                                <a href="{{route('course.show')}}" class="btn btn-warning" role="button">التسجيل</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('images/logo-course.jpg')}}" width="100%" height="300">
                        <div class="caption">
                            <h3>دورة #١</h3>
                            <p>معلومات الدورة</p>
                            <p><a href="{{route('course.show')}}" class="btn btn-danger" role="button">عرض</a>
                                <a href="{{route('course.show')}}" class="btn btn-warning" role="button">التسجيل</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('images/logo-course.jpg')}}" width="100%" height="300">
                        <div class="caption">
                            <h3>دورة #١</h3>
                            <p>معلومات الدورة</p>
                            <p><a href="{{route('course.show')}}" class="btn btn-danger" role="button">عرض</a>
                                <a href="{{route('course.show')}}" class="btn btn-warning" role="button">التسجيل</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('images/logo-course.jpg')}}" width="100%" height="300">
                        <div class="caption">
                            <h3>دورة #١</h3>
                            <p>معلومات الدورة</p>
                            <p><a href="{{route('course.show')}}" class="btn btn-danger" role="button">عرض</a>
                                <a href="{{route('course.show')}}" class="btn btn-warning" role="button">التسجيل</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">

        </div>
    </div>
@endsection