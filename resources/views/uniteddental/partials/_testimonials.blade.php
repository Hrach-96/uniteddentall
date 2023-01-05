@if($testimonials->count())
<div class="testimonials">
    <div class="container">
        <div class="testimonials-slider js-testimonials-slider">
            @foreach($testimonials as $testimonial)
            <div class="item">
                <div class="message">
                    “ {{$testimonial->text}} „
                </div>
                <div class="author">- {{$testimonial->author}} -</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@push('footer_scripts')
    <script>
        $('.js-testimonials-slider').slick({
            draggable: true,
            arrows: true,
            dots: false,
            fade: true,
            speed: 1500,
            infinite: true,
            autoplay: true,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100
        });
    </script>
@endpush()
@endif