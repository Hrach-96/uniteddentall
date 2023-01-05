<div class="insurance">
        <h2 class="section-title text-center">Dental Insurance Coverage</h2>
    <div class="container">
        <div class="row">
            <div class="col-7 col-md-12">
                <div class="media">
                    <div class="media-img">
                        <i class="icon-incuranse-icon"></i>
                    </div>
                    <div class="content">
                        <h3 class="title is-uppercase">{{$page->insurance_title}}</h3>
                        <p>{{$page->insurance_text}}</p>
                    </div>
                </div>
            </div>
            <div class="col-4 left-1 left-md-0 col-md-12 row">
                @foreach($insurances as $insurance)
                    <div class="col-6">
                        <img src="{{asset('uploads/insurances')}}/{{$insurance->image}}" alt="{{$insurance->name}}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>