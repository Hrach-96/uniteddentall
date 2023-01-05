<div class="doctors">
    <h2 class="section-title text-center">Our Doctors</h2>
    <div class="container">
        @foreach($doctors as $doctor)
            <div class="doctor media responsive">
                <div class="media-img">
                    <img src="{{asset('uploads/doctors/')}}/{{$doctor->img}}" alt="" class="is-bordered is-rounded">
                </div>
                <div class="content text-box" data-maxlength="318">
                    <h3 class="title">{{$doctor->name}}</h3>
                    <p class="read-more-text">{{$doctor->bio}}</p>
                    <a href="#" class="read-more js-read-more"><span>Read more</span><span>Read less</span></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@push('footer_scripts')
    <script>

        $(".text-box p").text(function(index, currentText) {
            var maxLength = $(this).parent().attr('data-maxlength');
            if(currentText.length >= maxLength) {
                $('.js-read-more').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent().find('.read-more-text').toggleClass('active');
                    $(this).toggleClass('active');

                });
                //return currentText.substr(0, maxLength) + "...";
            } else {

                $(this).parent().find('.read-more').remove();
                //return currentText
            }
        });

    </script>
@endpush