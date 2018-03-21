@extends('layout.app')

@section('body')
    <div class="row col-md-12">
        @foreach(\App\User::all() as $trainer)
        @if(in_array($trainer->id,$trainer->trainers))
                <ul class="list-unstyled">
                    <li class="list-group-item">{{$trainer->first_name." ".$trainer->last_name}}</li>
                    @if($trainer->trainer_courses && $trainer->trainer_courses->count())
                        <table class="table">
                            <thead class="bg-primary text-center">
                            <tr>
                                <td>الدورة</td>
                                <td>تاريخ البدء</td>
                                <td>التقييم</td>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($trainer->trainer_courses as $course)
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->created_at->diffForHumans()}}</td>
                                    <td>{{number_format($course->rate,1)}} %</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </ul>
            @endif
        @endforeach

    </div>
@endsection