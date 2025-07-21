@extends('frontend.templates.main_demo_layout')
@section('title')
    <title>{{ html_decode($service->title) }}</title>
    <meta name="title" content="{{ $service->seo_title }}">
    <meta name="description" content="{{ $service->seo_description }}">
@endsection

@section('content')
    @php
        $currentLang = session()->get('front_lang');
        $getSidebarCTAData = getContent('main_demo_sidebar_cta_section.content', true);
    @endphp
    <!-- Page Update -->
    <div class="alzatheme-breadcrumb" style="background-image: url({{ asset($general_setting->breadcrumb_image)}})">
        <div class="container">
            <h1 class="post__title">{{ __($service->translate->title) }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('translate.Services') }}</a></li>
                    <li aria-current="page"> {{ __($service->translate->title) }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section alzatheme-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="alzatheme-service-details-wrap">
                        <img data-aos="fade-up" data-aos-duration="800" src="{{ asset($service->background_image) }}" alt="" class="alzatheme-service-details-img">
                        <div class="alzatheme-service-details-item">
                            <h3>{{ __('translate.Overview') }}</h3>
                             {!! clean($service->translate->description) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="alzatheme-service-sidebar">
                        <div class="alzatheme-service-menu">
                            <ul>
                                @foreach($showServices as $service)
                                <li><a href="{{ route('service', $service->slug) }}">{{ __($service->title) }} <i class="ri-arrow-right-up-line"></i></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="alzatheme-service-contact" data-aos="fade-up" data-aos-duration="800">
                            <div class="alzatheme-service-contact-icon">
                               <span>
                                <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_541_338)">
                                    <mask id="mask0_541_338" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="49" height="49">
                                    <path d="M0.333984 0.3335H48.334V48.3335H0.333984V0.3335Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_541_338)">
                                    <path d="M9.70898 31.8335H7.83398C4.72739 31.8335 2.20898 29.3151 2.20898 26.2085C2.20898 23.1019 4.72739 20.5835 7.83398 20.5835H9.70898V31.8335Z" stroke="white" stroke-width="2.6" stroke-miterlimit="10"/>
                                    <path d="M38.959 31.8335H40.834C43.9406 31.8335 46.459 29.3151 46.459 26.2085C46.459 23.1019 43.9406 20.5835 40.834 20.5835H38.959V31.8335Z" stroke="white" stroke-width="2.6" stroke-miterlimit="10"/>
                                    <path d="M5.95898 20.9036V20.5835C5.95898 10.2282 13.9786 2.2085 24.334 2.2085C34.6893 2.2085 42.709 10.2282 42.709 20.5835V20.9036" stroke="white" stroke-width="2.6" stroke-miterlimit="10"/>
                                    <path d="M28.084 42.7085C28.084 44.7795 26.4051 46.4585 24.334 46.4585C22.263 46.4585 20.584 44.7795 20.584 42.7085C20.584 40.6375 22.263 38.9585 24.334 38.9585C26.4051 38.9585 28.084 40.6375 28.084 42.7085Z" stroke="white" stroke-width="2.6" stroke-miterlimit="10"/>
                                    <path d="M28.084 42.7085H35.209C39.3511 42.7085 42.709 39.3507 42.709 35.2085V31.5134" stroke="white" stroke-width="2.6" stroke-miterlimit="10"/>
                                    <path d="M16.834 16.8335V28.0835H20.584L24.334 31.8335L28.084 28.0835H31.834V16.8335H16.834Z" stroke="white" stroke-width="2.6" stroke-miterlimit="10"/>
                                    </g>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_541_338">
                                    <rect width="48" height="48" fill="white" transform="translate(0.333984 0.333496)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>

                               </span>
                            </div>
                            <h3> {{ getTranslatedValue($getSidebarCTAData,'heading', $currentLang) }}</h3>
                            <p>{{ getTranslatedValue($getSidebarCTAData,'description', $currentLang) }}</p>
                            <a class="alzatheme-default-btn" href="{{ getTranslatedValue($getSidebarCTAData,'button_link', $currentLang) }}" data-text="{{ getTranslatedValue($getSidebarCTAData,'button_text', $currentLang) }}">
                                <span class="btn-wraper">{{ getTranslatedValue($getSidebarCTAData,'button_text', $currentLang) }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->


@endsection
