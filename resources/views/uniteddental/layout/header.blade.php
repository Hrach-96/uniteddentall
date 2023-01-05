<div class="navigation-slide-overlay"></div>

<div class="mobile-nav navigation-slide">

    <div class="navigation-slide-close">

        <span class="js-navigation-slide-close">

            <img src="/img/svg/close.svg" alt="Close">

        </span>

    </div>

    <ul class="nav">

        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>

        <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="{{route('page', ['about-us'])}}">About us</a></li>

        <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{route('page', ['services'])}}">Services</a></li>

        <li class="{{ request()->is('new-patients') ? 'active' : '' }}"><a href="{{route('page', ['new-patients'])}}">New patients</a></li>

        <li class="dropdown-toggle {{ request()->is('gallery/*') ? 'active' : '' }}">

            <a href="javascript:void(0)">Gallery</a>

            <ul class="dropdown-menu">

                <li class="{{ request()->is('gallery/patients') ? 'active' : '' }}"><a href="{{route('patient-gallery')}}">Before / after</a></li>

                <li class="{{ request()->is('gallery/office') ? 'active' : '' }}"><a href="{{route('office-gallery')}}">The Office</a></li>

            </ul>

        </li>

        <!-- <li class="{{ request()->is('posts/news') ? 'active' : '' }}"><a href="{{route('blog', ['news'])}}">News</a></li> -->

        <li class="{{ request()->is('posts/blog') ? 'active' : '' }}"><a href="{{route('blog', ['blog'])}}">Blog</a></li>

        <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="{{route('page', ['contact-us'])}}">Contact us</a></li>

    </ul>

    <div class="mobile-bottom">

        <ul class="mobile-nav-info-link">

            <li><a href="tel:{{Config::get('settings.phone')}}"><i class="icon-phone-icon"></i>{{Config::get('settings.phone')}}</a></li>

            <li><a href="mailto:{{Config::get('settings.email')}}"><i class="icon-mail"></i>{{Config::get('settings.email')}}</a></li>

        </ul>

        <ul class="social-links">

            <li><a href="{{Config::get('settings.facebook')}}" target="_blank" rel="nofollow"><img src="{{asset('/img/svg/facebook.svg')}}" alt="united dental facebook"></a></li>

            <li><a href="{{Config::get('settings.instagram')}}" target="_blank" rel="nofollow"><img src="{{asset('/img/svg/instagram.svg')}}" alt="united dental instagram"></a></li>

            <li><a href="{{Config::get('settings.linkedin')}}" target="_blank" rel="nofollow"><img src="{{asset('/img/svg/linkedin.svg')}}" alt="united dental linkedin"></a></li>

        </ul>

        <a href="{{route('page',['contact-us'])}}" class="btn mobile-nav-btn">MAKE AN APPOINTMENT</a>

    </div>

</div>

<header class="header">

    <div class="header-top">

        <div class="container">

            <a href="tel:{{Config::get('settings.phone')}}" class="header-top-phone"><i class="icon-phone-icon"></i>{{Config::get('settings.phone')}}</a>

            <ul class="header-top-social">

                <li><a href="{{Config::get('settings.facebook')}}" target="_blank" rel="nofollow"><img src="{{asset('/img/svg/facebook.svg')}}" alt="united dental facebook"></a></li>

                <li><a href="{{Config::get('settings.instagram')}}" target="_blank" rel="nofollow"><img src="{{asset('/img/svg/instagram.svg')}}" alt="united dental instagram"></a></li>

                <li><a href="{{Config::get('settings.linkedin')}}" target="_blank" rel="nofollow"><img src="{{asset('/img/svg/linkedin.svg')}}" alt="united dental linkedin"></a></li>

            </ul>

            <a href="{{route('page',['contact-us'])}}" class="btn header-top-btn">MAKE AN APPOINTMENT</a>

        </div>

    </div>

    <div class="header-bottom">

        <div class="container">

            <a href="/" class="header-logo">

                <img src="/img/Logo.svg" alt="United Dental Logo">

            </a>

            <ul class="header-nav">

                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>

                <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="{{route('page', ['about-us'])}}">About us</a></li>

                <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{route('page', ['services'])}}">Services</a></li>

                <li class="{{ request()->is('new-patients') ? 'active' : '' }}"><a href="{{route('page', ['new-patients'])}}">New patients</a></li>

                <li class="dropdown-toggle {{ request()->is('gallery/*') ? 'active' : '' }}">

                    <a href="javascript:void(0)">Gallery</a>

                    <ul class="dropdown-menu">

                        <li class="{{ request()->is('gallery/patients') ? 'active' : '' }}"><a href="{{route('patient-gallery')}}">Before / after</a></li>

                        <li class="{{ request()->is('gallery/office') ? 'active' : '' }}"><a href="{{route('office-gallery')}}">The Office</a></li>

                    </ul>

                </li>

                <!-- <li class="{{ request()->is('posts/news') ? 'active' : '' }}"><a href="{{route('blog', ['news'])}}">News</a></li> -->

                <li class="{{ request()->is('posts/blog') ? 'active' : '' }}"><a href="{{route('blog', ['blog'])}}">Blog</a></li>

                <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="{{route('page', ['contact-us'])}}">Contact us</a></li>

            </ul>

            <div class="navigation-slide-open"><i class="hamburger js-navigation-slide-open"></i></div>

        </div>

    </div>

</header>

