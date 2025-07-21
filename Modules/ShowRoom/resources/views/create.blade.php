@extends('admin.master_layout')

@section('title')
    <title>Create Showroom</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Create Showroom</h3>
    <p class="crancy-header__text">Manage Showrooms >> Create Showroom</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.showroom.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">Create Showroom</h4>
                                                <a href="{{ route('admin.showroom.index') }}" class="crancy-btn">
                                                    <i class="fa fa-list"></i> Showroom List
                                                </a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <!-- Title -->
                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">Title *</label>
                                                        <input type="text" name="title" class="crancy__item-input" placeholder="Enter title" required>
                                                        @error('title')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Status -->
                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">Status *</label>
                                                        <select name="active" class="crancy__item-input" required>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                        @error('active')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Description -->
                                                <div class="col-md-12">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">Description</label>
                                                        <textarea name="description" class="crancy__item-input" rows="4" placeholder="Enter description (optional)"></textarea>
                                                        @error('description')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Images -->
                                                <div class="col-md-12">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">Upload Images *</label>
                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" name="images[]" id="input-img1" class="btn-check" accept="image/*" multiple onchange="previewImage(event)" required>
                                                            <label class="crancy-image-video-upload__label" for="input-img1">
                                                                <img id="view_img" src="{{ asset('images/placeholder.png') }}" alt="Preview" style="max-height: 150px;">
                                                                <h4 class="crancy-image-video-upload__title">
                                                                    Click here to <span class="crancy-primary-color">choose files</span> and upload
                                                                </h4>
                                                            </label>
                                                        </div>
                                                        @error('images')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        @error('images.*')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">Save</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End crancy-dsinner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js_section')
<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function(){
            const viewImg = document.getElementById('view_img');
            viewImg.src = reader.result;
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
