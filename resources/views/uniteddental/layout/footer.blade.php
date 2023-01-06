<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row c-nb">
            <div class="col-3 col-sm-12">
                <img src="/img/footer-logo.svg" class="footer-logo" alt="Footer logo">
            </div>
            <div class="col-2 col-sm-4 col-xs-12">
                <div class="footer-section">
                    <div class="footer-section-title">Browse</div>
                    <ul class="footer-section-list">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('page', ['about-us'])}}">About us</a></li>
                        <li><a href="{{route('page', ['services'])}}">Services</a></li>
                        <li><a href="{{route('page', ['new-patients'])}}">New patients</a></li>
                        <li><a href="{{route('office-gallery')}}">Gallery</a></li>
                        <li><a href="{{route('blog', ['blog'])}}">Blog</a></li>
                        <li><a href="{{route('page', ['contact-us'])}}">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-xs-12">
                <div class="footer-section">
                    <div class="footer-section-title">Contact us</div>
                    <ul class="footer-section-list">
                        <li><i class="icon-location"></i>{{Config::get('settings.address')}}</li>
                        <li><a href="tel:{{Config::get('settings.phone')}}"><i class="icon-phone-icon"></i>{{Config::get('settings.phone')}}</a></li>
                        <li><i class="icon-Fax"></i>{{Config::get('settings.fax')}}</li>
                        <li><a href="mailto:{{Config::get('settings.email')}}"><i class="icon-mail"></i>{{Config::get('settings.email')}}</a></li>
                    </ul>
                    <ul class="footer-section-list inline">
                        <li><a href="{{Config::get('settings.facebook')}}" target="_blank" rel="nofollow"><i class="icon-footer-facebook"></i></a></li>
                        <li><a href="{{Config::get('settings.instagram')}}" target="_blank" rel="nofollow"><i class="icon-footer-instagram"></i></a></li>
                        <li><a href="{{Config::get('settings.linkedin')}}" target="_blank" rel="nofollow"><i class="icon-footer-linked-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-3 col-sm-4 col-xs-12">
                <div class="footer-section">
                    <div class="footer-section-title">Working Hours</div>
                    <ul class="footer-section-list">
                        <li>Monday - Friday: <span>{{Config::get('settings.monday-friday')}}</span></li>
                    </ul>
                    <ul class="footer-section-list">
                        <li>Saturday: <span>{{Config::get('settings.saturday')}}</span></li>
                    </ul>
                    <ul class="footer-section-list">
                        <li>Sunday: <span>{{Config::get('settings.sunday')}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        © "United Dental" {{ date("Y") }}
    </div>
    <div class="footer-dev">
        Design and Development by: <a href="https://oculusbranding.com/" target="_blank" rel="nofollow">Oculus Branding</a>
    </div>
</footer>
@push('footer_scripts')

@endpush