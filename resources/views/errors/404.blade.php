@extends('layout.app')

@php
  $error_number = 404;
@endphp

@section('meta')
  <title>Page not found.</title>
@stop

@section('content')
  <div class="error-page">
    <div class="container">
      @php
        $default_error_message = "Please <a href='javascript:history.back()''>go back</a> or return to <a href='".url('')."'>our homepage</a>.";
      @endphp
      <h1 class="section-title error-title">{!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}</h1>
    </div>
  </div>
@endsection