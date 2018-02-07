@extends('layout.app')

@section('body')
    <form>
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('عنوان الدورة')}}</label>
            <input type="text" class="form-control" id="course_subject" placeholder="{{t('عنوان الدورة')}}">
        </div>
        <div class="form-group" dir="rtl">
            <label for="exampleInputPassword1">{{t('التصنيفات')}}</label>
            <select class="form-control" multiple size="5">
                <option>{{t('إدارة أعمال')}}</option>
                <option>{{t('إقتصاد')}}</option>
                <option>{{t('برمجة')}}</option>
                <option>{{t('تنمية بشرية')}}</option>
            </select>
        </div>
        <div class="form-group" dir="rtl">
            <label for="exampleInputFile">{{t('وصف للدورة')}}</label>
            <textarea class="form-control" rows="9"></textarea>
        </div>
        <div class="form-group" dir="rtl">
            <label for="video_url">{{t('ملفات الفيديو')}}</label>
            <input type="file" id="video_url">
        </div>
        <button type="submit" class="btn btn-default pull-right" dir="rtl">{{t('إعتماد الدورة')}} <i class="fa fa-upload"></i></button>
    </form>
@endsection