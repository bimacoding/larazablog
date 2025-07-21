@extends('master_layout')

@section('new-layout')
    <!-- Start Breadcrumb -->
    <div class="alzatheme-errors-section">
        <div class="container">
            <div class="alzatheme-errors-content">
                <img src="{{ asset($general_setting->error_image) }}" alt="">
                <h2>{{ __('translate.Oops, this page is not found!') }}</h2>
                <p>{{ __('translate.We couldn’t find the page you’re looking for. Please verify the URL and try again, or visit our homepage for assistance.') }}</p>
                <div class="alzatheme-extra-mt" data-aos="fade-up" data-aos-duration="800">
                    <a class="alzatheme-default-btn alzatheme-light-btn" href="{{ route('home') }}" data-text="{{ __('translate.Back to Homepage') }}"> <span
                            class="btn-wraper">{{ __('translate.Back to Homepage') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
@endsection
