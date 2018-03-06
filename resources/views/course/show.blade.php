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
                    <a class="btn btn-warning" href="{{route('course.register',$course)}}"><i class="glyphicon glyphicon-star"></i> التسجيل في الدورة</a>
                @endif
            </div>
        </div>

    </div>


    <div class="row">
        <br>
        <div class="col-md-5">
            <div class="list-group">
                @foreach($course->videos as $video)
                    <button class="list-group-item " data-id="{{$video->id}}">
                        {{basename($video->video_title,'.mp4')}}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="col-md-7">
            <div class="jumbotron">
                <div class="embed-responsive embed-responsive-16by9" id="divVideo">
                    <video width="100%" height="100%" allow="encrypted-media" controls
                           controlsList="nodownload">

                        <source src="{{$course->video}}" type="video/mp4"/>
                    </video>
                </div>
            </div>
        </div>
    </div>




    @include('_partials._rate_modal')
@endsection

@section('javascript')
    <script>
        $('button.list-group-item').click(function () {
            var videoid = $(this).data('id')
            $.ajax({
                type: 'GET',
                url: "/get-video",
                data: {
                    id: videoid
                },

            }).done((res) => {
                console.log(res)
                var $video = $('#divVideo video')
                var videoFile = 'http://e-kifah.test/' + res.path;
                videoSrc = $('source', $video).attr('src', videoFile);
                $video[0].load();
                $video[0].play();
            });
        })

    </script>
@endsection
