        @extends('layout.app')

        @section('body')
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                        <img src="{{asset('images/courses.png')}}" width="100%" style="height: 350px" alt="...">
                        <div class="caption">
                            <h3>{{t('تقرير الدورات')}}</h3>
                            <p><a href="{{route('report.courses')}}" class="btn btn-primary" role="button">{{t('عرض')}}</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                        <img src="{{asset('images/users.png')}}" width="100%" style="height: 350px" alt="...">
                        <div class="caption">
                            <h3>{{t('تقرير المشتركين')}}</h3>
                            <p><a href="{{route('report.teachers')}}" class="btn btn-primary" role="button">{{t('عرض')}}</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="background-color: whitesmoke;box-shadow: 1px 3px 1px">
                        <img src="{{asset('images/instructor.png')}}" width="100%" style="height: 350px" alt="...">
                        <div class="caption">
                            <h3>{{t('تقرير المدربين')}}</h3>
                            <p><a href="{{route('report.trainers')}}" class="btn btn-primary" role="button">{{t('عرض')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endsection