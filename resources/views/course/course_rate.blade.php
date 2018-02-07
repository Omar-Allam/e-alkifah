@extends('layout.app')

@section('body')
    <form>
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('الدورة')}}</label>
            <select class="form-control">
                <option>{{t('دورة #١')}}</option>
                <option>{{t('دورة #١')}}</option>
                <option>{{t('دورة #١')}}</option>
                <option>{{t('دورة #١')}}</option>
            </select>
        </div>
        <div class="form-group" dir="rtl">
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">{{t('السؤال ١ :')}}</label>
                <input type="text" class="form-control" id="course_subject" placeholder="">
            </div>
        </div>
        <div class="form-group" dir="rtl">
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">{{t('السؤال ٢ :')}}</label>
                <input type="text" class="form-control" id="course_subject" placeholder="">
            </div>
        </div>
        <div class="form-group" dir="rtl">
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">{{t('السؤال ٣ :')}}</label>
                <input type="text" class="form-control" id="course_subject" placeholder="">
            </div>
        </div>

        <button type="submit" class="btn btn-default pull-right" dir="rtl">{{t('إضافة تقييم')}} <i class="fa fa-plus"></i></button>
    </form>
@endsection