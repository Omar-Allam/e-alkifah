@extends('layout.app')

@section('body')
    <div style="margin: 10px">
        <h1 class="bg-primary text-center" style="padding: 10px;border-radius: 5px">{{t('شهادة إتمام الدورة')}}</h1>
    </div>
    <div class="text-center" dir="rtl" style="background-color: white;padding: 10px;margin: 10px;border-radius: 5px">
        <h2>يشهد موقع كفاح للدورات </h2>
        <h3> بأن المعلم {{Auth::user()->first_name . ' ' .Auth::user()->last_name}}  </h3><br>
        <h4> قد أتم دورة  {{$course->name}} </h4><br>
        <h4 style="color: red;"> بتاريخ  {{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</h4><br>


        <div style="display: flex;">
            <div style="flex: 4">المدرب</div>
            <div style="flex: 4">
                <img src="{{asset('/images/kifahlogo.png')}}"
                     style="width: 90px;height:90px;padding: 0">
            </div>
            <div style="flex: 4">إدارة الموقع</div>
        </div>

        <div style="display: flex;">
            <div style="flex: 4">{{$course->trainer->first_name}}</div>
            <div style="flex: 4">

            </div>
            <div style="flex: 4"></div>
        </div>
    </div>



@endsection