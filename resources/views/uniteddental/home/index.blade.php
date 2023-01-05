@extends('layout.app')

@section('meta')
    <title>United Dental</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@stop

@section('content_class', 'home')

@section('content')
    @include('home._banner')
    <section class="why-us">
        <h2 class="section-title text-center">Why Chose United Dental?</h2>
        <div class="container">
            <div class="row ns">
                <div class="col row gut-1 gut-0-md">
                    <div class="col-4 col-sm-12">
                        <div class="media">
                            <div class="media-img"><i class="icon-cuality-care-icon"></i></div>
                            <div class="content">
                                <h3 class="title">Quality Care and Excellent Service</h3>
                                <p>We provide gentle dental care in relaxing environment and treat every patient like our family member.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12">
                        <div class="media">
                            <div class="media-img"><i class="icon-comprehensive-dentistry-icon"></i></div>
                            <div class="content">
                                <h3 class="title">COMPREHENSIVE DENTISTRY</h3>
                                <p>We can take care of all your family's dental needs in one place, including dental emergencies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12">
                        <div class="media">
                            <div class="media-img"><i class="icon-affordability-icon"></i></div>
                            <div class="content">
                                <h3 class="title">AFFORDABILITY</h3>
                                <p>We strive to make dental care accessible and affordable to all.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 left-1 right-1">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/7ajnslBbhsA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    @include('partials._testimonials')
    @include('partials._insurance')
@stop