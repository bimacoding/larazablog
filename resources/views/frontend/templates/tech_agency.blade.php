@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@section('front-content')

<header class="site-header alzatheme-header-section site-header--menu-right" id="sticky-menu">
    <div class="alzatheme-header-top bg-accent">
        <div class="container">
            <div class="alzatheme-header-info-wrap">
                <div class="alzatheme-header-info ">
                    <ul>
                        <li><i class="ri-map-pin-2-fill"></i>{{ $footer->address }}</li>
                        <li><a href="tel:{{ $footer->phone }}"><i class="ri-phone-fill"></i>{{ $footer->phone }}</a></li>
                        <li><a href="mailto:{{ $footer->email }}"><i class="ri-mail-fill"></i>{{ $footer->email }}</a></li>
                    </ul>
                </div>

                <div class="alzatheme-header-info-right">
                    @if(config('app.ecommerce_view_show'))
                    <div class="cur_lun_login_item">
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10C10.75 9.30964 11.3096 8.75 12 8.75C12.6904 8.75 13.25 9.30964 13.25 10C13.25 10.4142 13.5858 10.75 14 10.75C14.4142 10.75 14.75 10.4142 14.75 10C14.75 8.74122 13.9043 7.67998 12.75 7.35352V6.5C12.75 6.08579 12.4142 5.75 12 5.75C11.5858 5.75 11.25 6.08579 11.25 6.5V7.35352C10.0957 7.67998 9.25 8.74122 9.25 10C9.25 11.5188 10.4812 12.75 12 12.75C12.6904 12.75 13.25 13.3096 13.25 14C13.25 14.6904 12.6904 15.25 12 15.25C11.3096 15.25 10.75 14.6904 10.75 14C10.75 13.5858 10.4142 13.25 10 13.25C9.58579 13.25 9.25 13.5858 9.25 14C9.25 15.2588 10.0957 16.32 11.25 16.6465V17.5C11.25 17.9142 11.5858 18.25 12 18.25C12.4142 18.25 12.75 17.9142 12.75 17.5V16.6465C13.9043 16.32 14.75 15.2588 14.75 14C14.75 12.4812 13.5188 11.25 12 11.25Z"
                        fill="white" />
                </svg>
              </span>
                        <form action="{{ route('currency-switcher') }}" id="currency_form">
                            <select id="currency_dropdown" class="js-example-basic-single" name="currency_code">
                                @foreach ($currency_list as $currency_item)
                                    <option
                                        {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }} value="{{ $currency_item->currency_code }}">{{ $currency_item->currency_name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    @endif

                    <div class="cur_lun_login_item">
              <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.87643 2.47813C7.18954 4.3671 6.75001 7.02637 6.75001 10C6.75001 10.3796 6.75718 10.754 6.7711 11.1224C7.79627 11.2054 8.87923 11.25 10 11.25C11.1208 11.25 12.2038 11.2054 13.2289 11.1224C13.2429 10.754 13.25 10.3796 13.25 10C13.25 7.02637 12.8105 4.3671 12.1236 2.47813C11.779 1.53057 11.3865 0.816517 10.9883 0.353377C10.8696 0.215345 10.7565 0.106123 10.6496 0.0207619C10.4349 0.00699121 10.2183 0 10 0C9.78177 0 9.56516 0.00699124 9.3504 0.020762C9.24349 0.106123 9.13042 0.215345 9.01175 0.353377C8.61357 0.816517 8.221 1.53057 7.87643 2.47813ZM13.1315 12.6346C12.1291 12.71 11.0797 12.75 10 12.75C8.92028 12.75 7.87096 12.71 6.86854 12.6346C7.04293 14.5326 7.40024 16.2123 7.87643 17.5219C8.221 18.4694 8.61357 19.1835 9.01175 19.6466C9.13042 19.7847 9.24348 19.8939 9.35039 19.9792C9.56516 19.993 9.78177 20 10 20C10.2183 20 10.4349 19.993 10.6496 19.9792C10.7565 19.8939 10.8696 19.7847 10.9883 19.6466C11.3865 19.1835 11.779 18.4694 12.1236 17.5219C12.5998 16.2123 12.9571 14.5326 13.1315 12.6346ZM5.26493 10.968C5.25504 10.6486 5.25001 10.3257 5.25001 10C5.25001 6.8985 5.70592 4.05777 6.46674 1.96552C6.67341 1.39719 6.90681 0.872262 7.16688 0.407001C3.12245 1.59958 0.144576 5.28026 0.00512695 9.67717C0.882073 10.0753 2.09222 10.433 3.56698 10.7066C4.104 10.8062 4.67155 10.8938 5.26493 10.968ZM0.0879116 11.3317C1.0045 11.6736 2.09274 11.9587 3.29339 12.1814C3.94235 12.3018 4.63038 12.4051 5.3503 12.4893C5.5238 14.6072 5.91514 16.5176 6.46674 18.0345C6.67341 18.6028 6.90681 19.1277 7.16688 19.593C3.43599 18.4929 0.612705 15.2755 0.0879116 11.3317ZM14.6497 12.4893C15.3697 12.4051 16.0577 12.3018 16.7066 12.1814C17.9073 11.9587 18.9955 11.6736 19.9121 11.3317C19.3873 15.2755 16.564 18.4929 12.8332 19.593C13.0932 19.1277 13.3266 18.6028 13.5333 18.0345C14.0849 16.5176 14.4762 14.6072 14.6497 12.4893ZM19.9949 9.67717C19.118 10.0753 17.9078 10.433 16.4331 10.7066C15.896 10.8062 15.3285 10.8938 14.7351 10.968C14.745 10.6486 14.75 10.3257 14.75 10C14.75 6.8985 14.2941 4.05777 13.5333 1.96552C13.3266 1.39719 13.0932 0.872265 12.8332 0.407004C16.8776 1.59958 19.8555 5.28026 19.9949 9.67717Z"
                        fill="white" />
                </svg>
              </span>
                        <form action="{{ route('language-switcher') }}" id="language_form">
                            <select id="language_dropdown" class="js-example-basic-single" name="lang_code">
                                @foreach ($language_list as $language_item)
                                    <option {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }} value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    @if(config('app.ecommerce_view_show'))
                    <div class="cur_lun_login_item">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11ZM12 21C15.866 21 19 19.2091 19 17C19 14.7909 15.866 13 12 13C8.13401 13 5 14.7909 5 17C5 19.2091 8.13401 21 12 21Z"
                                        fill="white" />
                                </svg>
                            </span>

                        @auth
                            <a href="{{ route('user.dashboard') }}" class="login-btn">{{ __('translate.Dashboard') }}</a>
                        @else
                            <a href="{{ route('user.login') }}" class="login-btn">{{ __('translate.Login') }}</a>
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="alzatheme-header-bottom p-0">
        <div class="container">
            <div class="header-bottom-border">
                <nav class="navbar site-navbar">
                    <!-- Brand Logo-->
                    <div class="brand-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($general_setting->white_logo) }}" alt="" class="light-version-logo">
                        </a>
                    </div>

                    @include('frontend.templates.layouts._menu_nav', ['menuTheme' => 'light-color'])


                    <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                        <div class="alzatheme-header-icon">
                            <div class="alzatheme-header-search light-color">
                                <i class="ri-search-line"></i>
                            </div>
                            @if(config('app.ecommerce_view_show'))
                            @include('frontend.templates.layouts._cart')
                            @endif
                            <div class="alzatheme-header-barger">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <!-- mobile menu trigger -->
                    <div class="mobile-menu-trigger light-color">
                        <span></span>
                    </div>
                    <!--/.Mobile Menu Hamburger Ends-->
                </nav>
            </div>
        </div>
    </div>

</header>

 @include('frontend.templates.layouts.search_bar')
<div class="search-overlay"></div>
<!--End search -->

<div class="alzatheme-sidemenu-wraper">
    <div class="alzatheme-sidemenu-column">
        <div class="alzatheme-sidemenu-body">
            <div class="alzatheme-sidemenu-logo">
                <a href="{{ route('home') }}"><img src="{{ asset($general_setting->logo) }}" alt=""></a>
            </div>
            <p>{{ $footer->about_us }}</p>
            <div class="alzatheme-social-icon-box style-two">
                <ul>
                    <li>
                        <a href="{{ $footer->facebook }}">
                            <i class="ri-facebook-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $footer->linkedin }}">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $footer->twitter }}">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $footer->instagram }}">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="alzatheme-sidemenu-thumb">
            </div>
            <div class="alzatheme-contact-info-wrap">
                <div class="alzatheme-contact-info">
                    <i class="ri-map-pin-2-fill"></i>
                    <h5>{{ __('translate.Address') }}</h5>
                    <p>{{ $footer->address }}</p>
                </div>
                <div class="alzatheme-contact-info">
                    <i class="ri-mail-fill"></i>
                    <h5>{{ __('translate.Contact') }}</h5>
                    <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                    <a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a>
                </div>
            </div>

        </div>
        <span class="alzatheme-sidemenu-close">
        <i class="ri-close-line"></i>
      </span>
    </div>
    <div class="offcanvas-overlay"></div>
</div>

<div class="offcanves-menu"></div>

    @php
       $currentLang = session()->get('front_lang');
       $heroSection = getContent('tech_agency_hero_section.content', true);
       $brandContent = getContent('tech_agency_brand_section.content', true);
       $serviceContent = getContent('main_demo_service_section.content', true);
       $aboutUsContent = getContent('main_demo_about_us.content', true);
       $agencyFeatureSection = getContent('digital_agency_feature_section.content', true);
       $blogContent = getContent('main_demo_blog_section.content', true);
       $ctaContent = getContent('main_demo_cta_section.content', true);
    @endphp
