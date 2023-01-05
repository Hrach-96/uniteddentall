@extends('layout.app')

@section('meta')
    <title>Gallery Patients</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@stop

@section('content')
    <section class="gallery">
        <h2 class="section-title text-center">Before / After</h2>
        <div class="container">
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-4 col-xs-12">
                        <div class="img-block">
                            <div class="img-ab">
                                <a href="{{asset('uploads/patientphoto/original')}}/{{$photo->photo_before}}" data-fancybox="images" data-caption="{{$photo->description}}" class="img-before">
                                    <img src="{{asset('uploads/patientphoto/369x232')}}/{{$photo->photo_before}}" alt="">
                                </a>
                            </div>
                            <p class="img-block-text">
                                {{$photo->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop