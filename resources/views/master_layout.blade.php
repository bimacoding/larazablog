@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title ??  config('app.name') }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title ??  config('app.name') }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description ??  config('app.name'))) !!}">
@endsection

@section('front-content')
    @include('frontend.templates.layouts.white_navbar')

    @yield('new-layout')


    @include('frontend.templates.layouts.footer')
@endsection
