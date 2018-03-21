@extends('layout.app')

@section('body')
    <form method="post" action="{{route('course.question')}}">
    {{csrf_field()}}{{method_field('POST')}}
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('الدورة')}}</label>
            <select class="form-control" name="course_id">
                @foreach(\App\Course::all() as $course)
                    <option value="{{$course->id}}">{{t($course->name)}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" dir="rtl">
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">{{t('السؤال ١ :')}}</label>
                <input type="text" class="form-control" id="course_subject" name="question[]" placeholder="">
            </div>
        </div>
        <div class="form-group" dir="rtl">
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">{{t('السؤال ٢ :')}}</label>
                <input type="text" class="form-control" id="course_subject" placeholder="" name="question[]">
            </div>
        </div>
        <div class="form-group" dir="rtl">
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">{{t('السؤال ٣ :')}}</label>
                <input type="text" class="form-control" id="course_subject" placeholder="" name="question[]">
            </div>
        </div>

        <button type="submit" class="btn btn-default pull-right" dir="rtl">{{t('إضافة تقييم')}} <i
                    class="fa fa-plus"></i></button>
    </form>
@endsection