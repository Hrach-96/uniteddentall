@extends('layout.app')

@section('meta')
    <title>@if(isset(json_decode($page->extras)->meta_title)) {{json_decode($page->extras)->meta_title}} @else UnitedDental @endif</title>
    <meta name="description" content="@if(isset(json_decode($page->extras)->meta_description)) {{json_decode($page->extras)->meta_description}} @endif">
    <meta name="keywords" content="@if(isset(json_decode($page->extras)->meta_keywords)) {{json_decode($page->extras)->meta_keywords}} @endif">
@stop

@section('content')
    <div class="new-patients">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-12 order-ms-1">
                    <div class="section-title secondary">Patients Form</div>
                    <div>
                        <img src="/img/svg/PDF.svg" alt="Pdf" class="pdf-img">
                        <a href="{{ url('/') }}/uploads/pdf/NewPatientsForm.pdf" download class="btn secondary btn-download">Download Form</a>
                    </div>
                </div>
                <div class="col-7 col-sm-12">
                    @if($page->image_poster)<img src="{{$page->image_poster}}" alt="">@endif
                </div>
            </div>
        </div>
        @if($page->content)
            <div class="container">
                <div class="content">
                    {!! $page->content !!}
                </div>
            </div>
        @endif
        @include('partials._instrutions')
    </div>
@stop
