@extends('layout.app')

@section('body')

    <div class="row col-md-12" dir="rtl">
        <table class="table">
            <thead class="text-center" style="background-color: rgba(10,199,251,0.27)">
            <tr>
                <td lang="ar">اسم الدورة</td>
                <td>المدرب</td>
                <td>رابط الشهادة</td>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach(\App\Certification::all() as $certification)
                <tr>
                    <td>{{$certification->course->name}}</td>
                    <td>{{$certification->course->trainer->first_name." ".$certification->course->trainer->last_name}}</td>
                    <td><a href="{{route('exam.certified',$certification->course)}}">link</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection