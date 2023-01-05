@extends('layout.app')

@section('meta')
    <title>Gallery</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@stop

@section('content')
    <section class="gallery">
        <h2 class="section-title text-center">Our Office</h2>
        <div class="container">
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-4 col-xs-12">
                        <a href="{{asset('uploads/officephoto/original')}}/{{$photo->photo}}" data-fancybox="images" data-caption="{{$photo->description}}">
                            <img src="{{asset('uploads/officephoto/400x400')}}/{{$photo->photo}}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop