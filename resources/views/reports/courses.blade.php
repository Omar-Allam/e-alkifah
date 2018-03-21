@extends('layout.app')

@section('body')

    <div class="row col-md-12">
        <table class="table">
            <thead class="bg-primary text-center">
            <tr>
                <td>اسم الدورة</td>
                <td>المدرب</td>
                <td>تاريخ الدورة</td>
                <td>عدد المشتركين</td>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach(\App\Course::all() as $course)
                <tr>
                    <td>{{$course->name}}</td>
                    <td>{{$course->trainer->first_name." ".$course->trainer->last_name}}</td>
                    <td>{{$course->created_at->diffForHumans()}}</td>
                    <td>{{$course->teachers->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection