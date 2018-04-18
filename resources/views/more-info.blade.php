@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">التسجيل</div>

                    <div class="panel-body">
                        <img src="{{asset('/images/register.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">تسجيل الدخول</div>

                    <div class="panel-body">
                        <img src="{{asset('/images/login.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">الإعلان عن دورة</div>

                    <div class="panel-body">
                        <img src="{{asset('/images/announce.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">إضافة دورة</div>

                    <div class="panel-body">
                        <img src="{{asset('/images/addclure.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">إضافة تقييم</div>

                    <div class="panel-body">
                        <img src="{{asset('/images/addrate.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">دوراتي</div>

                    <div class="panel-body">
                        <p dir="rtl">بالنقر على زر دوراتي يتم عرض الدورات الخاصة بالمعلم</p>
                        <img src="{{asset('/images/nav-bar.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">التقارير</div>

                    <div class="panel-body">
                        <p dir="rtl">لعرض التقارير يتم النقر على زر التقارير وهي صفحة خاصة بإدارة الموقع</p>
                        <img src="{{asset('/images/nav-bar.png')}}" style="width: 100%;height:100%;padding: 0">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
