@extends('layout.app')

@section('meta')
    <title>{{$blog[0]->category->withFakes()->meta_title}}</title>
    <meta name="description" content="{{$blog[0]->category->withFakes()->meta_description}}">
    <meta name="keywords" content="{{$blog[0]->category->withFakes()->meta_keywords}}">
@stop

@section('content')
    <div class="blog-posts">
        <div class="container">
            <h1 class="section-title text-center">{{$blog[0]->category->name}}</h1>
            <div class="row">
                <div class="col-12">
                    @foreach($blog as $item)
                        <div class="row gut-1 blog-item">
                            <div class="col-5 col-md-6 col-xs-12">
                                <a href="{{route('blog_item', [$item->category->slug, $item->slug])}}">
                                    <img src="/uploads/article/sm/{{$item->image}}" alt="{{$item->title}}" title="{{$item->title}}">
                                </a>
                            </div>
                            <div class="col-7 col-md-6 col-xs-12">
                                <a href="{{route('blog_item', [$item->category->slug, $item->slug])}}">
                                    <h2 class="blog-item__title">{{$item->title}}</h2>
                                </a>
                                <p class="blog-item__date">Posted on: {{date("m.d.Y", strtotime($item->date))}}</p>
                                <p class="blog-item__text">{{$item->short_text}}..... <a class="blog-item__more" href="{{route('blog_item', [$item->category->slug, $item->slug])}}">Read more</a></p>
                                <p class="blog-categories">
                                    <span>Category: </span>
                                    <a href="{{route('blog', [$item->category->slug])}}">{{$item->category->name}}</a>
                                </p>
                                @if(count($item->tags))
                                    <div class="blog-tags">
                                        <span>Tags: </span>
                                        @foreach($item->tags as $key => $tag)
                                            <a href="{{route('blog', [$item->category->slug, 'tag'=> $tag->slug])}}">{{$tag->name}}</a> @if(count($item->tags) > 1 && count($item->tags) - 1 != $key),@endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 text-center">
                    {{$blog->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
