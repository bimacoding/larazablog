@extends('master_layout')

@section('new-layout')
<!-- Breadcrumb -->
<div class="alzatheme-breadcrumb" style="background-image: url({{ asset($general_setting->breadcrumb_image) }})">
    <div class="container">
        <h1 class="post__title">{{ __('translate.Showroom') }}</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                <li aria-current="page"> {{ __('translate.Showroom') }}</li>
            </ul>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Showroom Section -->
<div class="section alzatheme-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @forelse($showrooms as $item)
                    <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-duration="600">
                        <div class="card h-100">
                            @php
                                $images = explode(',', $item->images);
                                $firstImage = $images[0] ?? null;
                            @endphp
                            @if($firstImage)
                                <a href="{{ route('showroomsdetil', $item->id) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $firstImage) }}" class="card-img-top" alt="Showroom image">
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>{{ __('translate.No showroom found.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($showrooms->hasPages())
            <div class="alzatheme-navigation mt-5">
                <nav class="navigation pagination" aria-label="Showroom">
                    <div class="nav-links">
                        {{ $showrooms->withQueryString()->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </nav>
            </div>
        @endif
    </div>
</div>
<!-- End Showroom Section -->
@endsection
