<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    {{-- Title, description, keywords--}}

    @yield('meta')



    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" />

    {{--@if(App::isLocal())--}}

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    {{--@else--}}

    {{--<link rel="stylesheet" href="{{ mix('/css/app.css') }}">--}}

    {{--@endif--}}

    @stack('header_styles')

    @stack('header_scripts')



</head>

<body>

<!-- @yield('php_execution_time') -->



@include('layout.header')

@yield('breadcrumbs')



@yield('content')



@yield('pre_footer')



@include('layout.footer')



{{-- Ajax loader overlay --}}

<div class="hidden" id="loader">

    <div class="loader-bg"></div>

    <div class="loader"></div>

</div>

<link rel="stylesheet" href="{{ mix('/css/vendor.css') }}">

@stack('footer_styles')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{ mix('/js/vendor.js') }}"></script>

<script src="{{ mix('/js/app.js') }}"></script>



@if(env('APP_LIVE'))

    @include('uniteddental.partials._bookonline')

    <script>

        (function (i, s, o, g, r, a, m) {

            i['GoogleAnalyticsObject'] = r;

            i[r] = i[r] ||

                function () {

                    (i[r].q = i[r].q || []).push(arguments)

                }, i[r].l = 1 * new Date();

            i.initAnalytics = function() {

                a = s.createElement(o),

                    m = s.getElementsByTagName(o)[0];

                a.async = 1;

                a.src = g;

                m.parentNode.insertBefore(a, m)

            }

        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');



        ga('create', 'UA-142142809-1', 'auto');

        ga('send', 'pageview');

        function atOnload() {

            initAnalytics();

        }

        if (window.addEventListener) window.addEventListener("load", atOnload, false);

        else if (window.attachEvent) window.attachEvent("onload", atOnload);

        else window.onload = atOnload;

    </script>

@endif

@stack('footer_scripts')

</body>

</html>

