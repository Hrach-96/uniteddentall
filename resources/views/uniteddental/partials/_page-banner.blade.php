<div class="banner page" style="@if($page->banner_image)background-image: url('{{$page->banner_image}}')@endif">
    <div class="container">
        <div class="row nsc">
            <div class="col-6 col-sm-12 tc-middle">
                <div class="banner-content">
                    <h1 class="banner-title">{{$page->banner_title}}</h1>
                    <p class="banner-text">
                        {{$page->banner_description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
