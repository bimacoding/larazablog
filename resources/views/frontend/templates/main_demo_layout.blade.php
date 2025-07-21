@extends('layout')

@section('front-content')
@include('frontend.templates.layouts.white_navbar')
    <div class="search-overlay"></div>

    @yield('content')

<!-- Footer Section Start -->
    @unless(Route::is('contact-us'))
        @include('frontend.templates.layouts.main_demo_cta')
    @endunless
<footer class="alzatheme-footer-section dark-bg">
    <div class="container">
        <div class="alzatheme-footer-top alzatheme-section-padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="alzatheme-footer-textarea light-color">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($general_setting->logo) }}" alt="Logo">
                        </a>
                        <p>{{ $footer->about_us }}</p>
                        <div class="alzatheme-social-icon-box">
                            <ul>
                                <li>
                                    <a href="{{ @$footer->facebook }}">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->linkedin }}">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->twitter }}">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->instagram }}">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-4">
                    <div class="alzatheme-footer-menu">
                        <div class="alzatheme-footer-title">
                            <h5>{{ __('translate.Quick Links') }}</h5>
                        </div>
                        <ul>
                            <li><a href="{{ route('about-us') }}">{{ __('translate.About Us') }}</a></li>
                            <li><a href="{{ route('teams') }}">{{ __('translate.Our Team') }}</a></li>
                            <li><a href="{{ route('pricing') }}">{{ __('translate.Pricing') }}</a></li>
                            <li><a href="{{ route('blogs') }}">{{ __('translate.Blogs') }}</a></li>
                            <li><a href="{{ route('contact-us') }}">{{ __('translate.Contact Us') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-5">
                    <div class="alzatheme-footer-menu">
                        <div class="alzatheme-footer-title">
                            <h5>{{ __('translate.Services') }}</h5>
                        </div>
                        <ul>
                            @foreach($services as $service)
                                <li><a href="{{ $service->slug }}">{{ $service->translate?->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3">
                    <div class="alzatheme-footer-menu mb-0">
                        <div class="alzatheme-footer-title">
                            <h5>{{ __('translate.Information') }}</h5>
                        </div>
                        <ul>
                            <li><a href="{{ route('privacy-policy') }}">{{ __('translate.Privacy Policy') }}</a></li>
                            <li><a href="{{ route('terms-conditions') }}">{{ __('translate.Terms & Conditions') }}</a></li>
                            <li><a href="{{ route('faq') }}">{{__('Faqs')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="alzatheme-footer-bottom center">
            <div class="alzatheme-copywright">
                <p>  {{ $footer->copyright }}</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
@endsection
