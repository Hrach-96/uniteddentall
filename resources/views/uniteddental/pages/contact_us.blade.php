@extends('layout.app')

@section('meta')
    <title>@if(isset(json_decode($page->extras)->meta_title)) {{json_decode($page->extras)->meta_title}} @else UnitedDental @endif</title>
    <meta name="description" content="@if(isset(json_decode($page->extras)->meta_description)) {{json_decode($page->extras)->meta_description}} @endif">
    <meta name="keywords" content="@if(isset(json_decode($page->extras)->meta_keywords)) {{json_decode($page->extras)->meta_keywords}} @endif">
@stop

@section('content')
    <div class="contact-us">
        <h1 class="section-title text-center">Contact us</h1>
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-12 order-md-1">
                    <ul class="contact-us-info">
                        <li>
                            <i class="icon-location"></i>
                            <span>
                                <span class="contact-us-info-title">Address:</span>
                                <span class="value">{{Config::get('settings.address')}}</span>
                            </span>
                        </li>
                        <li>
                            <a href="tel:{{Config::get('settings.phone')}}" class="">
                                <i class="icon-phone-icon"></i>
                                <span>
                                    <span class="contact-us-info-title">Phone:</span>
                                    <span class="value">{{Config::get('settings.phone')}}</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <i class="icon-Fax"></i>
                            <span>
                                <span class="contact-us-info-title">Fax:</span>
                                <span class="value">{{Config::get('settings.fax')}}</span>
                            </span>
                        </li>
                        <li>
                            <a href="mailto:{{Config::get('settings.email')}}" class="">
                                <i class="icon-mail"></i>
                                <span>
                                    <span class="contact-us-info-title">Mail:</span>
                                    <span class="value">{{Config::get('settings.email')}}</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <i class="icon-working-hours"></i>
                            <span>
                                <span class="contact-us-info-title">Working Hours:</span>
                                <span class="contact-us-info-content">
                                    <span class="key">Monday - Friday:</span>
                                    <span class="value">{{Config::get('settings.monday-friday')}}</span>
                                </span>
                                <span class="contact-us-info-content">
                                    <span class="key">Saturday:</span>
                                    <span class="value">{{Config::get('settings.saturday')}}</span>
                                </span>
                                <span class="contact-us-info-content">
                                    <span class="key">Sunday:</span>
                                    <span class="value">{{Config::get('settings.sunday')}}</span>
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-7 col-sm-12">
                    @if(\Session::has('success'))
                        <div style="font-size: 16px; color: #6eac2c; margin-bottom: 15px">{{\Session::get('success')[0]}}</div>
                    @endif
                    <form action="{{route('sendmail_contact_us')}}" method="POST" class="row">
                        {{csrf_field()}}
                        <div class="col-6 col-sm-12">
                            <input type="text" name="name" value="{{ old('namename') }}" placeholder="Name" class="input {{ $errors->has('name') ? ' has-error' : '' }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <span>{{ $errors->first('name') }}</span>
                                </span>
                            @endif
                        </div>
                        <div class="col-6 col-sm-12">
                            <input type="text" name="surname" placeholder="Surname" class="input {{ $errors->has('surname') ? ' has-error' : '' }}">
                            @if ($errors->has('surname'))
                                <span class="help-block">
                                    <span>{{ $errors->first('surname') }}</span>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <input type="text" name="email" placeholder="Email" class="input {{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <textarea name="contact_message" placeholder="Message" class="input {{ $errors->has('contact_message') ? ' has-error' : '' }}"></textarea>
                            @if ($errors->has('contact_message'))
                                <span class="help-block">
                                    <span>{{ $errors->first('contact_message') }}</span>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <input type="submit" value="MAKE AN APPOINTMENT" class="btn secondary input-submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if($page->content)
            <div class="container">
                <div class="content">
                    {!! $page->content !!}
                </div>
            </div>
        @endif
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.7302943389254!2d-71.31212188430062!3d42.645877324995695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3a43f48f1b839%3A0xc0a3c9aef35974a9!2s131+Merrimack+St%2C+Lowell%2C+MA+01852%2C+USA!5e0!3m2!1sen!2s!4v1551709243650" width="100%" height="420" frameborder="0" style="border:0; vertical-align: bottom" allowfullscreen></iframe>
@stop