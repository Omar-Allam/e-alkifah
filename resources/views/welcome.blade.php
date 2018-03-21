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
                @foreach($courses as $course)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="{{$course->logo}}" width="100%" height="300">
                            <div class="caption">
                                <h3>{{$course->name}}</h3>
                                <p>
                                    <a href="{{route('course.show',$course)}}" class="btn btn-danger"
                                       role="button">عرض</a>
                                    @if(Auth::user() && !in_array($course->id,Auth::user()->hasRegistered()))
                                        <a href="{{route('course.register',$course)}}" class="btn btn-warning"
                                           role="button">التسجيل</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="panel-footer">

        </div>
    </div>
@endsection