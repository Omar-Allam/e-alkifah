@extends('layout.app')

@section('body')
    <div class="alert alert-info text-center" role="alert">
        <h3>دورة #١</h3>


    </div>
    <div class="btn-group-lg btn-group">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            <i class="glyphicon glyphicon-star"></i> قيم الدورة
        </button>
        <button class="btn btn-warning"><i class="glyphicon glyphicon-star"></i> التسجيل في الدورة </button>
    </div>

    <div class="jumbotron">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/qIblTfMmXw8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>        </div>
    </div>

    @include('_partials._rate_modal')
@endsection