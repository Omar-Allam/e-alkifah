@extends('layout.app')

@section('body')

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                <img src="{{asset('images/attend.png')}}" width="100%" style="height: 350px" alt="...">
                <div class="caption">
                    <h3>Attendance Report</h3>
                    <p><a href="#" class="btn btn-primary" role="button">Show</a></p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                <img src="{{asset('images/courses.png')}}" width="100%" style="height: 350px" alt="...">
                <div class="caption">
                    <h3>Courses Report</h3>
                    <p><a href="#" class="btn btn-primary" role="button">Show</a></p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                <img src="{{asset('images/users.png')}}" width="100%" style="height: 350px" alt="...">
                <div class="caption">
                    <h3>Users Report</h3>
                    <p><a href="#" class="btn btn-primary" role="button">Show</a></p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                <img src="{{asset('images/instructor.png')}}" width="100%" style="height: 350px" alt="...">
                <div class="caption">
                    <h3>Instructors Report</h3>
                    <p><a href="#" class="btn btn-primary" role="button">Show</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection