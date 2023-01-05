<div class="banner home " style="background-image: url('{{asset('/img/Home_Under_Slider.jpg')}}')">
    <div class="container">
        <div class="row nsc">
            <div class="col-6 col-sm-12 tc-middle">
                <div class="banner-content">
                    <h1 class="banner-title">
                        @if($page->banner_title)
                            {{$page->banner_title}}
                        @endif
                    </h1>
                    <p class="banner-text">
                        @if($page->banner_description)
                            {{$page->banner_description}}
                        @endif
                    </p>
                    @if($page->label)<a href="{{$page->url}}" class="btn">{{$page->label}}</a>@endif
                </div>
            </div>
        </div>
    </div>
    <div class="banner-slider">
        <div class="js-home-banner slick-slider">
            @foreach($sliders as $key => $slider)
                <div class="item">
                    @if($slider->video['provider'] == 'youtube')
                        <iframe width="100%" height="360" src="https://www.youtube.com/embed/{{$slider->video['id']}}?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @elseif($slider->video['provider'] == 'vimeo')
                        <iframe src="https://player.vimeo.com/video/{{$slider->video['id']}}?color=ef0000" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    @else
                    <img src="uploads/slider/833x576/{{$slider->image}}" alt="{{$slider->name}}" title="{{$slider->title}}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@push('footer_scripts')
    <script>
        $('.js-home-banner').slick({
            draggable: true,
            arrows: false,
            dots: true,
            fade: true,
            speed: 1500,
            infinite: true,
            autoplay: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100
        });
    </script>
@endpush()
