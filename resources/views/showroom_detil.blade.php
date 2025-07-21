@extends('frontend.templates.main_demo_layout')

@section('title')
    <title>{{ html_decode($showroom->title) }}</title>
    <meta name="title" content="{{ $showroom->title }}">
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($showroom->description), 150) }}">
@endsection

@section('content')
    @php
        $currentLang = session()->get('front_lang');
        $images = explode(',', $showroom->images); // Separate multi images
    @endphp

    <!-- Breadcrumb -->
    <div class="alzatheme-breadcrumb" style="background-image: url({{ asset($general_setting->breadcrumb_image) }})">
        <div class="container">
            <h1 class="post__title">{{ $showroom->title }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                    <li><a href="{{ route('showrooms.index') }}">Showrooms</a></li>
                    <li aria-current="page">{{ $showroom->title }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="section alzatheme-section-padding">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="alzatheme-service-details-wrap">
                        @if(count($images))
                            <div class="row g-3">
                                @foreach($images as $image)
                                    <div class="col-6">
                                        <a href="{{ asset('storage/' . trim($image)) }}" target="_blank">
                                            <img src="{{ asset('storage/' . trim($image)) }}"
                                                 class="img-fluid rounded border"
                                                 style="cursor: zoom-in"
                                                 alt="Showroom Image">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="alzatheme-service-sidebar">
                        <div class="alzatheme-service-menu">
                            <ul>
                                @foreach($otherShowrooms as $item)
                                    <li>
                                        <a href="{{ route('showrooms.show', $item->id) }}">
                                            {{ $item->title }}
                                            <i class="ri-arrow-right-up-line"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>
@endsection
