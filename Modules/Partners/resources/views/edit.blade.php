@extends('admin.master_layout')

@section('title')
    <title>Edit Partner</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Edit Partner</h3>
    <p class="crancy-header__text">Manage Partners >> Edit Partner</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Partner Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">Edit Partner</h4>
                                                <a href="{{ route('admin.partners.index') }}" class="crancy-btn">
                                                    <i class="fa fa-list"></i> Partner List
                                                </a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <!-- Thumb Image -->
                                                <div class="col-md-4">
                                                    <div class="crancy__item-form--group w-100 h-100">
                                                        <label class="crancy__item-label">Thumbnail Image</label>
                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" name="thumb_image" id="input-img1" class="btn-check" accept=".jpg,.jpeg,.png,.gif,.webp" onchange="previewImage(event)">
                                                            <label class="crancy-image-video-upload__label" for="input-img1">
                                                                <img id="view_img" src="{{ asset('storage/'.$partner->thumb_image ?? 'images/placeholder.png') }}" alt="Preview">
                                                                <h4 class="crancy-image-video-upload__title">
                                                                    Click here to <span class="crancy-primary-color">Choose File</span> and upload
                                                                </h4>
                                                            </label>
                                                        </div>
                                                        @error('thumb_image')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Website URL -->
                                                <div class="col-md-8">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">Website URL *</label>
                                                        <input type="url" class="crancy__item-input" name="website_url" value="{{ old('website_url', $partner->website_url) }}" required>
                                                        @error('website_url')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">Update</button>

                                        </div>
                                        <!-- End Partner Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection

@push('js_section')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('view_img').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
