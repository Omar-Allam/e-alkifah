@extends('layout.app')

@section('body')
    <form action="{{route('course.announce')}}" method="post">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('الدورة')}}</label>
            <select class="form-control" name="course_name">
                @foreach(\App\Course::all() as $course)
                    <option value="{{$course->id}}"> {{$course->name}} </option>
                @endforeach
            </select>

        </div>


        <div class="form-group" dir="rtl">
            <label for="exampleInputFile">{{t('وصف للدورة')}}</label>
            <textarea class="form-control" name="description" rows="9"></textarea>
        </div>

        <button type="submit" class="btn btn-default pull-right" dir="rtl">{{t('إرسال')}} <i
                    class="fa fa-bullhorn "></i></button>
    </form>
@endsection