<main>

    <div class="alzatheme-hero-section3 bg-cover tech-agency-img">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="alzatheme-hero-content">
                        <h1>{{ getTranslatedValue($heroSection, 'heading', $currentLang) }}</h1>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 d-flex align-items-center" data-aos="fade-up" data-aos-duration="600">
                    <div class="alzatheme-hero-content">
                        <p>{{ getTranslatedValue($heroSection, 'description', $currentLang) }}</p>
                        <div class="alzatheme-extra-mt">
                            <div class="alzatheme-btn-wrap">
                                <a class="alzatheme-default-btn" href="{{ getTranslatedValue($heroSection, 'left_button_url', $currentLang) }}" data-text="{{ getTranslatedValue($heroSection, 'left_button_text', $currentLang) }}">
                                    <span class="btn-wraper">{{ getTranslatedValue($heroSection, 'left_button_text', $currentLang) }}
                                    </span>
                                </a>
                                <a class="alzatheme-default-btn alzatheme-white-btn" href="{{ getTranslatedValue($heroSection, 'right_button_url', $currentLang) }}" data-text="{{ getTranslatedValue($heroSection, 'right_button_text', $currentLang) }}">
                                    <span class="btn-wraper">{{ getTranslatedValue($heroSection, 'right_button_text', $currentLang) }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alzatheme-hero-thumb3" data-aos="fade-up" data-aos-duration="800">
                <img src="{{ asset(getImage($heroSection, 'hero_image')) }}" alt="" class="full-img">
            </div>
            <div class="alzatheme-brand-section">
                <div class="alzatheme-brand-title">
                    <p>{{ getTranslatedValue($brandContent, 'heading', $currentLang) }}</p>
                </div>

                @php
                    $images = $brandContent->data_values['images'] ?? [];
                @endphp

                <div class="alzatheme-brand-slider">
                @foreach($images as $key => $imagePath)
                    <div class="alzatheme-brand-item">
                        <img src="{{ asset($imagePath) }}" alt="{{ $key }}">
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand section -->

    <div class="section alzatheme-section-padding">
        <div class="container">
          <div class="alzatheme-section-title center">
            <h2>{{ getTranslatedValue($serviceContent, 'heading', $currentLang) }}</h2>
          </div>
          <div class="alzatheme-4column-slider2" data-aos="fade-up" data-aos-duration="800">

            @foreach($listings as $listing)
                <div class="alzatheme-service-box">
                <div class="alzatheme-service-thumb alzatheme-service-thumb-agency">
                    <img src="{{ asset($listing->background_image) }}" alt="" class="full-img">
                    <div class="alzatheme-service-data">
                    <div class="alzatheme-service-icon">
                        <img src="{{ asset($listing->thumb_image) }}" alt="">
                    </div>
                    <a href="{{ route('service', $listing->slug) }}">
                        <h5>{{ $listing->translate?->title }}</h5>
                    </a>
                    </div>
                </div>
                </div>
            @endforeach


          </div>
        </div>
      </div>


    <div class="section large-padding-tb4 overflow-hidden bg-light1">
        <div class="container">
            <div id="alzatheme-counter"></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alzatheme-thumb extra-mr">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ asset(getImage($aboutUsContent, 'image_1')) }}" alt="">
                        <div class="alzatheme-thumb-position" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ asset(getImage($aboutUsContent, 'image_2')) }}" alt="">
                        </div>
                        <div class="alzatheme-shape1">
                            <span>
                                <svg width="133" height="200" viewBox="0 0 133 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.20001 68.8C0.500012 68.8 0 69.4001 0 70.1001C0 70.8001 0.500012 71.4 1.20001 71.4C1.90001 71.4 2.5 70.8001 2.5 70.1001C2.5 69.4001 1.90001 68.8 1.20001 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.20001 80.5C0.500012 80.5 0 81 0 81.7C0 82.4 0.500012 83 1.20001 83C1.90001 83 2.5 82.4 2.5 81.7C2.5 81 1.90001 80.5 1.20001 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 68.8C14.9 68.8 14.4 69.4001 14.4 70.1001C14.4 70.8001 14.9 71.4 15.6 71.4C16.3 71.4 16.9 70.8001 16.9 70.1001C16.9 69.4001 16.3 68.8 15.6 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 80.5C14.9 80.5 14.4 81 14.4 81.7C14.4 82.4 14.9 83 15.6 83C16.3 83 16.9 82.4 16.9 81.7C16.9 81 16.3 80.5 15.6 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.0001 68.8C29.3001 68.8 28.8 69.4001 28.8 70.1001C28.8 70.8001 29.3001 71.4 30.0001 71.4C30.7001 71.4 31.3 70.8001 31.3 70.1001C31.3 69.4001 30.7001 68.8 30.0001 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.0001 80.5C29.3001 80.5 28.8 81 28.8 81.7C28.8 82.4 29.3001 83 30.0001 83C30.7001 83 31.3 82.4 31.3 81.7C31.3 81 30.7001 80.5 30.0001 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.4 68.8C43.7 68.8 43.1 69.4001 43.1 70.1001C43.1 70.8001 43.7 71.4 44.4 71.4C45.1 71.4 45.7 70.8001 45.7 70.1001C45.7 69.4001 45.1 68.8 44.4 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.4 80.5C43.7 80.5 43.1 81 43.1 81.7C43.1 82.4 43.7 83 44.4 83C45.1 83 45.7 82.4 45.7 81.7C45.7 81 45.1 80.5 44.4 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 68.8C58.1 68.8 57.5 69.4001 57.5 70.1001C57.5 70.8001 58.1 71.4 58.8 71.4C59.5 71.4 60.1 70.8001 60.1 70.1001C60.1 69.4001 59.5 68.8 58.8 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 80.5C58.1 80.5 57.5 81 57.5 81.7C57.5 82.4 58.1 83 58.8 83C59.5 83 60.1 82.4 60.1 81.7C60.1 81 59.5 80.5 58.8 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 138.8C73.2999 138.8 72.7 139.4 72.7 140.1C72.7 140.8 73.2999 141.4 73.9999 141.4C74.6999 141.4 75.2 140.8 75.2 140.1C75.2 139.4 74.6999 138.8 73.9999 138.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 150.5C73.2999 150.5 72.7 151.1 72.7 151.8C72.7 152.5 73.2999 153.1 73.9999 153.1C74.6999 153.1 75.2 152.5 75.2 151.8C75.2 151.1 74.6999 150.5 73.9999 150.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 162.2C73.2999 162.2 72.7 162.7 72.7 163.4C72.7 164.1 73.2999 164.7 73.9999 164.7C74.6999 164.7 75.2 164.1 75.2 163.4C75.2 162.7 74.6999 162.2 73.9999 162.2Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 173.8C73.2999 173.8 72.7 174.4 72.7 175.1C72.7 175.8 73.2999 176.4 73.9999 176.4C74.6999 176.4 75.2 175.8 75.2 175.1C75.2 174.4 74.6999 173.8 73.9999 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 185.5C73.2999 185.5 72.7 186 72.7 186.8C72.7 187.5 73.2999 188 73.9999 188C74.6999 188 75.2 187.5 75.2 186.8C75.2 186 74.6999 185.5 73.9999 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 197.1C73.2999 197.1 72.7 197.7 72.7 198.4C72.7 199.1 73.2999 199.7 73.9999 199.7C74.6999 199.7 75.2 199.1 75.2 198.4C75.2 197.7 74.6999 197.1 73.9999 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 138.8C87.7 138.8 87.1 139.4 87.1 140.1C87.1 140.8 87.7 141.4 88.4 141.4C89.1 141.4 89.6 140.8 89.6 140.1C89.6 139.4 89.1 138.8 88.4 138.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 150.5C87.7 150.5 87.1 151.1 87.1 151.8C87.1 152.5 87.7 153.1 88.4 153.1C89.1 153.1 89.6 152.5 89.6 151.8C89.6 151.1 89.1 150.5 88.4 150.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 162.2C87.7 162.2 87.1 162.7 87.1 163.4C87.1 164.1 87.7 164.7 88.4 164.7C89.1 164.7 89.6 164.1 89.6 163.4C89.6 162.7 89.1 162.2 88.4 162.2Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 173.8C87.7 173.8 87.1 174.4 87.1 175.1C87.1 175.8 87.7 176.4 88.4 176.4C89.1 176.4 89.6 175.8 89.6 175.1C89.6 174.4 89.1 173.8 88.4 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 185.5C87.7 185.5 87.1 186 87.1 186.8C87.1 187.5 87.7 188 88.4 188C89.1 188 89.6 187.5 89.6 186.8C89.6 186 89.1 185.5 88.4 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 197.1C87.7 197.1 87.1 197.7 87.1 198.4C87.1 199.1 87.7 199.7 88.4 199.7C89.1 199.7 89.6 199.1 89.6 198.4C89.6 197.7 89.1 197.1 88.4 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 173.8C102 173.8 101.5 174.4 101.5 175.1C101.5 175.8 102 176.4 102.7 176.4C103.4 176.4 104 175.8 104 175.1C104 174.4 103.4 173.8 102.7 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 185.5C102 185.5 101.5 186 101.5 186.8C101.5 187.5 102 188 102.7 188C103.4 188 104 187.5 104 186.8C104 186 103.4 185.5 102.7 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 197.1C102 197.1 101.5 197.7 101.5 198.4C101.5 199.1 102 199.7 102.7 199.7C103.4 199.7 104 199.1 104 198.4C104 197.7 103.4 197.1 102.7 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 173.8C116.4 173.8 115.9 174.4 115.9 175.1C115.9 175.8 116.4 176.4 117.1 176.4C117.8 176.4 118.4 175.8 118.4 175.1C118.4 174.4 117.8 173.8 117.1 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 185.5C116.4 185.5 115.9 186 115.9 186.8C115.9 187.5 116.4 188 117.1 188C117.8 188 118.4 187.5 118.4 186.8C118.4 186 117.8 185.5 117.1 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 197.1C116.4 197.1 115.9 197.7 115.9 198.4C115.9 199.1 116.4 199.7 117.1 199.7C117.8 199.7 118.4 199.1 118.4 198.4C118.4 197.7 117.8 197.1 117.1 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 173.8C130.8 173.8 130.3 174.4 130.3 175.1C130.3 175.8 130.8 176.4 131.5 176.4C132.2 176.4 132.8 175.8 132.8 175.1C132.8 174.4 132.2 173.8 131.5 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 185.5C130.8 185.5 130.3 186 130.3 186.8C130.3 187.5 130.8 188 131.5 188C132.2 188 132.8 187.5 132.8 186.8C132.8 186 132.2 185.5 131.5 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 197.1C130.8 197.1 130.3 197.7 130.3 198.4C130.3 199.1 130.8 199.7 131.5 199.7C132.2 199.7 132.8 199.1 132.8 198.4C132.8 197.7 132.2 197.1 131.5 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 68.8C73.2999 68.8 72.7 69.4001 72.7 70.1001C72.7 70.8001 73.2999 71.4 73.9999 71.4C74.6999 71.4 75.2 70.8001 75.2 70.1001C75.2 69.4001 74.6999 68.8 73.9999 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 80.5C73.2999 80.5 72.7 81 72.7 81.7C72.7 82.4 73.2999 83 73.9999 83C74.6999 83 75.2 82.4 75.2 81.7C75.2 81 74.6999 80.5 73.9999 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 92.1001C73.2999 92.1001 72.7 92.7001 72.7 93.4001C72.7 94.1001 73.2999 94.7001 73.9999 94.7001C74.6999 94.7001 75.2 94.1001 75.2 93.4001C75.2 92.7001 74.6999 92.1001 73.9999 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 103.8C73.2999 103.8 72.7 104.3 72.7 105.1C72.7 105.8 73.2999 106.3 73.9999 106.3C74.6999 106.3 75.2 105.8 75.2 105.1C75.2 104.3 74.6999 103.8 73.9999 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 115.4C73.2999 115.4 72.7 116 72.7 116.7C72.7 117.4 73.2999 118 73.9999 118C74.6999 118 75.2 117.4 75.2 116.7C75.2 116 74.6999 115.4 73.9999 115.4Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 127.1C73.2999 127.1 72.7 127.7 72.7 128.4C72.7 129.1 73.2999 129.7 73.9999 129.7C74.6999 129.7 75.2 129.1 75.2 128.4C75.2 127.7 74.6999 127.1 73.9999 127.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 68.8C87.7 68.8 87.1 69.4001 87.1 70.1001C87.1 70.8001 87.7 71.4 88.4 71.4C89.1 71.4 89.6 70.8001 89.6 70.1001C89.6 69.4001 89.1 68.8 88.4 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 80.5C87.7 80.5 87.1 81 87.1 81.7C87.1 82.4 87.7 83 88.4 83C89.1 83 89.6 82.4 89.6 81.7C89.6 81 89.1 80.5 88.4 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 92.1001C87.7 92.1001 87.1 92.7001 87.1 93.4001C87.1 94.1001 87.7 94.7001 88.4 94.7001C89.1 94.7001 89.6 94.1001 89.6 93.4001C89.6 92.7001 89.1 92.1001 88.4 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 103.8C87.7 103.8 87.1 104.3 87.1 105.1C87.1 105.8 87.7 106.3 88.4 106.3C89.1 106.3 89.6 105.8 89.6 105.1C89.6 104.3 89.1 103.8 88.4 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 115.4C87.7 115.4 87.1 116 87.1 116.7C87.1 117.4 87.7 118 88.4 118C89.1 118 89.6 117.4 89.6 116.7C89.6 116 89.1 115.4 88.4 115.4Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 127.1C87.7 127.1 87.1 127.7 87.1 128.4C87.1 129.1 87.7 129.7 88.4 129.7C89.1 129.7 89.6 129.1 89.6 128.4C89.6 127.7 89.1 127.1 88.4 127.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 68.8C102 68.8 101.5 69.4001 101.5 70.1001C101.5 70.8001 102 71.4 102.7 71.4C103.4 71.4 104 70.8001 104 70.1001C104 69.4001 103.4 68.8 102.7 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 80.5C102 80.5 101.5 81 101.5 81.7C101.5 82.4 102 83 102.7 83C103.4 83 104 82.4 104 81.7C104 81 103.4 80.5 102.7 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 92.1001C102 92.1001 101.5 92.7001 101.5 93.4001C101.5 94.1001 102 94.7001 102.7 94.7001C103.4 94.7001 104 94.1001 104 93.4001C104 92.7001 103.4 92.1001 102.7 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 103.8C102 103.8 101.5 104.3 101.5 105.1C101.5 105.8 102 106.3 102.7 106.3C103.4 106.3 104 105.8 104 105.1C104 104.3 103.4 103.8 102.7 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 68.8C116.4 68.8 115.9 69.4001 115.9 70.1001C115.9 70.8001 116.4 71.4 117.1 71.4C117.8 71.4 118.4 70.8001 118.4 70.1001C118.4 69.4001 117.8 68.8 117.1 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 80.5C116.4 80.5 115.9 81 115.9 81.7C115.9 82.4 116.4 83 117.1 83C117.8 83 118.4 82.4 118.4 81.7C118.4 81 117.8 80.5 117.1 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 92.1001C116.4 92.1001 115.9 92.7001 115.9 93.4001C115.9 94.1001 116.4 94.7001 117.1 94.7001C117.8 94.7001 118.4 94.1001 118.4 93.4001C118.4 92.7001 117.8 92.1001 117.1 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 103.8C116.4 103.8 115.9 104.3 115.9 105.1C115.9 105.8 116.4 106.3 117.1 106.3C117.8 106.3 118.4 105.8 118.4 105.1C118.4 104.3 117.8 103.8 117.1 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 68.8C130.8 68.8 130.3 69.4001 130.3 70.1001C130.3 70.8001 130.8 71.4 131.5 71.4C132.2 71.4 132.8 70.8001 132.8 70.1001C132.8 69.4001 132.2 68.8 131.5 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 80.5C130.8 80.5 130.3 81 130.3 81.7C130.3 82.4 130.8 83 131.5 83C132.2 83 132.8 82.4 132.8 81.7C132.8 81 132.2 80.5 131.5 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 92.1001C130.8 92.1001 130.3 92.7001 130.3 93.4001C130.3 94.1001 130.8 94.7001 131.5 94.7001C132.2 94.7001 132.8 94.1001 132.8 93.4001C132.8 92.7001 132.2 92.1001 131.5 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 103.8C130.8 103.8 130.3 104.3 130.3 105.1C130.3 105.8 130.8 106.3 131.5 106.3C132.2 106.3 132.8 105.8 132.8 105.1C132.8 104.3 132.2 103.8 131.5 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.20001 46.7C0.500012 46.7 0 47.1999 0 47.8999C0 48.6999 0.500012 49.2 1.20001 49.2C1.90001 49.2 2.5 48.6999 2.5 47.8999C2.5 47.1999 1.90001 46.7 1.20001 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.20001 58.3C0.500012 58.3 0 58.9001 0 59.6001C0 60.3001 0.500012 60.9 1.20001 60.9C1.90001 60.9 2.5 60.3001 2.5 59.6001C2.5 58.9001 1.90001 58.3 1.20001 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 46.7C14.9 46.7 14.4 47.1999 14.4 47.8999C14.4 48.6999 14.9 49.2 15.6 49.2C16.3 49.2 16.9 48.6999 16.9 47.8999C16.9 47.1999 16.3 46.7 15.6 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 58.3C14.9 58.3 14.4 58.9001 14.4 59.6001C14.4 60.3001 14.9 60.9 15.6 60.9C16.3 60.9 16.9 60.3001 16.9 59.6001C16.9 58.9001 16.3 58.3 15.6 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.0001 46.7C29.3001 46.7 28.8 47.1999 28.8 47.8999C28.8 48.6999 29.3001 49.2 30.0001 49.2C30.7001 49.2 31.3 48.6999 31.3 47.8999C31.3 47.1999 30.7001 46.7 30.0001 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.0001 58.3C29.3001 58.3 28.8 58.9001 28.8 59.6001C28.8 60.3001 29.3001 60.9 30.0001 60.9C30.7001 60.9 31.3 60.3001 31.3 59.6001C31.3 58.9001 30.7001 58.3 30.0001 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.4 46.7C43.7 46.7 43.1 47.1999 43.1 47.8999C43.1 48.6999 43.7 49.2 44.4 49.2C45.1 49.2 45.7 48.6999 45.7 47.8999C45.7 47.1999 45.1 46.7 44.4 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.4 58.3C43.7 58.3 43.1 58.9001 43.1 59.6001C43.1 60.3001 43.7 60.9 44.4 60.9C45.1 60.9 45.7 60.3001 45.7 59.6001C45.7 58.9001 45.1 58.3 44.4 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 0C58.1 0 57.5 0.600003 57.5 1.3C57.5 2 58.1 2.60001 58.8 2.60001C59.5 2.60001 60.1 2 60.1 1.3C60.1 0.600003 59.5 0 58.8 0Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 11.7C58.1 11.7 57.5 12.3 57.5 13C57.5 13.7 58.1 14.3 58.8 14.3C59.5 14.3 60.1 13.7 60.1 13C60.1 12.3 59.5 11.7 58.8 11.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 23.3C58.1 23.3 57.5 23.9001 57.5 24.6001C57.5 25.3001 58.1 25.9 58.8 25.9C59.5 25.9 60.1 25.3001 60.1 24.6001C60.1 23.9001 59.5 23.3 58.8 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 35C58.1 35 57.5 35.6 57.5 36.3C57.5 37 58.1 37.6 58.8 37.6C59.5 37.6 60.1 37 60.1 36.3C60.1 35.6 59.5 35 58.8 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 46.7C58.1 46.7 57.5 47.1999 57.5 47.8999C57.5 48.6999 58.1 49.2 58.8 49.2C59.5 49.2 60.1 48.6999 60.1 47.8999C60.1 47.1999 59.5 46.7 58.8 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M58.8 58.3C58.1 58.3 57.5 58.9001 57.5 59.6001C57.5 60.3001 58.1 60.9 58.8 60.9C59.5 60.9 60.1 60.3001 60.1 59.6001C60.1 58.9001 59.5 58.3 58.8 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 0C73.2999 0 72.7 0.600003 72.7 1.3C72.7 2 73.2999 2.60001 73.9999 2.60001C74.6999 2.60001 75.2 2 75.2 1.3C75.2 0.600003 74.6999 0 73.9999 0Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 11.7C73.2999 11.7 72.7 12.3 72.7 13C72.7 13.7 73.2999 14.3 73.9999 14.3C74.6999 14.3 75.2 13.7 75.2 13C75.2 12.3 74.6999 11.7 73.9999 11.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 23.3C73.2999 23.3 72.7 23.9001 72.7 24.6001C72.7 25.3001 73.2999 25.9 73.9999 25.9C74.6999 25.9 75.2 25.3001 75.2 24.6001C75.2 23.9001 74.6999 23.3 73.9999 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 35C73.2999 35 72.7 35.6 72.7 36.3C72.7 37 73.2999 37.6 73.9999 37.6C74.6999 37.6 75.2 37 75.2 36.3C75.2 35.6 74.6999 35 73.9999 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 46.7C73.2999 46.7 72.7 47.1999 72.7 47.8999C72.7 48.6999 73.2999 49.2 73.9999 49.2C74.6999 49.2 75.2 48.6999 75.2 47.8999C75.2 47.1999 74.6999 46.7 73.9999 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M73.9999 58.3C73.2999 58.3 72.7 58.9001 72.7 59.6001C72.7 60.3001 73.2999 60.9 73.9999 60.9C74.6999 60.9 75.2 60.3001 75.2 59.6001C75.2 58.9001 74.6999 58.3 73.9999 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 23.3C87.7 23.3 87.1 23.9001 87.1 24.6001C87.1 25.3001 87.7 25.9 88.4 25.9C89.1 25.9 89.6 25.3001 89.6 24.6001C89.6 23.9001 89.1 23.3 88.4 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 35C87.7 35 87.1 35.6 87.1 36.3C87.1 37 87.7 37.6 88.4 37.6C89.1 37.6 89.6 37 89.6 36.3C89.6 35.6 89.1 35 88.4 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 46.7C87.7 46.7 87.1 47.1999 87.1 47.8999C87.1 48.6999 87.7 49.2 88.4 49.2C89.1 49.2 89.6 48.6999 89.6 47.8999C89.6 47.1999 89.1 46.7 88.4 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.4 58.3C87.7 58.3 87.1 58.9001 87.1 59.6001C87.1 60.3001 87.7 60.9 88.4 60.9C89.1 60.9 89.6 60.3001 89.6 59.6001C89.6 58.9001 89.1 58.3 88.4 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 23.3C102 23.3 101.5 23.9001 101.5 24.6001C101.5 25.3001 102 25.9 102.7 25.9C103.4 25.9 104 25.3001 104 24.6001C104 23.9001 103.4 23.3 102.7 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 35C102 35 101.5 35.6 101.5 36.3C101.5 37 102 37.6 102.7 37.6C103.4 37.6 104 37 104 36.3C104 35.6 103.4 35 102.7 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 46.7C102 46.7 101.5 47.1999 101.5 47.8999C101.5 48.6999 102 49.2 102.7 49.2C103.4 49.2 104 48.6999 104 47.8999C104 47.1999 103.4 46.7 102.7 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 58.3C102 58.3 101.5 58.9001 101.5 59.6001C101.5 60.3001 102 60.9 102.7 60.9C103.4 60.9 104 60.3001 104 59.6001C104 58.9001 103.4 58.3 102.7 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 23.3C116.4 23.3 115.9 23.9001 115.9 24.6001C115.9 25.3001 116.4 25.9 117.1 25.9C117.8 25.9 118.4 25.3001 118.4 24.6001C118.4 23.9001 117.8 23.3 117.1 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 35C116.4 35 115.9 35.6 115.9 36.3C115.9 37 116.4 37.6 117.1 37.6C117.8 37.6 118.4 37 118.4 36.3C118.4 35.6 117.8 35 117.1 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 46.7C116.4 46.7 115.9 47.1999 115.9 47.8999C115.9 48.6999 116.4 49.2 117.1 49.2C117.8 49.2 118.4 48.6999 118.4 47.8999C118.4 47.1999 117.8 46.7 117.1 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.1 58.3C116.4 58.3 115.9 58.9001 115.9 59.6001C115.9 60.3001 116.4 60.9 117.1 60.9C117.8 60.9 118.4 60.3001 118.4 59.6001C118.4 58.9001 117.8 58.3 117.1 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 23.3C130.8 23.3 130.3 23.9001 130.3 24.6001C130.3 25.3001 130.8 25.9 131.5 25.9C132.2 25.9 132.8 25.3001 132.8 24.6001C132.8 23.9001 132.2 23.3 131.5 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 35C130.8 35 130.3 35.6 130.3 36.3C130.3 37 130.8 37.6 131.5 37.6C132.2 37.6 132.8 37 132.8 36.3C132.8 35.6 132.2 35 131.5 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 46.7C130.8 46.7 130.3 47.1999 130.3 47.8999C130.3 48.6999 130.8 49.2 131.5 49.2C132.2 49.2 132.8 48.6999 132.8 47.8999C132.8 47.1999 132.2 46.7 131.5 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.5 58.3C130.8 58.3 130.3 58.9001 130.3 59.6001C130.3 60.3001 130.8 60.9 131.5 60.9C132.2 60.9 132.8 60.3001 132.8 59.6001C132.8 58.9001 132.2 58.3 131.5 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.20001 68.8C0.500012 68.8 0 69.4001 0 70.1001C0 70.8001 0.500012 71.4 1.20001 71.4C1.90001 71.4 2.5 70.8001 2.5 70.1001C2.5 69.4001 1.90001 68.8 1.20001 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.20001 80.5C0.500012 80.5 0 81 0 81.7C0 82.4 0.500012 83 1.20001 83C1.90001 83 2.5 82.4 2.5 81.7C2.5 81 1.90001 80.5 1.20001 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 68.8C14.9 68.8 14.4 69.4001 14.4 70.1001C14.4 70.8001 14.9 71.4 15.6 71.4C16.3 71.4 16.9 70.8001 16.9 70.1001C16.9 69.4001 16.3 68.8 15.6 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 80.5C14.9 80.5 14.4 81 14.4 81.7C14.4 82.4 14.9 83 15.6 83C16.3 83 16.9 82.4 16.9 81.7C16.9 81 16.3 80.5 15.6 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.0001 68.8C29.3001 68.8 28.8 69.4001 28.8 70.1001C28.8 70.8001 29.3001 71.4 30.0001 71.4C30.7001 71.4 31.3 70.8001 31.3 70.1001C31.3 69.4001 30.7001 68.8 30.0001 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.0001 80.5C29.3001 80.5 28.8 81 28.8 81.7C28.8 82.4 29.3001 83 30.0001 83C30.7001 83 31.3 82.4 31.3 81.7C31.3 81 30.7001 80.5 30.0001 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.4 68.8C43.7 68.8 43.1 69.4001 43.1 70.1001C43.1 70.8001 43.7 71.4 44.4 71.4C45.1 71.4 45.7 70.8001 45.7 70.1001C45.7 69.4001 45.1 68.8 44.4 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.4 80.5C43.7 80.5 43.1 81 43.1 81.7C43.1 82.4 43.7 83 44.4 83C45.1 83 45.7 82.4 45.7 81.7C45.7 81 45.1 80.5 44.4 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M58.8 68.8C58.1 68.8 57.5 69.4001 57.5 70.1001C57.5 70.8001 58.1 71.4 58.8 71.4C59.5 71.4 60.1 70.8001 60.1 70.1001C60.1 69.4001 59.5 68.8 58.8 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M58.8 80.5C58.1 80.5 57.5 81 57.5 81.7C57.5 82.4 58.1 83 58.8 83C59.5 83 60.1 82.4 60.1 81.7C60.1 81 59.5 80.5 58.8 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 173.8C102 173.8 101.5 174.4 101.5 175.1C101.5 175.8 102 176.4 102.7 176.4C103.4 176.4 104 175.8 104 175.1C104 174.4 103.4 173.8 102.7 173.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 185.5C102 185.5 101.5 186 101.5 186.8C101.5 187.5 102 188 102.7 188C103.4 188 104 187.5 104 186.8C104 186 103.4 185.5 102.7 185.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 197.1C102 197.1 101.5 197.7 101.5 198.4C101.5 199.1 102 199.7 102.7 199.7C103.4 199.7 104 199.1 104 198.4C104 197.7 103.4 197.1 102.7 197.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 173.8C116.4 173.8 115.9 174.4 115.9 175.1C115.9 175.8 116.4 176.4 117.1 176.4C117.8 176.4 118.4 175.8 118.4 175.1C118.4 174.4 117.8 173.8 117.1 173.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 185.5C116.4 185.5 115.9 186 115.9 186.8C115.9 187.5 116.4 188 117.1 188C117.8 188 118.4 187.5 118.4 186.8C118.4 186 117.8 185.5 117.1 185.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 197.1C116.4 197.1 115.9 197.7 115.9 198.4C115.9 199.1 116.4 199.7 117.1 199.7C117.8 199.7 118.4 199.1 118.4 198.4C118.4 197.7 117.8 197.1 117.1 197.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 173.8C130.8 173.8 130.3 174.4 130.3 175.1C130.3 175.8 130.8 176.4 131.5 176.4C132.2 176.4 132.8 175.8 132.8 175.1C132.8 174.4 132.2 173.8 131.5 173.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 185.5C130.8 185.5 130.3 186 130.3 186.8C130.3 187.5 130.8 188 131.5 188C132.2 188 132.8 187.5 132.8 186.8C132.8 186 132.2 185.5 131.5 185.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 197.1C130.8 197.1 130.3 197.7 130.3 198.4C130.3 199.1 130.8 199.7 131.5 199.7C132.2 199.7 132.8 199.1 132.8 198.4C132.8 197.7 132.2 197.1 131.5 197.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M73.9999 68.8C73.2999 68.8 72.7 69.4001 72.7 70.1001C72.7 70.8001 73.2999 71.4 73.9999 71.4C74.6999 71.4 75.2 70.8001 75.2 70.1001C75.2 69.4001 74.6999 68.8 73.9999 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M73.9999 80.5C73.2999 80.5 72.7 81 72.7 81.7C72.7 82.4 73.2999 83 73.9999 83C74.6999 83 75.2 82.4 75.2 81.7C75.2 81 74.6999 80.5 73.9999 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M73.9999 92.1001C73.2999 92.1001 72.7 92.7001 72.7 93.4001C72.7 94.1001 73.2999 94.7001 73.9999 94.7001C74.6999 94.7001 75.2 94.1001 75.2 93.4001C75.2 92.7001 74.6999 92.1001 73.9999 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M73.9999 103.8C73.2999 103.8 72.7 104.3 72.7 105.1C72.7 105.8 73.2999 106.3 73.9999 106.3C74.6999 106.3 75.2 105.8 75.2 105.1C75.2 104.3 74.6999 103.8 73.9999 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M73.9999 115.4C73.2999 115.4 72.7 116 72.7 116.7C72.7 117.4 73.2999 118 73.9999 118C74.6999 118 75.2 117.4 75.2 116.7C75.2 116 74.6999 115.4 73.9999 115.4Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M73.9999 127.1C73.2999 127.1 72.7 127.7 72.7 128.4C72.7 129.1 73.2999 129.7 73.9999 129.7C74.6999 129.7 75.2 129.1 75.2 128.4C75.2 127.7 74.6999 127.1 73.9999 127.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 68.8C87.7 68.8 87.1 69.4001 87.1 70.1001C87.1 70.8001 87.7 71.4 88.4 71.4C89.1 71.4 89.6 70.8001 89.6 70.1001C89.6 69.4001 89.1 68.8 88.4 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 80.5C87.7 80.5 87.1 81 87.1 81.7C87.1 82.4 87.7 83 88.4 83C89.1 83 89.6 82.4 89.6 81.7C89.6 81 89.1 80.5 88.4 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 92.1001C87.7 92.1001 87.1 92.7001 87.1 93.4001C87.1 94.1001 87.7 94.7001 88.4 94.7001C89.1 94.7001 89.6 94.1001 89.6 93.4001C89.6 92.7001 89.1 92.1001 88.4 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 103.8C87.7 103.8 87.1 104.3 87.1 105.1C87.1 105.8 87.7 106.3 88.4 106.3C89.1 106.3 89.6 105.8 89.6 105.1C89.6 104.3 89.1 103.8 88.4 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 115.4C87.7 115.4 87.1 116 87.1 116.7C87.1 117.4 87.7 118 88.4 118C89.1 118 89.6 117.4 89.6 116.7C89.6 116 89.1 115.4 88.4 115.4Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 127.1C87.7 127.1 87.1 127.7 87.1 128.4C87.1 129.1 87.7 129.7 88.4 129.7C89.1 129.7 89.6 129.1 89.6 128.4C89.6 127.7 89.1 127.1 88.4 127.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 68.8C102 68.8 101.5 69.4001 101.5 70.1001C101.5 70.8001 102 71.4 102.7 71.4C103.4 71.4 104 70.8001 104 70.1001C104 69.4001 103.4 68.8 102.7 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 80.5C102 80.5 101.5 81 101.5 81.7C101.5 82.4 102 83 102.7 83C103.4 83 104 82.4 104 81.7C104 81 103.4 80.5 102.7 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 92.1001C102 92.1001 101.5 92.7001 101.5 93.4001C101.5 94.1001 102 94.7001 102.7 94.7001C103.4 94.7001 104 94.1001 104 93.4001C104 92.7001 103.4 92.1001 102.7 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 103.8C102 103.8 101.5 104.3 101.5 105.1C101.5 105.8 102 106.3 102.7 106.3C103.4 106.3 104 105.8 104 105.1C104 104.3 103.4 103.8 102.7 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 68.8C116.4 68.8 115.9 69.4001 115.9 70.1001C115.9 70.8001 116.4 71.4 117.1 71.4C117.8 71.4 118.4 70.8001 118.4 70.1001C118.4 69.4001 117.8 68.8 117.1 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 80.5C116.4 80.5 115.9 81 115.9 81.7C115.9 82.4 116.4 83 117.1 83C117.8 83 118.4 82.4 118.4 81.7C118.4 81 117.8 80.5 117.1 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 92.1001C116.4 92.1001 115.9 92.7001 115.9 93.4001C115.9 94.1001 116.4 94.7001 117.1 94.7001C117.8 94.7001 118.4 94.1001 118.4 93.4001C118.4 92.7001 117.8 92.1001 117.1 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.1 103.8C116.4 103.8 115.9 104.3 115.9 105.1C115.9 105.8 116.4 106.3 117.1 106.3C117.8 106.3 118.4 105.8 118.4 105.1C118.4 104.3 117.8 103.8 117.1 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 68.8C130.8 68.8 130.3 69.4001 130.3 70.1001C130.3 70.8001 130.8 71.4 131.5 71.4C132.2 71.4 132.8 70.8001 132.8 70.1001C132.8 69.4001 132.2 68.8 131.5 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 80.5C130.8 80.5 130.3 81 130.3 81.7C130.3 82.4 130.8 83 131.5 83C132.2 83 132.8 82.4 132.8 81.7C132.8 81 132.2 80.5 131.5 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 92.1001C130.8 92.1001 130.3 92.7001 130.3 93.4001C130.3 94.1001 130.8 94.7001 131.5 94.7001C132.2 94.7001 132.8 94.1001 132.8 93.4001C132.8 92.7001 132.2 92.1001 131.5 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.5 103.8C130.8 103.8 130.3 104.3 130.3 105.1C130.3 105.8 130.8 106.3 131.5 106.3C132.2 106.3 132.8 105.8 132.8 105.1C132.8 104.3 132.2 103.8 131.5 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.20001 46.7C0.500012 46.7 0 47.1999 0 47.8999C0 48.6999 0.500012 49.2 1.20001 49.2C1.90001 49.2 2.5 48.6999 2.5 47.8999C2.5 47.1999 1.90001 46.7 1.20001 46.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.20001 58.3C0.500012 58.3 0 58.9001 0 59.6001C0 60.3001 0.500012 60.9 1.20001 60.9C1.90001 60.9 2.5 60.3001 2.5 59.6001C2.5 58.9001 1.90001 58.3 1.20001 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 46.7C14.9 46.7 14.4 47.1999 14.4 47.8999C14.4 48.6999 14.9 49.2 15.6 49.2C16.3 49.2 16.9 48.6999 16.9 47.8999C16.9 47.1999 16.3 46.7 15.6 46.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 58.3C14.9 58.3 14.4 58.9001 14.4 59.6001C14.4 60.3001 14.9 60.9 15.6 60.9C16.3 60.9 16.9 60.3001 16.9 59.6001C16.9 58.9001 16.3 58.3 15.6 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.0001 46.7C29.3001 46.7 28.8 47.1999 28.8 47.8999C28.8 48.6999 29.3001 49.2 30.0001 49.2C30.7001 49.2 31.3 48.6999 31.3 47.8999C31.3 47.1999 30.7001 46.7 30.0001 46.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.0001 58.3C29.3001 58.3 28.8 58.9001 28.8 59.6001C28.8 60.3001 29.3001 60.9 30.0001 60.9C30.7001 60.9 31.3 60.3001 31.3 59.6001C31.3 58.9001 30.7001 58.3 30.0001 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 23.3C87.7 23.3 87.1 23.9001 87.1 24.6001C87.1 25.3001 87.7 25.9 88.4 25.9C89.1 25.9 89.6 25.3001 89.6 24.6001C89.6 23.9001 89.1 23.3 88.4 23.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 35C87.7 35 87.1 35.6 87.1 36.3C87.1 37 87.7 37.6 88.4 37.6C89.1 37.6 89.6 37 89.6 36.3C89.6 35.6 89.1 35 88.4 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 46.7C87.7 46.7 87.1 47.1999 87.1 47.8999C87.1 48.6999 87.7 49.2 88.4 49.2C89.1 49.2 89.6 48.6999 89.6 47.8999C89.6 47.1999 89.1 46.7 88.4 46.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.4 58.3C87.7 58.3 87.1 58.9001 87.1 59.6001C87.1 60.3001 87.7 60.9 88.4 60.9C89.1 60.9 89.6 60.3001 89.6 59.6001C89.6 58.9001 89.1 58.3 88.4 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 23.3C102 23.3 101.5 23.9001 101.5 24.6001C101.5 25.3001 102 25.9 102.7 25.9C103.4 25.9 104 25.3001 104 24.6001C104 23.9001 103.4 23.3 102.7 23.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 35C102 35 101.5 35.6 101.5 36.3C101.5 37 102 37.6 102.7 37.6C103.4 37.6 104 37 104 36.3C104 35.6 103.4 35 102.7 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 46.7C102 46.7 101.5 47.1999 101.5 47.8999C101.5 48.6999 102 49.2 102.7 49.2C103.4 49.2 104 48.6999 104 47.8999C104 47.1999 103.4 46.7 102.7 46.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 58.3C102 58.3 101.5 58.9001 101.5 59.6001C101.5 60.3001 102 60.9 102.7 60.9C103.4 60.9 104 60.3001 104 59.6001C104 58.9001 103.4 58.3 102.7 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                </svg>
                            </span>
                        </div>
                        <div class="alzatheme-shape2">
                            <span>
                                <svg width="104" height="107" viewBox="0 0 104 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.19995 45.5C0.499951 45.5 0 46 0 46.7C0 47.4 0.499951 48 1.19995 48C1.89995 48 2.5 47.4 2.5 46.7C2.5 46 1.89995 45.5 1.19995 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 57.1001C0.499951 57.1001 0 57.7001 0 58.4001C0 59.1001 0.499951 59.7001 1.19995 59.7001C1.89995 59.7001 2.5 59.1001 2.5 58.4001C2.5 57.7001 1.89995 57.1001 1.19995 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 45.5C14.9 45.5 14.4 46 14.4 46.7C14.4 47.4 14.9 48 15.6 48C16.3 48 16.9 47.4 16.9 46.7C16.9 46 16.3 45.5 15.6 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 57.1001C14.9 57.1001 14.4 57.7001 14.4 58.4001C14.4 59.1001 14.9 59.7001 15.6 59.7001C16.3 59.7001 16.9 59.1001 16.9 58.4001C16.9 57.7001 16.3 57.1001 15.6 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 45.5C29.3 45.5 28.7 46 28.7 46.7C28.7 47.4 29.3 48 30 48C30.7 48 31.2999 47.4 31.2999 46.7C31.2999 46 30.7 45.5 30 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 57.1001C29.3 57.1001 28.7 57.7001 28.7 58.4001C28.7 59.1001 29.3 59.7001 30 59.7001C30.7 59.7001 31.2999 59.1001 31.2999 58.4001C31.2999 57.7001 30.7 57.1001 30 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 45.5C44.5 45.5 43.9 46 43.9 46.7C43.9 47.4 44.5 48 45.2 48C45.9 48 46.4 47.4 46.4 46.7C46.4 46 45.9 45.5 45.2 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 57.1001C44.5 57.1001 43.9 57.7001 43.9 58.4001C43.9 59.1001 44.5 59.7001 45.2 59.7001C45.9 59.7001 46.4 59.1001 46.4 58.4001C46.4 57.7001 45.9 57.1001 45.2 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 68.8C44.5 68.8 43.9 69.3 43.9 70.1C43.9 70.8 44.5 71.3 45.2 71.3C45.9 71.3 46.4 70.8 46.4 70.1C46.4 69.3 45.9 68.8 45.2 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 80.3999C44.5 80.3999 43.9 80.9999 43.9 81.6999C43.9 82.3999 44.5 82.9999 45.2 82.9999C45.9 82.9999 46.4 82.3999 46.4 81.6999C46.4 80.9999 45.9 80.3999 45.2 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 92.1001C44.5 92.1001 43.9 92.7001 43.9 93.4001C43.9 94.1001 44.5 94.7001 45.2 94.7001C45.9 94.7001 46.4 94.1001 46.4 93.4001C46.4 92.7001 45.9 92.1001 45.2 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 103.7C44.5 103.7 43.9 104.3 43.9 105C43.9 105.7 44.5 106.3 45.2 106.3C45.9 106.3 46.4 105.7 46.4 105C46.4 104.3 45.9 103.7 45.2 103.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 45.5C58.9 45.5 58.2999 46 58.2999 46.7C58.2999 47.4 58.9 48 59.6 48C60.3 48 60.7999 47.4 60.7999 46.7C60.7999 46 60.3 45.5 59.6 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 57.1001C58.9 57.1001 58.2999 57.7001 58.2999 58.4001C58.2999 59.1001 58.9 59.7001 59.6 59.7001C60.3 59.7001 60.7999 59.1001 60.7999 58.4001C60.7999 57.7001 60.3 57.1001 59.6 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 68.8C58.9 68.8 58.2999 69.3 58.2999 70.1C58.2999 70.8 58.9 71.3 59.6 71.3C60.3 71.3 60.7999 70.8 60.7999 70.1C60.7999 69.3 60.3 68.8 59.6 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 80.3999C58.9 80.3999 58.2999 80.9999 58.2999 81.6999C58.2999 82.3999 58.9 82.9999 59.6 82.9999C60.3 82.9999 60.7999 82.3999 60.7999 81.6999C60.7999 80.9999 60.3 80.3999 59.6 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 92.1001C58.9 92.1001 58.2999 92.7001 58.2999 93.4001C58.2999 94.1001 58.9 94.7001 59.6 94.7001C60.3 94.7001 60.7999 94.1001 60.7999 93.4001C60.7999 92.7001 60.3 92.1001 59.6 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 103.7C58.9 103.7 58.2999 104.3 58.2999 105C58.2999 105.7 58.9 106.3 59.6 106.3C60.3 106.3 60.7999 105.7 60.7999 105C60.7999 104.3 60.3 103.7 59.6 103.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 45.5C73.3 45.5 72.7 46 72.7 46.7C72.7 47.4 73.3 48 74 48C74.7 48 75.2 47.4 75.2 46.7C75.2 46 74.7 45.5 74 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 57.1001C73.3 57.1001 72.7 57.7001 72.7 58.4001C72.7 59.1001 73.3 59.7001 74 59.7001C74.7 59.7001 75.2 59.1001 75.2 58.4001C75.2 57.7001 74.7 57.1001 74 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 68.8C73.3 68.8 72.7 69.3 72.7 70.1C72.7 70.8 73.3 71.3 74 71.3C74.7 71.3 75.2 70.8 75.2 70.1C75.2 69.3 74.7 68.8 74 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 80.3999C73.3 80.3999 72.7 80.9999 72.7 81.6999C72.7 82.3999 73.3 82.9999 74 82.9999C74.7 82.9999 75.2 82.3999 75.2 81.6999C75.2 80.9999 74.7 80.3999 74 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 45.5C87.5999 45.5 87.1 46 87.1 46.7C87.1 47.4 87.5999 48 88.2999 48C88.9999 48 89.6 47.4 89.6 46.7C89.6 46 88.9999 45.5 88.2999 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 57.1001C87.5999 57.1001 87.1 57.7001 87.1 58.4001C87.1 59.1001 87.5999 59.7001 88.2999 59.7001C88.9999 59.7001 89.6 59.1001 89.6 58.4001C89.6 57.7001 88.9999 57.1001 88.2999 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 68.8C87.5999 68.8 87.1 69.3 87.1 70.1C87.1 70.8 87.5999 71.3 88.2999 71.3C88.9999 71.3 89.6 70.8 89.6 70.1C89.6 69.3 88.9999 68.8 88.2999 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 80.3999C87.5999 80.3999 87.1 80.9999 87.1 81.6999C87.1 82.3999 87.5999 82.9999 88.2999 82.9999C88.9999 82.9999 89.6 82.3999 89.6 81.6999C89.6 80.9999 88.9999 80.3999 88.2999 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 45.5C102 45.5 101.5 46 101.5 46.7C101.5 47.4 102 48 102.7 48C103.4 48 104 47.4 104 46.7C104 46 103.4 45.5 102.7 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 57.1001C102 57.1001 101.5 57.7001 101.5 58.4001C101.5 59.1001 102 59.7001 102.7 59.7001C103.4 59.7001 104 59.1001 104 58.4001C104 57.7001 103.4 57.1001 102.7 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 68.8C102 68.8 101.5 69.3 101.5 70.1C101.5 70.8 102 71.3 102.7 71.3C103.4 71.3 104 70.8 104 70.1C104 69.3 103.4 68.8 102.7 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 80.3999C102 80.3999 101.5 80.9999 101.5 81.6999C101.5 82.3999 102 82.9999 102.7 82.9999C103.4 82.9999 104 82.3999 104 81.6999C104 80.9999 103.4 80.3999 102.7 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 23.3C0.499951 23.3 0 23.9 0 24.6C0 25.3 0.499951 25.9001 1.19995 25.9001C1.89995 25.9001 2.5 25.3 2.5 24.6C2.5 23.9 1.89995 23.3 1.19995 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 35C0.499951 35 0 35.5 0 36.3C0 37 0.499951 37.5 1.19995 37.5C1.89995 37.5 2.5 37 2.5 36.3C2.5 35.5 1.89995 35 1.19995 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 23.3C14.9 23.3 14.4 23.9 14.4 24.6C14.4 25.3 14.9 25.9001 15.6 25.9001C16.3 25.9001 16.9 25.3 16.9 24.6C16.9 23.9 16.3 23.3 15.6 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 35C14.9 35 14.4 35.5 14.4 36.3C14.4 37 14.9 37.5 15.6 37.5C16.3 37.5 16.9 37 16.9 36.3C16.9 35.5 16.3 35 15.6 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 0C29.3 0 28.7 0.600003 28.7 1.3C28.7 2 29.3 2.59999 30 2.59999C30.7 2.59999 31.2999 2 31.2999 1.3C31.2999 0.600003 30.7 0 30 0Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 11.7C29.3 11.7 28.7 12.1999 28.7 12.8999C28.7 13.5999 29.3 14.2 30 14.2C30.7 14.2 31.2999 13.5999 31.2999 12.8999C31.2999 12.1999 30.7 11.7 30 11.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 23.3C29.3 23.3 28.7 23.9 28.7 24.6C28.7 25.3 29.3 25.9001 30 25.9001C30.7 25.9001 31.2999 25.3 31.2999 24.6C31.2999 23.9 30.7 23.3 30 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 35C29.3 35 28.7 35.5 28.7 36.3C28.7 37 29.3 37.5 30 37.5C30.7 37.5 31.2999 37 31.2999 36.3C31.2999 35.5 30.7 35 30 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 35C44.5 35 43.9 35.5 43.9 36.3C43.9 37 44.5 37.5 45.2 37.5C45.9 37.5 46.4 37 46.4 36.3C46.4 35.5 45.9 35 45.2 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 35C58.9 35 58.2999 35.5 58.2999 36.3C58.2999 37 58.9 37.5 59.6 37.5C60.3 37.5 60.7999 37 60.7999 36.3C60.7999 35.5 60.3 35 59.6 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 35C73.3 35 72.7 35.5 72.7 36.3C72.7 37 73.3 37.5 74 37.5C74.7 37.5 75.2 37 75.2 36.3C75.2 35.5 74.7 35 74 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 35C87.5999 35 87.1 35.5 87.1 36.3C87.1 37 87.5999 37.5 88.2999 37.5C88.9999 37.5 89.6 37 89.6 36.3C89.6 35.5 88.9999 35 88.2999 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 35C102 35 101.5 35.5 101.5 36.3C101.5 37 102 37.5 102.7 37.5C103.4 37.5 104 37 104 36.3C104 35.5 103.4 35 102.7 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 45.5C0.499951 45.5 0 46 0 46.7C0 47.4 0.499951 48 1.19995 48C1.89995 48 2.5 47.4 2.5 46.7C2.5 46 1.89995 45.5 1.19995 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.19995 57.1001C0.499951 57.1001 0 57.7001 0 58.4001C0 59.1001 0.499951 59.7001 1.19995 59.7001C1.89995 59.7001 2.5 59.1001 2.5 58.4001C2.5 57.7001 1.89995 57.1001 1.19995 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 45.5C14.9 45.5 14.4 46 14.4 46.7C14.4 47.4 14.9 48 15.6 48C16.3 48 16.9 47.4 16.9 46.7C16.9 46 16.3 45.5 15.6 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 57.1001C14.9 57.1001 14.4 57.7001 14.4 58.4001C14.4 59.1001 14.9 59.7001 15.6 59.7001C16.3 59.7001 16.9 59.1001 16.9 58.4001C16.9 57.7001 16.3 57.1001 15.6 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30 45.5C29.3 45.5 28.7 46 28.7 46.7C28.7 47.4 29.3 48 30 48C30.7 48 31.2999 47.4 31.2999 46.7C31.2999 46 30.7 45.5 30 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30 57.1001C29.3 57.1001 28.7 57.7001 28.7 58.4001C28.7 59.1001 29.3 59.7001 30 59.7001C30.7 59.7001 31.2999 59.1001 31.2999 58.4001C31.2999 57.7001 30.7 57.1001 30 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 45.5C44.5 45.5 43.9 46 43.9 46.7C43.9 47.4 44.5 48 45.2 48C45.9 48 46.4 47.4 46.4 46.7C46.4 46 45.9 45.5 45.2 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 57.1001C44.5 57.1001 43.9 57.7001 43.9 58.4001C43.9 59.1001 44.5 59.7001 45.2 59.7001C45.9 59.7001 46.4 59.1001 46.4 58.4001C46.4 57.7001 45.9 57.1001 45.2 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 68.8C44.5 68.8 43.9 69.3 43.9 70.1C43.9 70.8 44.5 71.3 45.2 71.3C45.9 71.3 46.4 70.8 46.4 70.1C46.4 69.3 45.9 68.8 45.2 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 80.3999C44.5 80.3999 43.9 80.9999 43.9 81.6999C43.9 82.3999 44.5 82.9999 45.2 82.9999C45.9 82.9999 46.4 82.3999 46.4 81.6999C46.4 80.9999 45.9 80.3999 45.2 80.3999Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 92.1001C44.5 92.1001 43.9 92.7001 43.9 93.4001C43.9 94.1001 44.5 94.7001 45.2 94.7001C45.9 94.7001 46.4 94.1001 46.4 93.4001C46.4 92.7001 45.9 92.1001 45.2 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 103.7C44.5 103.7 43.9 104.3 43.9 105C43.9 105.7 44.5 106.3 45.2 106.3C45.9 106.3 46.4 105.7 46.4 105C46.4 104.3 45.9 103.7 45.2 103.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 45.5C58.9 45.5 58.2999 46 58.2999 46.7C58.2999 47.4 58.9 48 59.6 48C60.3 48 60.7999 47.4 60.7999 46.7C60.7999 46 60.3 45.5 59.6 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 57.1001C58.9 57.1001 58.2999 57.7001 58.2999 58.4001C58.2999 59.1001 58.9 59.7001 59.6 59.7001C60.3 59.7001 60.7999 59.1001 60.7999 58.4001C60.7999 57.7001 60.3 57.1001 59.6 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 68.8C58.9 68.8 58.2999 69.3 58.2999 70.1C58.2999 70.8 58.9 71.3 59.6 71.3C60.3 71.3 60.7999 70.8 60.7999 70.1C60.7999 69.3 60.3 68.8 59.6 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 80.3999C58.9 80.3999 58.2999 80.9999 58.2999 81.6999C58.2999 82.3999 58.9 82.9999 59.6 82.9999C60.3 82.9999 60.7999 82.3999 60.7999 81.6999C60.7999 80.9999 60.3 80.3999 59.6 80.3999Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 92.1001C58.9 92.1001 58.2999 92.7001 58.2999 93.4001C58.2999 94.1001 58.9 94.7001 59.6 94.7001C60.3 94.7001 60.7999 94.1001 60.7999 93.4001C60.7999 92.7001 60.3 92.1001 59.6 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 103.7C58.9 103.7 58.2999 104.3 58.2999 105C58.2999 105.7 58.9 106.3 59.6 106.3C60.3 106.3 60.7999 105.7 60.7999 105C60.7999 104.3 60.3 103.7 59.6 103.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 45.5C73.3 45.5 72.7 46 72.7 46.7C72.7 47.4 73.3 48 74 48C74.7 48 75.2 47.4 75.2 46.7C75.2 46 74.7 45.5 74 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 57.1001C73.3 57.1001 72.7 57.7001 72.7 58.4001C72.7 59.1001 73.3 59.7001 74 59.7001C74.7 59.7001 75.2 59.1001 75.2 58.4001C75.2 57.7001 74.7 57.1001 74 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 68.8C73.3 68.8 72.7 69.3 72.7 70.1C72.7 70.8 73.3 71.3 74 71.3C74.7 71.3 75.2 70.8 75.2 70.1C75.2 69.3 74.7 68.8 74 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 80.3999C73.3 80.3999 72.7 80.9999 72.7 81.6999C72.7 82.3999 73.3 82.9999 74 82.9999C74.7 82.9999 75.2 82.3999 75.2 81.6999C75.2 80.9999 74.7 80.3999 74 80.3999Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30 0C29.3 0 28.7 0.600003 28.7 1.3C28.7 2 29.3 2.59999 30 2.59999C30.7 2.59999 31.2999 2 31.2999 1.3C31.2999 0.600003 30.7 0 30 0Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 35C44.5 35 43.9 35.5 43.9 36.3C43.9 37 44.5 37.5 45.2 37.5C45.9 37.5 46.4 37 46.4 36.3C46.4 35.5 45.9 35 45.2 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 35C58.9 35 58.2999 35.5 58.2999 36.3C58.2999 37 58.9 37.5 59.6 37.5C60.3 37.5 60.7999 37 60.7999 36.3C60.7999 35.5 60.3 35 59.6 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 35C73.3 35 72.7 35.5 72.7 36.3C72.7 37 73.3 37.5 74 37.5C74.7 37.5 75.2 37 75.2 36.3C75.2 35.5 74.7 35 74 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.2999 35C87.5999 35 87.1 35.5 87.1 36.3C87.1 37 87.5999 37.5 88.2999 37.5C88.9999 37.5 89.6 37 89.6 36.3C89.6 35.5 88.9999 35 88.2999 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 35C102 35 101.5 35.5 101.5 36.3C101.5 37 102 37.5 102.7 37.5C103.4 37.5 104 37 104 36.3C104 35.5 103.4 35 102.7 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="alzatheme-default-content ml40">
                        <h2>{{ getTranslatedValue($aboutUsContent, 'heading', $currentLang) }}</h2>
                        <p>{{ getTranslatedValue($aboutUsContent, 'description', $currentLang) }}</p>
                        <div class="alzatheme-extra-mt">
                            <div class="alzatheme-counter-wrap2">
                                <div class="alzatheme-counter-data">
                                    <div class="alzatheme-counter-number">
                                        <span data-percentage="{{ $aboutUsContent->data_values['left_counter'] }}" class="alzatheme-counter"></span>+
                                    </div>
                                    <p>{{ getTranslatedValue($aboutUsContent, 'left_text', $currentLang) }}</p>
                                </div>
                                <div class="alzatheme-counter-data">
                                    <div class="alzatheme-counter-number">
                                        <span data-percentage="{{ $aboutUsContent->data_values['right_counter'] }}" class="alzatheme-counter"></span>+
                                    </div>
                                    <p>{{ getTranslatedValue($aboutUsContent, 'right_text', $currentLang) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="alzatheme-extra-mt">
                            <a class="alzatheme-default-btn" href="{{ getTranslatedValue($aboutUsContent, 'button_link', $currentLang) }}" data-text="{{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}"><span
                                    class="btn-wraper">{{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About us section -->

    <div class="section large-padding-tb4 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="alzatheme-thumb extra-ml">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ asset(getImage($agencyFeatureSection,'image_1')) }}" alt="">
                        <div class="alzatheme-thumb-position2" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ asset(getImage($agencyFeatureSection,'image_2')) }}" alt="">
                        </div>
                        <div class="alzatheme-shape3">
                            <span>
                                <svg width="133" height="200" viewBox="0 0 133 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M131.8 68.8C132.5 68.8 133 69.4001 133 70.1001C133 70.8001 132.5 71.4 131.8 71.4C131.1 71.4 130.5 70.8001 130.5 70.1001C130.5 69.4001 131.1 68.8 131.8 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.8 80.5C132.5 80.5 133 81 133 81.7C133 82.4 132.5 83 131.8 83C131.1 83 130.5 82.4 130.5 81.7C130.5 81 131.1 80.5 131.8 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.4 68.8C118.1 68.8 118.6 69.4001 118.6 70.1001C118.6 70.8001 118.1 71.4 117.4 71.4C116.7 71.4 116.1 70.8001 116.1 70.1001C116.1 69.4001 116.7 68.8 117.4 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.4 80.5C118.1 80.5 118.6 81 118.6 81.7C118.6 82.4 118.1 83 117.4 83C116.7 83 116.1 82.4 116.1 81.7C116.1 81 116.7 80.5 117.4 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M103 68.8C103.7 68.8 104.2 69.4001 104.2 70.1001C104.2 70.8001 103.7 71.4 103 71.4C102.3 71.4 101.7 70.8001 101.7 70.1001C101.7 69.4001 102.3 68.8 103 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M103 80.5C103.7 80.5 104.2 81 104.2 81.7C104.2 82.4 103.7 83 103 83C102.3 83 101.7 82.4 101.7 81.7C101.7 81 102.3 80.5 103 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.5999 68.8C89.2999 68.8 89.8999 69.4001 89.8999 70.1001C89.8999 70.8001 89.2999 71.4 88.5999 71.4C87.8999 71.4 87.2999 70.8001 87.2999 70.1001C87.2999 69.4001 87.8999 68.8 88.5999 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.5999 80.5C89.2999 80.5 89.8999 81 89.8999 81.7C89.8999 82.4 89.2999 83 88.5999 83C87.8999 83 87.2999 82.4 87.2999 81.7C87.2999 81 87.8999 80.5 88.5999 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 68.8C74.9 68.8 75.5 69.4001 75.5 70.1001C75.5 70.8001 74.9 71.4 74.2 71.4C73.5 71.4 72.9 70.8001 72.9 70.1001C72.9 69.4001 73.5 68.8 74.2 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 80.5C74.9 80.5 75.5 81 75.5 81.7C75.5 82.4 74.9 83 74.2 83C73.5 83 72.9 82.4 72.9 81.7C72.9 81 73.5 80.5 74.2 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 138.8C59.7001 138.8 60.3 139.4 60.3 140.1C60.3 140.8 59.7001 141.4 59.0001 141.4C58.3001 141.4 57.8 140.8 57.8 140.1C57.8 139.4 58.3001 138.8 59.0001 138.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 150.5C59.7001 150.5 60.3 151.1 60.3 151.8C60.3 152.5 59.7001 153.1 59.0001 153.1C58.3001 153.1 57.8 152.5 57.8 151.8C57.8 151.1 58.3001 150.5 59.0001 150.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 162.2C59.7001 162.2 60.3 162.7 60.3 163.4C60.3 164.1 59.7001 164.7 59.0001 164.7C58.3001 164.7 57.8 164.1 57.8 163.4C57.8 162.7 58.3001 162.2 59.0001 162.2Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 173.8C59.7001 173.8 60.3 174.4 60.3 175.1C60.3 175.8 59.7001 176.4 59.0001 176.4C58.3001 176.4 57.8 175.8 57.8 175.1C57.8 174.4 58.3001 173.8 59.0001 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 185.5C59.7001 185.5 60.3 186 60.3 186.8C60.3 187.5 59.7001 188 59.0001 188C58.3001 188 57.8 187.5 57.8 186.8C57.8 186 58.3001 185.5 59.0001 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 197.1C59.7001 197.1 60.3 197.7 60.3 198.4C60.3 199.1 59.7001 199.7 59.0001 199.7C58.3001 199.7 57.8 199.1 57.8 198.4C57.8 197.7 58.3001 197.1 59.0001 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 138.8C45.2999 138.8 45.8999 139.4 45.8999 140.1C45.8999 140.8 45.2999 141.4 44.5999 141.4C43.8999 141.4 43.3999 140.8 43.3999 140.1C43.3999 139.4 43.8999 138.8 44.5999 138.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 150.5C45.2999 150.5 45.8999 151.1 45.8999 151.8C45.8999 152.5 45.2999 153.1 44.5999 153.1C43.8999 153.1 43.3999 152.5 43.3999 151.8C43.3999 151.1 43.8999 150.5 44.5999 150.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 162.2C45.2999 162.2 45.8999 162.7 45.8999 163.4C45.8999 164.1 45.2999 164.7 44.5999 164.7C43.8999 164.7 43.3999 164.1 43.3999 163.4C43.3999 162.7 43.8999 162.2 44.5999 162.2Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 173.8C45.2999 173.8 45.8999 174.4 45.8999 175.1C45.8999 175.8 45.2999 176.4 44.5999 176.4C43.8999 176.4 43.3999 175.8 43.3999 175.1C43.3999 174.4 43.8999 173.8 44.5999 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 185.5C45.2999 185.5 45.8999 186 45.8999 186.8C45.8999 187.5 45.2999 188 44.5999 188C43.8999 188 43.3999 187.5 43.3999 186.8C43.3999 186 43.8999 185.5 44.5999 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 197.1C45.2999 197.1 45.8999 197.7 45.8999 198.4C45.8999 199.1 45.2999 199.7 44.5999 199.7C43.8999 199.7 43.3999 199.1 43.3999 198.4C43.3999 197.7 43.8999 197.1 44.5999 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 173.8C31 173.8 31.5 174.4 31.5 175.1C31.5 175.8 31 176.4 30.3 176.4C29.6 176.4 29 175.8 29 175.1C29 174.4 29.6 173.8 30.3 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 185.5C31 185.5 31.5 186 31.5 186.8C31.5 187.5 31 188 30.3 188C29.6 188 29 187.5 29 186.8C29 186 29.6 185.5 30.3 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 197.1C31 197.1 31.5 197.7 31.5 198.4C31.5 199.1 31 199.7 30.3 199.7C29.6 199.7 29 199.1 29 198.4C29 197.7 29.6 197.1 30.3 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 173.8C16.6001 173.8 17.1001 174.4 17.1001 175.1C17.1001 175.8 16.6001 176.4 15.9001 176.4C15.2001 176.4 14.6001 175.8 14.6001 175.1C14.6001 174.4 15.2001 173.8 15.9001 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 185.5C16.6001 185.5 17.1001 186 17.1001 186.8C17.1001 187.5 16.6001 188 15.9001 188C15.2001 188 14.6001 187.5 14.6001 186.8C14.6001 186 15.2001 185.5 15.9001 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 197.1C16.6001 197.1 17.1001 197.7 17.1001 198.4C17.1001 199.1 16.6001 199.7 15.9001 199.7C15.2001 199.7 14.6001 199.1 14.6001 198.4C14.6001 197.7 15.2001 197.1 15.9001 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 173.8C2.19994 173.8 2.69995 174.4 2.69995 175.1C2.69995 175.8 2.19994 176.4 1.49994 176.4C0.799939 176.4 0.199951 175.8 0.199951 175.1C0.199951 174.4 0.799939 173.8 1.49994 173.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 185.5C2.19994 185.5 2.69995 186 2.69995 186.8C2.69995 187.5 2.19994 188 1.49994 188C0.799939 188 0.199951 187.5 0.199951 186.8C0.199951 186 0.799939 185.5 1.49994 185.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 197.1C2.19994 197.1 2.69995 197.7 2.69995 198.4C2.69995 199.1 2.19994 199.7 1.49994 199.7C0.799939 199.7 0.199951 199.1 0.199951 198.4C0.199951 197.7 0.799939 197.1 1.49994 197.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 68.8C59.7001 68.8 60.3 69.4001 60.3 70.1001C60.3 70.8001 59.7001 71.4 59.0001 71.4C58.3001 71.4 57.8 70.8001 57.8 70.1001C57.8 69.4001 58.3001 68.8 59.0001 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 80.5C59.7001 80.5 60.3 81 60.3 81.7C60.3 82.4 59.7001 83 59.0001 83C58.3001 83 57.8 82.4 57.8 81.7C57.8 81 58.3001 80.5 59.0001 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 92.1C59.7001 92.1 60.3 92.7 60.3 93.4C60.3 94.1 59.7001 94.7 59.0001 94.7C58.3001 94.7 57.8 94.1 57.8 93.4C57.8 92.7 58.3001 92.1 59.0001 92.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 103.8C59.7001 103.8 60.3 104.3 60.3 105.1C60.3 105.8 59.7001 106.3 59.0001 106.3C58.3001 106.3 57.8 105.8 57.8 105.1C57.8 104.3 58.3001 103.8 59.0001 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 115.4C59.7001 115.4 60.3 116 60.3 116.7C60.3 117.4 59.7001 118 59.0001 118C58.3001 118 57.8 117.4 57.8 116.7C57.8 116 58.3001 115.4 59.0001 115.4Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 127.1C59.7001 127.1 60.3 127.7 60.3 128.4C60.3 129.1 59.7001 129.7 59.0001 129.7C58.3001 129.7 57.8 129.1 57.8 128.4C57.8 127.7 58.3001 127.1 59.0001 127.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 68.8C45.2999 68.8 45.8999 69.4001 45.8999 70.1001C45.8999 70.8001 45.2999 71.4 44.5999 71.4C43.8999 71.4 43.3999 70.8001 43.3999 70.1001C43.3999 69.4001 43.8999 68.8 44.5999 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 80.5C45.2999 80.5 45.8999 81 45.8999 81.7C45.8999 82.4 45.2999 83 44.5999 83C43.8999 83 43.3999 82.4 43.3999 81.7C43.3999 81 43.8999 80.5 44.5999 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 92.1C45.2999 92.1 45.8999 92.7 45.8999 93.4C45.8999 94.1 45.2999 94.7 44.5999 94.7C43.8999 94.7 43.3999 94.1 43.3999 93.4C43.3999 92.7 43.8999 92.1 44.5999 92.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 103.8C45.2999 103.8 45.8999 104.3 45.8999 105.1C45.8999 105.8 45.2999 106.3 44.5999 106.3C43.8999 106.3 43.3999 105.8 43.3999 105.1C43.3999 104.3 43.8999 103.8 44.5999 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 115.4C45.2999 115.4 45.8999 116 45.8999 116.7C45.8999 117.4 45.2999 118 44.5999 118C43.8999 118 43.3999 117.4 43.3999 116.7C43.3999 116 43.8999 115.4 44.5999 115.4Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 127.1C45.2999 127.1 45.8999 127.7 45.8999 128.4C45.8999 129.1 45.2999 129.7 44.5999 129.7C43.8999 129.7 43.3999 129.1 43.3999 128.4C43.3999 127.7 43.8999 127.1 44.5999 127.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 68.8C31 68.8 31.5 69.4001 31.5 70.1001C31.5 70.8001 31 71.4 30.3 71.4C29.6 71.4 29 70.8001 29 70.1001C29 69.4001 29.6 68.8 30.3 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 80.5C31 80.5 31.5 81 31.5 81.7C31.5 82.4 31 83 30.3 83C29.6 83 29 82.4 29 81.7C29 81 29.6 80.5 30.3 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 92.1C31 92.1 31.5 92.7 31.5 93.4C31.5 94.1 31 94.7 30.3 94.7C29.6 94.7 29 94.1 29 93.4C29 92.7 29.6 92.1 30.3 92.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 103.8C31 103.8 31.5 104.3 31.5 105.1C31.5 105.8 31 106.3 30.3 106.3C29.6 106.3 29 105.8 29 105.1C29 104.3 29.6 103.8 30.3 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 68.8C16.6001 68.8 17.1001 69.4001 17.1001 70.1001C17.1001 70.8001 16.6001 71.4 15.9001 71.4C15.2001 71.4 14.6001 70.8001 14.6001 70.1001C14.6001 69.4001 15.2001 68.8 15.9001 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 80.5C16.6001 80.5 17.1001 81 17.1001 81.7C17.1001 82.4 16.6001 83 15.9001 83C15.2001 83 14.6001 82.4 14.6001 81.7C14.6001 81 15.2001 80.5 15.9001 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 92.1C16.6001 92.1 17.1001 92.7 17.1001 93.4C17.1001 94.1 16.6001 94.7 15.9001 94.7C15.2001 94.7 14.6001 94.1 14.6001 93.4C14.6001 92.7 15.2001 92.1 15.9001 92.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 103.8C16.6001 103.8 17.1001 104.3 17.1001 105.1C17.1001 105.8 16.6001 106.3 15.9001 106.3C15.2001 106.3 14.6001 105.8 14.6001 105.1C14.6001 104.3 15.2001 103.8 15.9001 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 68.8C2.19994 68.8 2.69995 69.4001 2.69995 70.1001C2.69995 70.8001 2.19994 71.4 1.49994 71.4C0.799939 71.4 0.199951 70.8001 0.199951 70.1001C0.199951 69.4001 0.799939 68.8 1.49994 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 80.5C2.19994 80.5 2.69995 81 2.69995 81.7C2.69995 82.4 2.19994 83 1.49994 83C0.799939 83 0.199951 82.4 0.199951 81.7C0.199951 81 0.799939 80.5 1.49994 80.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 92.1C2.19994 92.1 2.69995 92.7 2.69995 93.4C2.69995 94.1 2.19994 94.7 1.49994 94.7C0.799939 94.7 0.199951 94.1 0.199951 93.4C0.199951 92.7 0.799939 92.1 1.49994 92.1Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 103.8C2.19994 103.8 2.69995 104.3 2.69995 105.1C2.69995 105.8 2.19994 106.3 1.49994 106.3C0.799939 106.3 0.199951 105.8 0.199951 105.1C0.199951 104.3 0.799939 103.8 1.49994 103.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.8 46.7C132.5 46.7 133 47.1999 133 47.8999C133 48.6999 132.5 49.2 131.8 49.2C131.1 49.2 130.5 48.6999 130.5 47.8999C130.5 47.1999 131.1 46.7 131.8 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.8 58.3C132.5 58.3 133 58.9001 133 59.6001C133 60.3001 132.5 60.9 131.8 60.9C131.1 60.9 130.5 60.3001 130.5 59.6001C130.5 58.9001 131.1 58.3 131.8 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.4 46.7C118.1 46.7 118.6 47.1999 118.6 47.8999C118.6 48.6999 118.1 49.2 117.4 49.2C116.7 49.2 116.1 48.6999 116.1 47.8999C116.1 47.1999 116.7 46.7 117.4 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M117.4 58.3C118.1 58.3 118.6 58.9001 118.6 59.6001C118.6 60.3001 118.1 60.9 117.4 60.9C116.7 60.9 116.1 60.3001 116.1 59.6001C116.1 58.9001 116.7 58.3 117.4 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M103 46.7C103.7 46.7 104.2 47.1999 104.2 47.8999C104.2 48.6999 103.7 49.2 103 49.2C102.3 49.2 101.7 48.6999 101.7 47.8999C101.7 47.1999 102.3 46.7 103 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M103 58.3C103.7 58.3 104.2 58.9001 104.2 59.6001C104.2 60.3001 103.7 60.9 103 60.9C102.3 60.9 101.7 60.3001 101.7 59.6001C101.7 58.9001 102.3 58.3 103 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.5999 46.7C89.2999 46.7 89.8999 47.1999 89.8999 47.8999C89.8999 48.6999 89.2999 49.2 88.5999 49.2C87.8999 49.2 87.2999 48.6999 87.2999 47.8999C87.2999 47.1999 87.8999 46.7 88.5999 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.5999 58.3C89.2999 58.3 89.8999 58.9001 89.8999 59.6001C89.8999 60.3001 89.2999 60.9 88.5999 60.9C87.8999 60.9 87.2999 60.3001 87.2999 59.6001C87.2999 58.9001 87.8999 58.3 88.5999 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 0C74.9 0 75.5 0.600003 75.5 1.3C75.5 2 74.9 2.60001 74.2 2.60001C73.5 2.60001 72.9 2 72.9 1.3C72.9 0.600003 73.5 0 74.2 0Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 11.7C74.9 11.7 75.5 12.3 75.5 13C75.5 13.7 74.9 14.3 74.2 14.3C73.5 14.3 72.9 13.7 72.9 13C72.9 12.3 73.5 11.7 74.2 11.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 23.3C74.9 23.3 75.5 23.9001 75.5 24.6001C75.5 25.3001 74.9 25.9 74.2 25.9C73.5 25.9 72.9 25.3001 72.9 24.6001C72.9 23.9001 73.5 23.3 74.2 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 35C74.9 35 75.5 35.6 75.5 36.3C75.5 37 74.9 37.6 74.2 37.6C73.5 37.6 72.9 37 72.9 36.3C72.9 35.6 73.5 35 74.2 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 46.7C74.9 46.7 75.5 47.1999 75.5 47.8999C75.5 48.6999 74.9 49.2 74.2 49.2C73.5 49.2 72.9 48.6999 72.9 47.8999C72.9 47.1999 73.5 46.7 74.2 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74.2 58.3C74.9 58.3 75.5 58.9001 75.5 59.6001C75.5 60.3001 74.9 60.9 74.2 60.9C73.5 60.9 72.9 60.3001 72.9 59.6001C72.9 58.9001 73.5 58.3 74.2 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 0C59.7001 0 60.3 0.600003 60.3 1.3C60.3 2 59.7001 2.60001 59.0001 2.60001C58.3001 2.60001 57.8 2 57.8 1.3C57.8 0.600003 58.3001 0 59.0001 0Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 11.7C59.7001 11.7 60.3 12.3 60.3 13C60.3 13.7 59.7001 14.3 59.0001 14.3C58.3001 14.3 57.8 13.7 57.8 13C57.8 12.3 58.3001 11.7 59.0001 11.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 23.3C59.7001 23.3 60.3 23.9001 60.3 24.6001C60.3 25.3001 59.7001 25.9 59.0001 25.9C58.3001 25.9 57.8 25.3001 57.8 24.6001C57.8 23.9001 58.3001 23.3 59.0001 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 35C59.7001 35 60.3 35.6 60.3 36.3C60.3 37 59.7001 37.6 59.0001 37.6C58.3001 37.6 57.8 37 57.8 36.3C57.8 35.6 58.3001 35 59.0001 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 46.7C59.7001 46.7 60.3 47.1999 60.3 47.8999C60.3 48.6999 59.7001 49.2 59.0001 49.2C58.3001 49.2 57.8 48.6999 57.8 47.8999C57.8 47.1999 58.3001 46.7 59.0001 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.0001 58.3C59.7001 58.3 60.3 58.9001 60.3 59.6001C60.3 60.3001 59.7001 60.9 59.0001 60.9C58.3001 60.9 57.8 60.3001 57.8 59.6001C57.8 58.9001 58.3001 58.3 59.0001 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 23.3C45.2999 23.3 45.8999 23.9001 45.8999 24.6001C45.8999 25.3001 45.2999 25.9 44.5999 25.9C43.8999 25.9 43.3999 25.3001 43.3999 24.6001C43.3999 23.9001 43.8999 23.3 44.5999 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 35C45.2999 35 45.8999 35.6 45.8999 36.3C45.8999 37 45.2999 37.6 44.5999 37.6C43.8999 37.6 43.3999 37 43.3999 36.3C43.3999 35.6 43.8999 35 44.5999 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 46.7C45.2999 46.7 45.8999 47.1999 45.8999 47.8999C45.8999 48.6999 45.2999 49.2 44.5999 49.2C43.8999 49.2 43.3999 48.6999 43.3999 47.8999C43.3999 47.1999 43.8999 46.7 44.5999 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M44.5999 58.3C45.2999 58.3 45.8999 58.9001 45.8999 59.6001C45.8999 60.3001 45.2999 60.9 44.5999 60.9C43.8999 60.9 43.3999 60.3001 43.3999 59.6001C43.3999 58.9001 43.8999 58.3 44.5999 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 23.3C31 23.3 31.5 23.9001 31.5 24.6001C31.5 25.3001 31 25.9 30.3 25.9C29.6 25.9 29 25.3001 29 24.6001C29 23.9001 29.6 23.3 30.3 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 35C31 35 31.5 35.6 31.5 36.3C31.5 37 31 37.6 30.3 37.6C29.6 37.6 29 37 29 36.3C29 35.6 29.6 35 30.3 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 46.7C31 46.7 31.5 47.1999 31.5 47.8999C31.5 48.6999 31 49.2 30.3 49.2C29.6 49.2 29 48.6999 29 47.8999C29 47.1999 29.6 46.7 30.3 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30.3 58.3C31 58.3 31.5 58.9001 31.5 59.6001C31.5 60.3001 31 60.9 30.3 60.9C29.6 60.9 29 60.3001 29 59.6001C29 58.9001 29.6 58.3 30.3 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 23.3C16.6001 23.3 17.1001 23.9001 17.1001 24.6001C17.1001 25.3001 16.6001 25.9 15.9001 25.9C15.2001 25.9 14.6001 25.3001 14.6001 24.6001C14.6001 23.9001 15.2001 23.3 15.9001 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 35C16.6001 35 17.1001 35.6 17.1001 36.3C17.1001 37 16.6001 37.6 15.9001 37.6C15.2001 37.6 14.6001 37 14.6001 36.3C14.6001 35.6 15.2001 35 15.9001 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 46.7C16.6001 46.7 17.1001 47.1999 17.1001 47.8999C17.1001 48.6999 16.6001 49.2 15.9001 49.2C15.2001 49.2 14.6001 48.6999 14.6001 47.8999C14.6001 47.1999 15.2001 46.7 15.9001 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.9001 58.3C16.6001 58.3 17.1001 58.9001 17.1001 59.6001C17.1001 60.3001 16.6001 60.9 15.9001 60.9C15.2001 60.9 14.6001 60.3001 14.6001 59.6001C14.6001 58.9001 15.2001 58.3 15.9001 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 23.3C2.19994 23.3 2.69995 23.9001 2.69995 24.6001C2.69995 25.3001 2.19994 25.9 1.49994 25.9C0.799939 25.9 0.199951 25.3001 0.199951 24.6001C0.199951 23.9001 0.799939 23.3 1.49994 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 35C2.19994 35 2.69995 35.6 2.69995 36.3C2.69995 37 2.19994 37.6 1.49994 37.6C0.799939 37.6 0.199951 37 0.199951 36.3C0.199951 35.6 0.799939 35 1.49994 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 46.7C2.19994 46.7 2.69995 47.1999 2.69995 47.8999C2.69995 48.6999 2.19994 49.2 1.49994 49.2C0.799939 49.2 0.199951 48.6999 0.199951 47.8999C0.199951 47.1999 0.799939 46.7 1.49994 46.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.49994 58.3C2.19994 58.3 2.69995 58.9001 2.69995 59.6001C2.69995 60.3001 2.19994 60.9 1.49994 60.9C0.799939 60.9 0.199951 60.3001 0.199951 59.6001C0.199951 58.9001 0.799939 58.3 1.49994 58.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M131.8 68.8C132.5 68.8 133 69.4001 133 70.1001C133 70.8001 132.5 71.4 131.8 71.4C131.1 71.4 130.5 70.8001 130.5 70.1001C130.5 69.4001 131.1 68.8 131.8 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.8 80.5C132.5 80.5 133 81 133 81.7C133 82.4 132.5 83 131.8 83C131.1 83 130.5 82.4 130.5 81.7C130.5 81 131.1 80.5 131.8 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.4 68.8C118.1 68.8 118.6 69.4001 118.6 70.1001C118.6 70.8001 118.1 71.4 117.4 71.4C116.7 71.4 116.1 70.8001 116.1 70.1001C116.1 69.4001 116.7 68.8 117.4 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.4 80.5C118.1 80.5 118.6 81 118.6 81.7C118.6 82.4 118.1 83 117.4 83C116.7 83 116.1 82.4 116.1 81.7C116.1 81 116.7 80.5 117.4 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M103 68.8C103.7 68.8 104.2 69.4001 104.2 70.1001C104.2 70.8001 103.7 71.4 103 71.4C102.3 71.4 101.7 70.8001 101.7 70.1001C101.7 69.4001 102.3 68.8 103 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M103 80.5C103.7 80.5 104.2 81 104.2 81.7C104.2 82.4 103.7 83 103 83C102.3 83 101.7 82.4 101.7 81.7C101.7 81 102.3 80.5 103 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.5999 68.8C89.2999 68.8 89.8999 69.4001 89.8999 70.1001C89.8999 70.8001 89.2999 71.4 88.5999 71.4C87.8999 71.4 87.2999 70.8001 87.2999 70.1001C87.2999 69.4001 87.8999 68.8 88.5999 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.5999 80.5C89.2999 80.5 89.8999 81 89.8999 81.7C89.8999 82.4 89.2999 83 88.5999 83C87.8999 83 87.2999 82.4 87.2999 81.7C87.2999 81 87.8999 80.5 88.5999 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74.2 68.8C74.9 68.8 75.5 69.4001 75.5 70.1001C75.5 70.8001 74.9 71.4 74.2 71.4C73.5 71.4 72.9 70.8001 72.9 70.1001C72.9 69.4001 73.5 68.8 74.2 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74.2 80.5C74.9 80.5 75.5 81 75.5 81.7C75.5 82.4 74.9 83 74.2 83C73.5 83 72.9 82.4 72.9 81.7C72.9 81 73.5 80.5 74.2 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 173.8C31 173.8 31.5 174.4 31.5 175.1C31.5 175.8 31 176.4 30.3 176.4C29.6 176.4 29 175.8 29 175.1C29 174.4 29.6 173.8 30.3 173.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 185.5C31 185.5 31.5 186 31.5 186.8C31.5 187.5 31 188 30.3 188C29.6 188 29 187.5 29 186.8C29 186 29.6 185.5 30.3 185.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 197.1C31 197.1 31.5 197.7 31.5 198.4C31.5 199.1 31 199.7 30.3 199.7C29.6 199.7 29 199.1 29 198.4C29 197.7 29.6 197.1 30.3 197.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 173.8C16.6001 173.8 17.1001 174.4 17.1001 175.1C17.1001 175.8 16.6001 176.4 15.9001 176.4C15.2001 176.4 14.6001 175.8 14.6001 175.1C14.6001 174.4 15.2001 173.8 15.9001 173.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 185.5C16.6001 185.5 17.1001 186 17.1001 186.8C17.1001 187.5 16.6001 188 15.9001 188C15.2001 188 14.6001 187.5 14.6001 186.8C14.6001 186 15.2001 185.5 15.9001 185.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 197.1C16.6001 197.1 17.1001 197.7 17.1001 198.4C17.1001 199.1 16.6001 199.7 15.9001 199.7C15.2001 199.7 14.6001 199.1 14.6001 198.4C14.6001 197.7 15.2001 197.1 15.9001 197.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 173.8C2.19994 173.8 2.69995 174.4 2.69995 175.1C2.69995 175.8 2.19994 176.4 1.49994 176.4C0.799939 176.4 0.199951 175.8 0.199951 175.1C0.199951 174.4 0.799939 173.8 1.49994 173.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 185.5C2.19994 185.5 2.69995 186 2.69995 186.8C2.69995 187.5 2.19994 188 1.49994 188C0.799939 188 0.199951 187.5 0.199951 186.8C0.199951 186 0.799939 185.5 1.49994 185.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 197.1C2.19994 197.1 2.69995 197.7 2.69995 198.4C2.69995 199.1 2.19994 199.7 1.49994 199.7C0.799939 199.7 0.199951 199.1 0.199951 198.4C0.199951 197.7 0.799939 197.1 1.49994 197.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.0001 68.8C59.7001 68.8 60.3 69.4001 60.3 70.1001C60.3 70.8001 59.7001 71.4 59.0001 71.4C58.3001 71.4 57.8 70.8001 57.8 70.1001C57.8 69.4001 58.3001 68.8 59.0001 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.0001 80.5C59.7001 80.5 60.3 81 60.3 81.7C60.3 82.4 59.7001 83 59.0001 83C58.3001 83 57.8 82.4 57.8 81.7C57.8 81 58.3001 80.5 59.0001 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.0001 92.1001C59.7001 92.1001 60.3 92.7001 60.3 93.4001C60.3 94.1001 59.7001 94.7001 59.0001 94.7001C58.3001 94.7001 57.8 94.1001 57.8 93.4001C57.8 92.7001 58.3001 92.1001 59.0001 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.0001 103.8C59.7001 103.8 60.3 104.3 60.3 105.1C60.3 105.8 59.7001 106.3 59.0001 106.3C58.3001 106.3 57.8 105.8 57.8 105.1C57.8 104.3 58.3001 103.8 59.0001 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.0001 115.4C59.7001 115.4 60.3 116 60.3 116.7C60.3 117.4 59.7001 118 59.0001 118C58.3001 118 57.8 117.4 57.8 116.7C57.8 116 58.3001 115.4 59.0001 115.4Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.0001 127.1C59.7001 127.1 60.3 127.7 60.3 128.4C60.3 129.1 59.7001 129.7 59.0001 129.7C58.3001 129.7 57.8 129.1 57.8 128.4C57.8 127.7 58.3001 127.1 59.0001 127.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 68.8C45.2999 68.8 45.8999 69.4001 45.8999 70.1001C45.8999 70.8001 45.2999 71.4 44.5999 71.4C43.8999 71.4 43.3999 70.8001 43.3999 70.1001C43.3999 69.4001 43.8999 68.8 44.5999 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 80.5C45.2999 80.5 45.8999 81 45.8999 81.7C45.8999 82.4 45.2999 83 44.5999 83C43.8999 83 43.3999 82.4 43.3999 81.7C43.3999 81 43.8999 80.5 44.5999 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 92.1001C45.2999 92.1001 45.8999 92.7001 45.8999 93.4001C45.8999 94.1001 45.2999 94.7001 44.5999 94.7001C43.8999 94.7001 43.3999 94.1001 43.3999 93.4001C43.3999 92.7001 43.8999 92.1001 44.5999 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 103.8C45.2999 103.8 45.8999 104.3 45.8999 105.1C45.8999 105.8 45.2999 106.3 44.5999 106.3C43.8999 106.3 43.3999 105.8 43.3999 105.1C43.3999 104.3 43.8999 103.8 44.5999 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 115.4C45.2999 115.4 45.8999 116 45.8999 116.7C45.8999 117.4 45.2999 118 44.5999 118C43.8999 118 43.3999 117.4 43.3999 116.7C43.3999 116 43.8999 115.4 44.5999 115.4Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 127.1C45.2999 127.1 45.8999 127.7 45.8999 128.4C45.8999 129.1 45.2999 129.7 44.5999 129.7C43.8999 129.7 43.3999 129.1 43.3999 128.4C43.3999 127.7 43.8999 127.1 44.5999 127.1Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 68.8C31 68.8 31.5 69.4001 31.5 70.1001C31.5 70.8001 31 71.4 30.3 71.4C29.6 71.4 29 70.8001 29 70.1001C29 69.4001 29.6 68.8 30.3 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 80.5C31 80.5 31.5 81 31.5 81.7C31.5 82.4 31 83 30.3 83C29.6 83 29 82.4 29 81.7C29 81 29.6 80.5 30.3 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 92.1001C31 92.1001 31.5 92.7001 31.5 93.4001C31.5 94.1001 31 94.7001 30.3 94.7001C29.6 94.7001 29 94.1001 29 93.4001C29 92.7001 29.6 92.1001 30.3 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 103.8C31 103.8 31.5 104.3 31.5 105.1C31.5 105.8 31 106.3 30.3 106.3C29.6 106.3 29 105.8 29 105.1C29 104.3 29.6 103.8 30.3 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 68.8C16.6001 68.8 17.1001 69.4001 17.1001 70.1001C17.1001 70.8001 16.6001 71.4 15.9001 71.4C15.2001 71.4 14.6001 70.8001 14.6001 70.1001C14.6001 69.4001 15.2001 68.8 15.9001 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 80.5C16.6001 80.5 17.1001 81 17.1001 81.7C17.1001 82.4 16.6001 83 15.9001 83C15.2001 83 14.6001 82.4 14.6001 81.7C14.6001 81 15.2001 80.5 15.9001 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 92.1001C16.6001 92.1001 17.1001 92.7001 17.1001 93.4001C17.1001 94.1001 16.6001 94.7001 15.9001 94.7001C15.2001 94.7001 14.6001 94.1001 14.6001 93.4001C14.6001 92.7001 15.2001 92.1001 15.9001 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.9001 103.8C16.6001 103.8 17.1001 104.3 17.1001 105.1C17.1001 105.8 16.6001 106.3 15.9001 106.3C15.2001 106.3 14.6001 105.8 14.6001 105.1C14.6001 104.3 15.2001 103.8 15.9001 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 68.8C2.19994 68.8 2.69995 69.4001 2.69995 70.1001C2.69995 70.8001 2.19994 71.4 1.49994 71.4C0.799939 71.4 0.199951 70.8001 0.199951 70.1001C0.199951 69.4001 0.799939 68.8 1.49994 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 80.5C2.19994 80.5 2.69995 81 2.69995 81.7C2.69995 82.4 2.19994 83 1.49994 83C0.799939 83 0.199951 82.4 0.199951 81.7C0.199951 81 0.799939 80.5 1.49994 80.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 92.1001C2.19994 92.1001 2.69995 92.7001 2.69995 93.4001C2.69995 94.1001 2.19994 94.7001 1.49994 94.7001C0.799939 94.7001 0.199951 94.1001 0.199951 93.4001C0.199951 92.7001 0.799939 92.1001 1.49994 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.49994 103.8C2.19994 103.8 2.69995 104.3 2.69995 105.1C2.69995 105.8 2.19994 106.3 1.49994 106.3C0.799939 106.3 0.199951 105.8 0.199951 105.1C0.199951 104.3 0.799939 103.8 1.49994 103.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.8 46.7001C132.5 46.7001 133 47.2001 133 47.9001C133 48.7001 132.5 49.2001 131.8 49.2001C131.1 49.2001 130.5 48.7001 130.5 47.9001C130.5 47.2001 131.1 46.7001 131.8 46.7001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M131.8 58.3C132.5 58.3 133 58.9001 133 59.6001C133 60.3001 132.5 60.9 131.8 60.9C131.1 60.9 130.5 60.3001 130.5 59.6001C130.5 58.9001 131.1 58.3 131.8 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.4 46.7001C118.1 46.7001 118.6 47.2001 118.6 47.9001C118.6 48.7001 118.1 49.2001 117.4 49.2001C116.7 49.2001 116.1 48.7001 116.1 47.9001C116.1 47.2001 116.7 46.7001 117.4 46.7001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M117.4 58.3C118.1 58.3 118.6 58.9001 118.6 59.6001C118.6 60.3001 118.1 60.9 117.4 60.9C116.7 60.9 116.1 60.3001 116.1 59.6001C116.1 58.9001 116.7 58.3 117.4 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M103 46.7001C103.7 46.7001 104.2 47.2001 104.2 47.9001C104.2 48.7001 103.7 49.2001 103 49.2001C102.3 49.2001 101.7 48.7001 101.7 47.9001C101.7 47.2001 102.3 46.7001 103 46.7001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M103 58.3C103.7 58.3 104.2 58.9001 104.2 59.6001C104.2 60.3001 103.7 60.9 103 60.9C102.3 60.9 101.7 60.3001 101.7 59.6001C101.7 58.9001 102.3 58.3 103 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 23.3C45.2999 23.3 45.8999 23.9001 45.8999 24.6001C45.8999 25.3001 45.2999 25.9 44.5999 25.9C43.8999 25.9 43.3999 25.3001 43.3999 24.6001C43.3999 23.9001 43.8999 23.3 44.5999 23.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 35C45.2999 35 45.8999 35.6 45.8999 36.3C45.8999 37 45.2999 37.6 44.5999 37.6C43.8999 37.6 43.3999 37 43.3999 36.3C43.3999 35.6 43.8999 35 44.5999 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 46.7001C45.2999 46.7001 45.8999 47.2001 45.8999 47.9001C45.8999 48.7001 45.2999 49.2001 44.5999 49.2001C43.8999 49.2001 43.3999 48.7001 43.3999 47.9001C43.3999 47.2001 43.8999 46.7001 44.5999 46.7001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M44.5999 58.3C45.2999 58.3 45.8999 58.9001 45.8999 59.6001C45.8999 60.3001 45.2999 60.9 44.5999 60.9C43.8999 60.9 43.3999 60.3001 43.3999 59.6001C43.3999 58.9001 43.8999 58.3 44.5999 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 23.3C31 23.3 31.5 23.9001 31.5 24.6001C31.5 25.3001 31 25.9 30.3 25.9C29.6 25.9 29 25.3001 29 24.6001C29 23.9001 29.6 23.3 30.3 23.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 35C31 35 31.5 35.6 31.5 36.3C31.5 37 31 37.6 30.3 37.6C29.6 37.6 29 37 29 36.3C29 35.6 29.6 35 30.3 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 46.7001C31 46.7001 31.5 47.2001 31.5 47.9001C31.5 48.7001 31 49.2001 30.3 49.2001C29.6 49.2001 29 48.7001 29 47.9001C29 47.2001 29.6 46.7001 30.3 46.7001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30.3 58.3C31 58.3 31.5 58.9001 31.5 59.6001C31.5 60.3001 31 60.9 30.3 60.9C29.6 60.9 29 60.3001 29 59.6001C29 58.9001 29.6 58.3 30.3 58.3Z" fill="#0A165E" fill-opacity="0.4"/>
                                </svg>
                            </span>
                        </div>
                        <div class="alzatheme-shape4">
                            <span>
                                <svg width="104" height="107" viewBox="0 0 104 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.19995 45.5C0.499951 45.5 0 46 0 46.7C0 47.4 0.499951 48 1.19995 48C1.89995 48 2.5 47.4 2.5 46.7C2.5 46 1.89995 45.5 1.19995 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 57.1001C0.499951 57.1001 0 57.7001 0 58.4001C0 59.1001 0.499951 59.7001 1.19995 59.7001C1.89995 59.7001 2.5 59.1001 2.5 58.4001C2.5 57.7001 1.89995 57.1001 1.19995 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 45.5C14.9 45.5 14.4 46 14.4 46.7C14.4 47.4 14.9 48 15.6 48C16.3 48 16.9 47.4 16.9 46.7C16.9 46 16.3 45.5 15.6 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 57.1001C14.9 57.1001 14.4 57.7001 14.4 58.4001C14.4 59.1001 14.9 59.7001 15.6 59.7001C16.3 59.7001 16.9 59.1001 16.9 58.4001C16.9 57.7001 16.3 57.1001 15.6 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 45.5C29.3 45.5 28.7 46 28.7 46.7C28.7 47.4 29.3 48 30 48C30.7 48 31.2999 47.4 31.2999 46.7C31.2999 46 30.7 45.5 30 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 57.1001C29.3 57.1001 28.7 57.7001 28.7 58.4001C28.7 59.1001 29.3 59.7001 30 59.7001C30.7 59.7001 31.2999 59.1001 31.2999 58.4001C31.2999 57.7001 30.7 57.1001 30 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 45.5C44.5 45.5 43.9 46 43.9 46.7C43.9 47.4 44.5 48 45.2 48C45.9 48 46.4 47.4 46.4 46.7C46.4 46 45.9 45.5 45.2 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 57.1001C44.5 57.1001 43.9 57.7001 43.9 58.4001C43.9 59.1001 44.5 59.7001 45.2 59.7001C45.9 59.7001 46.4 59.1001 46.4 58.4001C46.4 57.7001 45.9 57.1001 45.2 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 68.8C44.5 68.8 43.9 69.3 43.9 70.1C43.9 70.8 44.5 71.3 45.2 71.3C45.9 71.3 46.4 70.8 46.4 70.1C46.4 69.3 45.9 68.8 45.2 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 80.3999C44.5 80.3999 43.9 80.9999 43.9 81.6999C43.9 82.3999 44.5 82.9999 45.2 82.9999C45.9 82.9999 46.4 82.3999 46.4 81.6999C46.4 80.9999 45.9 80.3999 45.2 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 92.1001C44.5 92.1001 43.9 92.7001 43.9 93.4001C43.9 94.1001 44.5 94.7001 45.2 94.7001C45.9 94.7001 46.4 94.1001 46.4 93.4001C46.4 92.7001 45.9 92.1001 45.2 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 103.7C44.5 103.7 43.9 104.3 43.9 105C43.9 105.7 44.5 106.3 45.2 106.3C45.9 106.3 46.4 105.7 46.4 105C46.4 104.3 45.9 103.7 45.2 103.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 45.5C58.9 45.5 58.2999 46 58.2999 46.7C58.2999 47.4 58.9 48 59.6 48C60.3 48 60.7999 47.4 60.7999 46.7C60.7999 46 60.3 45.5 59.6 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 57.1001C58.9 57.1001 58.2999 57.7001 58.2999 58.4001C58.2999 59.1001 58.9 59.7001 59.6 59.7001C60.3 59.7001 60.7999 59.1001 60.7999 58.4001C60.7999 57.7001 60.3 57.1001 59.6 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 68.8C58.9 68.8 58.2999 69.3 58.2999 70.1C58.2999 70.8 58.9 71.3 59.6 71.3C60.3 71.3 60.7999 70.8 60.7999 70.1C60.7999 69.3 60.3 68.8 59.6 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 80.3999C58.9 80.3999 58.2999 80.9999 58.2999 81.6999C58.2999 82.3999 58.9 82.9999 59.6 82.9999C60.3 82.9999 60.7999 82.3999 60.7999 81.6999C60.7999 80.9999 60.3 80.3999 59.6 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 92.1001C58.9 92.1001 58.2999 92.7001 58.2999 93.4001C58.2999 94.1001 58.9 94.7001 59.6 94.7001C60.3 94.7001 60.7999 94.1001 60.7999 93.4001C60.7999 92.7001 60.3 92.1001 59.6 92.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 103.7C58.9 103.7 58.2999 104.3 58.2999 105C58.2999 105.7 58.9 106.3 59.6 106.3C60.3 106.3 60.7999 105.7 60.7999 105C60.7999 104.3 60.3 103.7 59.6 103.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 45.5C73.3 45.5 72.7 46 72.7 46.7C72.7 47.4 73.3 48 74 48C74.7 48 75.2 47.4 75.2 46.7C75.2 46 74.7 45.5 74 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 57.1001C73.3 57.1001 72.7 57.7001 72.7 58.4001C72.7 59.1001 73.3 59.7001 74 59.7001C74.7 59.7001 75.2 59.1001 75.2 58.4001C75.2 57.7001 74.7 57.1001 74 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 68.8C73.3 68.8 72.7 69.3 72.7 70.1C72.7 70.8 73.3 71.3 74 71.3C74.7 71.3 75.2 70.8 75.2 70.1C75.2 69.3 74.7 68.8 74 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 80.3999C73.3 80.3999 72.7 80.9999 72.7 81.6999C72.7 82.3999 73.3 82.9999 74 82.9999C74.7 82.9999 75.2 82.3999 75.2 81.6999C75.2 80.9999 74.7 80.3999 74 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 45.5C87.5999 45.5 87.1 46 87.1 46.7C87.1 47.4 87.5999 48 88.2999 48C88.9999 48 89.6 47.4 89.6 46.7C89.6 46 88.9999 45.5 88.2999 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 57.1001C87.5999 57.1001 87.1 57.7001 87.1 58.4001C87.1 59.1001 87.5999 59.7001 88.2999 59.7001C88.9999 59.7001 89.6 59.1001 89.6 58.4001C89.6 57.7001 88.9999 57.1001 88.2999 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 68.8C87.5999 68.8 87.1 69.3 87.1 70.1C87.1 70.8 87.5999 71.3 88.2999 71.3C88.9999 71.3 89.6 70.8 89.6 70.1C89.6 69.3 88.9999 68.8 88.2999 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 80.3999C87.5999 80.3999 87.1 80.9999 87.1 81.6999C87.1 82.3999 87.5999 82.9999 88.2999 82.9999C88.9999 82.9999 89.6 82.3999 89.6 81.6999C89.6 80.9999 88.9999 80.3999 88.2999 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 45.5C102 45.5 101.5 46 101.5 46.7C101.5 47.4 102 48 102.7 48C103.4 48 104 47.4 104 46.7C104 46 103.4 45.5 102.7 45.5Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 57.1001C102 57.1001 101.5 57.7001 101.5 58.4001C101.5 59.1001 102 59.7001 102.7 59.7001C103.4 59.7001 104 59.1001 104 58.4001C104 57.7001 103.4 57.1001 102.7 57.1001Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 68.8C102 68.8 101.5 69.3 101.5 70.1C101.5 70.8 102 71.3 102.7 71.3C103.4 71.3 104 70.8 104 70.1C104 69.3 103.4 68.8 102.7 68.8Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 80.3999C102 80.3999 101.5 80.9999 101.5 81.6999C101.5 82.3999 102 82.9999 102.7 82.9999C103.4 82.9999 104 82.3999 104 81.6999C104 80.9999 103.4 80.3999 102.7 80.3999Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 23.3C0.499951 23.3 0 23.9 0 24.6C0 25.3 0.499951 25.9001 1.19995 25.9001C1.89995 25.9001 2.5 25.3 2.5 24.6C2.5 23.9 1.89995 23.3 1.19995 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 35C0.499951 35 0 35.5 0 36.3C0 37 0.499951 37.5 1.19995 37.5C1.89995 37.5 2.5 37 2.5 36.3C2.5 35.5 1.89995 35 1.19995 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 23.3C14.9 23.3 14.4 23.9 14.4 24.6C14.4 25.3 14.9 25.9001 15.6 25.9001C16.3 25.9001 16.9 25.3 16.9 24.6C16.9 23.9 16.3 23.3 15.6 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M15.6 35C14.9 35 14.4 35.5 14.4 36.3C14.4 37 14.9 37.5 15.6 37.5C16.3 37.5 16.9 37 16.9 36.3C16.9 35.5 16.3 35 15.6 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 0C29.3 0 28.7 0.600003 28.7 1.3C28.7 2 29.3 2.59999 30 2.59999C30.7 2.59999 31.2999 2 31.2999 1.3C31.2999 0.600003 30.7 0 30 0Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 11.7C29.3 11.7 28.7 12.1999 28.7 12.8999C28.7 13.5999 29.3 14.2 30 14.2C30.7 14.2 31.2999 13.5999 31.2999 12.8999C31.2999 12.1999 30.7 11.7 30 11.7Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 23.3C29.3 23.3 28.7 23.9 28.7 24.6C28.7 25.3 29.3 25.9001 30 25.9001C30.7 25.9001 31.2999 25.3 31.2999 24.6C31.2999 23.9 30.7 23.3 30 23.3Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M30 35C29.3 35 28.7 35.5 28.7 36.3C28.7 37 29.3 37.5 30 37.5C30.7 37.5 31.2999 37 31.2999 36.3C31.2999 35.5 30.7 35 30 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M45.2 35C44.5 35 43.9 35.5 43.9 36.3C43.9 37 44.5 37.5 45.2 37.5C45.9 37.5 46.4 37 46.4 36.3C46.4 35.5 45.9 35 45.2 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M59.6 35C58.9 35 58.2999 35.5 58.2999 36.3C58.2999 37 58.9 37.5 59.6 37.5C60.3 37.5 60.7999 37 60.7999 36.3C60.7999 35.5 60.3 35 59.6 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M74 35C73.3 35 72.7 35.5 72.7 36.3C72.7 37 73.3 37.5 74 37.5C74.7 37.5 75.2 37 75.2 36.3C75.2 35.5 74.7 35 74 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M88.2999 35C87.5999 35 87.1 35.5 87.1 36.3C87.1 37 87.5999 37.5 88.2999 37.5C88.9999 37.5 89.6 37 89.6 36.3C89.6 35.5 88.9999 35 88.2999 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M102.7 35C102 35 101.5 35.5 101.5 36.3C101.5 37 102 37.5 102.7 37.5C103.4 37.5 104 37 104 36.3C104 35.5 103.4 35 102.7 35Z" fill="#0A165E" fill-opacity="0.2"/>
                                    <path d="M1.19995 45.5C0.499951 45.5 0 46 0 46.7C0 47.4 0.499951 48 1.19995 48C1.89995 48 2.5 47.4 2.5 46.7C2.5 46 1.89995 45.5 1.19995 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M1.19995 57.1001C0.499951 57.1001 0 57.7001 0 58.4001C0 59.1001 0.499951 59.7001 1.19995 59.7001C1.89995 59.7001 2.5 59.1001 2.5 58.4001C2.5 57.7001 1.89995 57.1001 1.19995 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 45.5C14.9 45.5 14.4 46 14.4 46.7C14.4 47.4 14.9 48 15.6 48C16.3 48 16.9 47.4 16.9 46.7C16.9 46 16.3 45.5 15.6 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M15.6 57.1001C14.9 57.1001 14.4 57.7001 14.4 58.4001C14.4 59.1001 14.9 59.7001 15.6 59.7001C16.3 59.7001 16.9 59.1001 16.9 58.4001C16.9 57.7001 16.3 57.1001 15.6 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30 45.5C29.3 45.5 28.7 46 28.7 46.7C28.7 47.4 29.3 48 30 48C30.7 48 31.2999 47.4 31.2999 46.7C31.2999 46 30.7 45.5 30 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30 57.1001C29.3 57.1001 28.7 57.7001 28.7 58.4001C28.7 59.1001 29.3 59.7001 30 59.7001C30.7 59.7001 31.2999 59.1001 31.2999 58.4001C31.2999 57.7001 30.7 57.1001 30 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 45.5C44.5 45.5 43.9 46 43.9 46.7C43.9 47.4 44.5 48 45.2 48C45.9 48 46.4 47.4 46.4 46.7C46.4 46 45.9 45.5 45.2 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 57.1001C44.5 57.1001 43.9 57.7001 43.9 58.4001C43.9 59.1001 44.5 59.7001 45.2 59.7001C45.9 59.7001 46.4 59.1001 46.4 58.4001C46.4 57.7001 45.9 57.1001 45.2 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 68.8C44.5 68.8 43.9 69.3 43.9 70.1C43.9 70.8 44.5 71.3 45.2 71.3C45.9 71.3 46.4 70.8 46.4 70.1C46.4 69.3 45.9 68.8 45.2 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 80.3999C44.5 80.3999 43.9 80.9999 43.9 81.6999C43.9 82.3999 44.5 82.9999 45.2 82.9999C45.9 82.9999 46.4 82.3999 46.4 81.6999C46.4 80.9999 45.9 80.3999 45.2 80.3999Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 92.1001C44.5 92.1001 43.9 92.7001 43.9 93.4001C43.9 94.1001 44.5 94.7001 45.2 94.7001C45.9 94.7001 46.4 94.1001 46.4 93.4001C46.4 92.7001 45.9 92.1001 45.2 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 103.7C44.5 103.7 43.9 104.3 43.9 105C43.9 105.7 44.5 106.3 45.2 106.3C45.9 106.3 46.4 105.7 46.4 105C46.4 104.3 45.9 103.7 45.2 103.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 45.5C58.9 45.5 58.2999 46 58.2999 46.7C58.2999 47.4 58.9 48 59.6 48C60.3 48 60.7999 47.4 60.7999 46.7C60.7999 46 60.3 45.5 59.6 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 57.1001C58.9 57.1001 58.2999 57.7001 58.2999 58.4001C58.2999 59.1001 58.9 59.7001 59.6 59.7001C60.3 59.7001 60.7999 59.1001 60.7999 58.4001C60.7999 57.7001 60.3 57.1001 59.6 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 68.8C58.9 68.8 58.2999 69.3 58.2999 70.1C58.2999 70.8 58.9 71.3 59.6 71.3C60.3 71.3 60.7999 70.8 60.7999 70.1C60.7999 69.3 60.3 68.8 59.6 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 80.3999C58.9 80.3999 58.2999 80.9999 58.2999 81.6999C58.2999 82.3999 58.9 82.9999 59.6 82.9999C60.3 82.9999 60.7999 82.3999 60.7999 81.6999C60.7999 80.9999 60.3 80.3999 59.6 80.3999Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 92.1001C58.9 92.1001 58.2999 92.7001 58.2999 93.4001C58.2999 94.1001 58.9 94.7001 59.6 94.7001C60.3 94.7001 60.7999 94.1001 60.7999 93.4001C60.7999 92.7001 60.3 92.1001 59.6 92.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 103.7C58.9 103.7 58.2999 104.3 58.2999 105C58.2999 105.7 58.9 106.3 59.6 106.3C60.3 106.3 60.7999 105.7 60.7999 105C60.7999 104.3 60.3 103.7 59.6 103.7Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 45.5C73.3 45.5 72.7 46 72.7 46.7C72.7 47.4 73.3 48 74 48C74.7 48 75.2 47.4 75.2 46.7C75.2 46 74.7 45.5 74 45.5Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 57.1001C73.3 57.1001 72.7 57.7001 72.7 58.4001C72.7 59.1001 73.3 59.7001 74 59.7001C74.7 59.7001 75.2 59.1001 75.2 58.4001C75.2 57.7001 74.7 57.1001 74 57.1001Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 68.8C73.3 68.8 72.7 69.3 72.7 70.1C72.7 70.8 73.3 71.3 74 71.3C74.7 71.3 75.2 70.8 75.2 70.1C75.2 69.3 74.7 68.8 74 68.8Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 80.3999C73.3 80.3999 72.7 80.9999 72.7 81.6999C72.7 82.3999 73.3 82.9999 74 82.9999C74.7 82.9999 75.2 82.3999 75.2 81.6999C75.2 80.9999 74.7 80.3999 74 80.3999Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M30 0C29.3 0 28.7 0.600003 28.7 1.3C28.7 2 29.3 2.59999 30 2.59999C30.7 2.59999 31.2999 2 31.2999 1.3C31.2999 0.600003 30.7 0 30 0Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M45.2 35C44.5 35 43.9 35.5 43.9 36.3C43.9 37 44.5 37.5 45.2 37.5C45.9 37.5 46.4 37 46.4 36.3C46.4 35.5 45.9 35 45.2 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M59.6 35C58.9 35 58.2999 35.5 58.2999 36.3C58.2999 37 58.9 37.5 59.6 37.5C60.3 37.5 60.7999 37 60.7999 36.3C60.7999 35.5 60.3 35 59.6 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M74 35C73.3 35 72.7 35.5 72.7 36.3C72.7 37 73.3 37.5 74 37.5C74.7 37.5 75.2 37 75.2 36.3C75.2 35.5 74.7 35 74 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M88.2999 35C87.5999 35 87.1 35.5 87.1 36.3C87.1 37 87.5999 37.5 88.2999 37.5C88.9999 37.5 89.6 37 89.6 36.3C89.6 35.5 88.9999 35 88.2999 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                    <path d="M102.7 35C102 35 101.5 35.5 101.5 36.3C101.5 37 102 37.5 102.7 37.5C103.4 37.5 104 37 104 36.3C104 35.5 103.4 35 102.7 35Z" fill="#0A165E" fill-opacity="0.4"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="alzatheme-default-content mr40">
                        <h2>{{ getTranslatedValue($agencyFeatureSection,'heading', $currentLang) }}</h2>
                        <div class="alzatheme-extra-mt">
                            <div class="alzatheme-iconbox-wrap2 rt-mb-35">
                                <div class="alzatheme-iconbox-icon2">
                                    <img src="{{ asset(getImage($agencyFeatureSection, 'image_3')) }}" alt="">
                                </div>
                                <div class="alzatheme-iconbox-data2">
                                    <a href="{{ getTranslatedValue($agencyFeatureSection,'feature_1_url', $currentLang) }}">
                                        <h5>{{ getTranslatedValue($agencyFeatureSection,'feature_1_heading', $currentLang) }}</h5>
                                    </a>
                                    <p>{{ getTranslatedValue($agencyFeatureSection,'feature_description_1', $currentLang) }}
                                    </p>
                                </div>
                            </div>
                            <div class="alzatheme-iconbox-wrap2 rt-mb-35">
                                <div class="alzatheme-iconbox-icon2">
                                    <img src="{{ asset(getImage($agencyFeatureSection, 'image_4')) }}" alt="">
                                </div>
                                <div class="alzatheme-iconbox-data2">
                                    <a href="{{ getTranslatedValue($agencyFeatureSection,'feature_2_url', $currentLang) }}">
                                        <h5>{{ getTranslatedValue($agencyFeatureSection,'feature_2_heading', $currentLang) }}</h5>
                                    </a>
                                    <p>{{ getTranslatedValue($agencyFeatureSection,'feature_description_2', $currentLang) }}</p>
                                </div>
                            </div>
                            <div class="alzatheme-iconbox-wrap2 mb-0">
                                <div class="alzatheme-iconbox-icon2">
                                    <img src="{{ asset(getImage($agencyFeatureSection, 'image_5')) }}" alt="">
                                </div>
                                <div class="alzatheme-iconbox-data2">
                                    <a href="{{ getTranslatedValue($agencyFeatureSection,'feature_3_url', $currentLang) }}">
                                        <h5>{{ getTranslatedValue($agencyFeatureSection,'feature_3_heading', $currentLang) }}</h5>
                                    </a>
                                    <p>{{ getTranslatedValue($agencyFeatureSection,'feature_description_3', $currentLang) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section alzatheme-section-padding bg-light1">
        <div class="container">
            <div class="alzatheme-section-title center">
                <h2>{{ __('translate.Explore our recent projects') }}</h2>
            </div>
        </div>
        <div class="alzatheme-3column-slider" data-aos="fade-up" data-aos-duration="800">
            @foreach($projects as $index => $project)
                <div class="alzatheme-portfolio-wrap2">
                <div class="alzatheme-portfolio-thumb2">
                    <img src="{{ asset($project->thumb_image) }}" alt="Image" class="full-img">
                </div>
                <div class="alzatheme-portfolio-data2-wrap">
                    <div class="alzatheme-portfolio-data2">
                        <a href="{{ route('portfolio.show', $project->slug) }}">
                            <h4>{{ $project->translate?->title }}</h4>
                        </a>
                        <p> @if($project->category && $project->category->translate)
                                {{ $project->category->translate->name }}
                            @elseif($project->category)
                                {{ $project->category->name }}
                            @endif
                        </p>
                    </div>
                    <a class="alzatheme-portfolio-btn2" href="{{ route('portfolio.show', $project->slug) }}">
                        <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End Projects section -->

    @include('frontend.templates.layouts.testimonial')
    <!-- End testimonial section -->

    <div class="section alzatheme-section-padding2 bg-light1">
        <div class="container">
            <div class="alzatheme-section-title center">
                <h2>{{ getTranslatedValue($blogContent, 'heading', $currentLang) }}</h2>
            </div>
            <div class="row">

                @if($blogPosts->isNotEmpty())
                    @php
                        $lastPost = $blogPosts->last();
                    @endphp
                <div class="col-xl-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="alzatheme-blog-wrap bg-white border-0">
                        <a href="{{ route('blog', $lastPost->slug) }}">
                            <div class="alzatheme-blog-thumb alzatheme-blog-thumb-big">
                                <img src="{{ asset($lastPost->image) }}" class="alzatheme-blog-thumb-image" alt="Blog Image">
                            </div>
                        </a>
                        <div class="alzatheme-blog-content padding-medium">
                            <div class="alzatheme-blog-meta">
                                <ul>
                                    <li><a href="{{ route('blog', $lastPost->slug) }}">{{ $lastPost->category->translate->name ?? '' }}</a></li>
                                    <li><a href="{{ route('blog', $lastPost->slug) }}">{{ $lastPost->created_at->diffForHumans() }}</a></li>
                                </ul>
                            </div>
                            <a href="{{ route('blog', $lastPost->slug) }}">
                                <h3>{{ $lastPost->translate?->title }}</h3>
                            </a>
                            <a class="alzatheme-icon-btn" href="{{ route('blog', $lastPost->slug) }}"><i class="icon-show ri-arrow-right-line"></i>
                                <span>{{ __('translate.Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-xl-6" data-aos="fade-left" data-aos-duration="800">
                    @foreach($blogPosts as $index => $blog)
                        @if($index !== count($blogPosts) - 1)
                             <div class="alzatheme-blog-wrap blog-column border-0">
                                <div class="alzatheme-blog-left">
                                    <a href="{{ route('blog', $blog->slug) }}">
                                        <div class="alzatheme-blog-thumb">
                                            <img src="{{ asset($blog->image) }}" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="alzatheme-blog-content">
                                    <div class="alzatheme-blog-meta">
                                        <ul>
                                            <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->category->translate->name ?? '' }}</a></li>
                                            <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->created_at->diffForHumans() }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('blog', $blog->slug) }}">
                                        <h4>{{ $blog->translate?->title }}</h4>
                                    </a>
                                    <a class="alzatheme-icon-btn" href="{{ route('blog', $blog->slug) }}"><i class="icon-show ri-arrow-right-line"></i>
                                        <span>{{ __('translate.Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                                </div>
                             </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->
</main>

<!-- Footer  -->
<footer class="alzatheme-footer-section dark-bg alzatheme-section-padding-top">
    <div class="container">
        <div class="alzatheme-footer-cta-wrap">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="alzatheme-footer-cta-content">
                        <h2>{{ getTranslatedValue($ctaContent, 'heading', $currentLang) }}</h2>
                        <p>{{ getTranslatedValue($ctaContent, 'description', $currentLang) }}</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 d-flex align-items-center justify-content-end">
                    <div class="alzatheme-footer-cta-btn" data-aos="fade-up" data-aos-duration="800">
                        <a class="alzatheme-default-btn alzatheme-white-btn" href="{{ getTranslatedValue($ctaContent, 'button_link', $currentLang) }}"
                           data-text="{{ getTranslatedValue($ctaContent, 'button_text', $currentLang) }}"><span class="btn-wraper">{{ getTranslatedValue($ctaContent, 'button_text', $currentLang) }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="alzatheme-footer-top alzatheme-section-padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="alzatheme-footer-textarea light-color">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($general_setting->white_logo) }}" alt="">
                        </a>
                        <p>{{ $footer->about_us }}</p>
                        <div class="alzatheme-footer-info">
                            <ul>
                                <li><a href="tel:{{ $footer->phone }}"><i class="ri-phone-fill"></i>{{ $footer->phone }}</a></li>
                                <li><a href="mailto:{{ $footer->email }}"><i class="ri-mail-fill"></i>{{ $footer->email }}</a></li>
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
                    <div class="alzatheme-footer-menu ml30">
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
        <div class="alzatheme-footer-bottom">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="alzatheme-copywright">
                        <p>{{ $footer->copyright }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="alzatheme-social-icon-box right-align">
                        <ul>
                            <li>
                                <a href="{{ $footer->facebook }}" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $footer->linkedin }}" target="_blank">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $footer->twitter }}" target="_blank">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $footer->instagram }}" target="_blank">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
