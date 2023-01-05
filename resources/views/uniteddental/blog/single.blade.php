@extends('layout.app')

@section('meta')
    <title>{{$blog->meta_title}}</title>
    <meta name="description" content="{{$blog->meta_description}}">
    <meta name="keywords" content="{{$blog->meta_keywords}}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$blog->title}}" />
    <meta property="og:description" content="{{$blog->short_text}}" />
    <meta property="og:url" content="{{route('blog_item', [$blog->category->slug, $blog->slug])}}" />
    <meta property="og:site_name" content="United Dental" />
    <meta property="article:publisher" content="https://www.facebook.com/UnitedDentalTA" />
    <meta property="article:author" content="https://www.facebook.com/UnitedDentalTA" />
    <meta property="article:section" content="{{$blog->category->name}}" />
    <meta property="article:published_time" content="{{date('Y-m-dTh:m:s.sTZD',strtotime($blog->date))}}" />
    <meta property="og:image" content="{{url('')}}/uploads/article/lg/{{$blog->image}}" />
    <meta property="og:image:secure_url" content="{{url('')}}/uploads/article/lg/{{$blog->image}}" />
    <meta property="og:image:width" content="1480" />
    <meta property="og:image:height" content="500" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{$blog->short_text}}" />
    <meta name="twitter:title" content="{{$blog->title}}" />
    <meta name="twitter:site" content="@uniteddental" />
    <meta name="twitter:image" content="{{url('')}}/uploads/article/lg/{{$blog->image}}" />
    <meta name="twitter:creator" content="@uniteddental" />
@stop

@section('content')
    <div class="blog-banner">
        <img src="/uploads/article/lg/{{$blog->image}}" alt="{{$blog->title}}" title="{{$blog->title}}">
    </div>
    <div class="blog-single">
        <div class="container">
            <div class="blog-content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="section-title secondary">{{$blog->title}}</h1>
                        <div class="blog-info">
                            <p>Posted on: <b>{{date("m.d.Y", strtotime($blog->date))}}</b> | <a href="{{route('blog', $blog->category->slug)}}">{{$blog->category->name}}</a></p>
                            @if(count($blog->tags))
                                <div class="blog-tags">
                                    <span>Tags: </span>
                                    @foreach($blog->tags as $key => $tag)
                                        <a href="{{route('blog', [$blog->category->slug, 'tag'=> $tag->slug])}}">{{$tag->name}}</a> @if(count($blog->tags) > 1 && count($blog->tags) - 1 != $key),@endif
                                    @endforeach
                                </div>
                            @endif
                            <div class="share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{route('blog_item', [$blog->category->slug, $blog->slug])}}" target="_top" rel="nofollow" title="Facebook"><img src="/img/svg/facebook.svg" alt="Facebook"></a>
                                <a href="https://twitter.com/intent/tweet?text={{$blog->title}}&url={{route('blog_item', [$blog->category->slug, $blog->slug])}}" target="_top" rel="nofollow" title="Twitter"><img src="/img/svg/twitter.svg" alt="Twitter"></a>
                                <a href="https://www.linkedin.com/shareArticle?mini-true&url={{route('blog_item', [$blog->category->slug, $blog->slug])}}&title={{$blog->title}}" target="_top" rel="nofollow" title="LinkedIn"><img src="/img/svg/linkedin.svg" alt="LinkedIn"></a>
                                <a href="mailto:?body=Check out this article on:{{$blog->title}}{{route('blog_item', [$blog->category->slug, $blog->slug])}}&subject={{$blog->title}}" target="_top" title="Email"><img src="/img/svg/mail.svg" alt="Email"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $blog->content !!}
                    </div>
                    <div class="col-12">
                        <div class="blog-footer">
                            <a class="btn-back" href="{{route('blog', $blog->category->slug)}}">Return to {{$blog->category->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
