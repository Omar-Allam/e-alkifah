@extends('layout.app')

@section('body')
    <form method="post" action="{{route('course.store')}}" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('عنوان الدورة')}}</label>
            <input type="text" class="form-control" id="course_subject" name="name"  placeholder="{{t('عنوان الدورة')}}">
        </div>

        <div class="form-group" dir="rtl">
            <label for="exampleInputFile">{{t('وصف للدورة')}}</label>
            <textarea class="form-control" name="description" rows="9"></textarea>
        </div>

        <div class="form-group" dir="rtl">
            <label for="exampleInputFile">{{t('الفئة')}}</label>
            <select class="form-control" name="category_id">
                <option value="0">{{t('Select Category')}}</option>
                @foreach(\App\Category::all() as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group" dir="rtl">
            <label for="exampleInputFile">{{t('شعار الدورة')}}</label>
            <input type="file" id="image_url" name="logo">
        </div>

        <div class="form-group" dir="rtl">
            <label for="video_url">{{t('ملفات الفيديو')}}</label>
            <input type="file" id="video_url" name="videos[]" multiple
                   accept=".mov,.mp4"
            >
        </div>




        <button type="submit" class="btn btn-default pull-right" dir="rtl">{{t('إعتماد الدورة')}} <i
                    class="fa fa-upload"></i></button>
    </form>
@endsection