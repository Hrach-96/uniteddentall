<div class="instructions">
    <div class="container">
        <h2 class="section-title secondary">Post Operation Instructions </h2>
        <ul class="accordion">
            @foreach($instrutions as $instrution)
                <li>
                    <a class="toggle" href="">{{$instrution->name}}</a>
                    <div class="inner">
                        {{$instrution->description}}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@push('footer_scripts')
    <script>
        $(document).ready(function(){
            $('.toggle').click(function(e) {
                e.preventDefault();

                var $this = $(this);

                if ($this.next().hasClass('show')) {
                    $this.next().removeClass('show');
                    $this.removeClass('opened');
                    $this.next().slideUp(350);
                } else {
                    $this.parent().parent().find('li .inner').removeClass('show');
                    $this.parent().parent().find('li .inner').slideUp(350);
                    $this.next().toggleClass('show');
                    $this.next().slideToggle(350);
                    $this.parent().parent().find('.toggle.opened').removeClass('opened');
                    $this.addClass('opened');
                }
            });
        });
    </script>
@endpush