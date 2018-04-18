@extends('layout.app')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info text-center" role="alert">
                <h3>{{$course->name}}</h3>
            </div>
            <div class="btn-group-lg btn-group">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    <i class="glyphicon glyphicon-star"></i> قيم الدورة
                </button>
                @if(Auth::user() && !in_array($course->id,Auth::user()->hasRegistered()))
                    <a class="btn btn-warning" href="{{route('course.register',$course)}}"><i
                                class="glyphicon glyphicon-star"></i> التسجيل في الدورة</a>
                @endif

                @if(Auth::user() && (Auth::user()->isTrainer() || Auth::user()->isAdmin()))
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#contentModal"><i class="fa fa-plus"></i> إضافة محتوى
                    </button>
                @endif

                {{--@if(Auth::user() && (Auth::user()->isTrainer() || Auth::user()->isAdmin()))--}}
                {{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"--}}
                {{--data-target="#contentModal"><i class="fa fa-plus"></i> إضافة إختبار--}}
                {{--</button>--}}
                {{--@endif--}}
            </div>
        </div>

    </div>


    <div class="row">
        <br>
        <div class="col-md-5">
            <div class="list-group">
                @foreach($course->videos as $video)
                    <button class="list-group-item " data-id="{{$video->id}}"
                            @if($course->videos->last()->id == $video->id) id="#lastVideo" @endif
                    >
                        {{basename($video->video_title,'.mp4')}}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="col-md-7">
            <div class="jumbotron">
                <div class="embed-responsive embed-responsive-16by9" id="divVideo">
                    <video width="100%" height="100%" allow="encrypted-media" controls
                           controlsList="nodownload" id="video">
                        <source src="{{$course->video}}" type="video/mp4"/>
                    </video>
                </div>
            </div>
            <p>{!! $course->description !!}</p>
        </div>
    </div>




    @include('_partials._rate_modal')
    @include('_partials._add_content')


@endsection

@section('javascript')
    <script>
        let last_video = {{$course->videos->last()->id ?? 0}};
        let clicked_video = 0;
        let course = {{$course->id}}

        $('button.list-group-item').click(function () {
            var videoid = $(this).data('id')
            clicked_video = videoid
            $.ajax({
                type: 'GET',
                url: "/get-video",
                data: {
                    id: videoid
                },

            }).done((res) => {
                var $video = $('#divVideo video')
                var videoFile = 'http://e-kifah.test/' + res.path;
                videoSrc = $('source', $video).attr('src', videoFile);
                $video[0].load();
                $video[0].play();
            });
        })

        document.getElementById('video').addEventListener('ended', function () {
            if (clicked_video === last_video) {
                $.ajax({
                    type: 'GET',
                    url: "/get-certification",
                    data: {
                        id: course
                    },

                }).done((res) => {
                    if(res == 0 ){
                        window.location.href = '{{route("exam.certifiedBefore")}}'
                    }
                    else{
                        window.location.href = '{{route("exam.certified",$course)}}'
                    }
                });

            }
        }, false);


    </script>
@endsection
