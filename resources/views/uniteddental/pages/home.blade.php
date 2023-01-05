@extends('layout.app')



@section('meta')

    <title>@if(isset(json_decode($page->extras)->meta_title)) {{json_decode($page->extras)->meta_title}} @else UnitedDental @endif</title>

    <meta name="description" content="@if(isset(json_decode($page->extras)->meta_description)) {{json_decode($page->extras)->meta_description}} @endif">

    <meta name="keywords" content="@if(isset(json_decode($page->extras)->meta_keywords)) {{json_decode($page->extras)->meta_keywords}} @endif">

@stop



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

                                <h3 class="title">{{$page->why_block1}}</h3>

                                <p>{{$page->why_block_text1}}</p>

                            </div>

                        </div>

                    </div>

                    <div class="col-4 col-sm-12">

                        <div class="media">

                            <div class="media-img"><i class="icon-comprehensive-dentistry-icon"></i></div>

                            <div class="content">

                                <h3 class="title">{{$page->why_block2}}</h3>

                                <p>{{$page->why_block_text2}}</p>

                            </div>

                        </div>

                    </div>

                    <div class="col-4 col-sm-12">

                        <div class="media">

                            <div class="media-img"><i class="icon-affordability-icon"></i></div>

                            <div class="content">

                                <h3 class="title">{!! $page->why_block3 !!}</h3>

                                <p>{{$page->why_block_text3}}</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @include('partials._testimonials')

    @include('partials._insurance')

@stop

