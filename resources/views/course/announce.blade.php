@extends('layout.app')

@section('body')
    <form action="{{route('course.announce')}}" method="post">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('عنوان الدورة')}}</label>
            <input type="text" class="form-control" id="course_subject" name="course_name" placeholder="{{t('عنوان الدورة')}}">
        </div>
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('المدرب')}}</label>
            <input type="text" class="form-control" id="course_subject" name="trainer" placeholder="{{t('المدرب')}}">
        </div>

        <div class="form-group" dir="rtl">
            <label for="exampleInputFile">{{t('وصف للدورة')}}</label>
            <textarea class="form-control" name="description" rows="9"></textarea>
        </div>

        <button type="submit" class="btn btn-default pull-right" dir="rtl">{{t('إرسال')}} <i class="fa fa-bullhorn "></i></button>
    </form>
@endsection