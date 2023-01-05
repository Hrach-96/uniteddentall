@extends('layout.app')

@section('meta')
    <title>@if(isset(json_decode($page->extras)->meta_title)) {{json_decode($page->extras)->meta_title}} @else UnitedDental @endif</title>
    <meta name="description" content="@if(isset(json_decode($page->extras)->meta_description)) {{json_decode($page->extras)->meta_description}} @endif">
    <meta name="keywords" content="@if(isset(json_decode($page->extras)->meta_keywords)) {{json_decode($page->extras)->meta_keywords}} @endif">
@stop

@section('content')
    @include('partials._page-banner')
    <div class="about">
        @if($page->content)
        <div class="container">
            <div class="content">
                {!! $page->content !!}
            </div>
        </div>
        @endif
        @include('partials._doctors', ['doctors' => $doctors])
    </div>

@stop
