@extends('layout.app')

@section('meta')
    <title>@if(isset(json_decode($page->extras)->meta_title)) {{json_decode($page->extras)->meta_title}} @else UnitedDental @endif</title>
    <meta name="description" content="@if(isset(json_decode($page->extras)->meta_description)) {{json_decode($page->extras)->meta_description}} @endif">
    <meta name="keywords" content="@if(isset(json_decode($page->extras)->meta_keywords)) {{json_decode($page->extras)->meta_keywords}} @endif">
@stop

@section('content')
    @include('partials._page-banner')
    <div class="services">
        @if($page->content)
            <div class="container">
                <div class="content">
                    {!! $page->content !!}
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row ns content">
                @if($page->options)
                <ul class="list-item col row c-nb">
                    @foreach(json_decode($page->options, true) as $option)
                        <li class="col-6">{{$option['name']}}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>

@stop
