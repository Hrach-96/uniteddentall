<div class="banner home " style="background-image: url('{{asset('/img/Home_Under_Slider.jpg')}}')">
    <div class="banner-slider">
        <div class="js-home-banner">
            @foreach($sliders as $key => $slider)
                <div class="item">
                    <div class="container">
                        <div class="row nsc">
                            <div class="col-6 col-sm-12 tc-middle">
                                <div class="banner-content">
                                    <h1 class="banner-title">
                                        @if($slider->pluck('name')[$key] === null)
                                            {{$slider->pluck('name')[0]}}
                                        @else
                                            {{$slider->pluck('name')[$key]}}
                                        @endif
                                    </h1>
                                    <p class="banner-text">
                                        @if($slider->pluck('description')[$key] === null)
                                            {{$slider->pluck('description')[0]}}
                                        @else
                                            {{$slider->pluck('description')[$key]}}
                                        @endif
                                    </p>
                                    @if($slider->url)<a href="{{$slider->url}}" class="btn">{{$slider->btn_label}}</a>@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="uploads/slider/833x576/{{$slider->image}}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</div>
