@extends('layout.app')

@section('body')
    <div class="row col-md-12">

        @foreach(\App\User::all() as $teacher)
                <ul class="list-unstyled">
                    <li class="list-group-item">{{$teacher->first_name}}</li>
                    @if($teacher->courses->count())
                        <table class="table">
                            <thead class="bg-primary text-center">
                            <tr>
                                <td>الدورة</td>
                                <td>المدرب</td>
                                <td>تاريخ الإشتراك</td>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($teacher->courses as $course)

                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->trainer->first_name." ".$course->trainer->last_name}}</td>
                                    <td>{{$course->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </ul>

        @endforeach

    </div>
@endsection