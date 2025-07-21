@extends('admin.master_layout')

@section('title')
    <title>Edit Showroom</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Edit Showroom</h3>
    <p class="crancy-header__text">Manage Showrooms >> Edit Showroom</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.showroom.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">Edit Showroom</h4>
                                                <a href="{{ route('admin.showroom.index') }}" class="crancy-btn">
                                                    <i class="fa fa-list"></i> Showroom List
                                                </a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <!-- Title -->
                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">Title *</label>
                                                        <input type="text" name="title" value="{{ old('title', $data->title) }}" class="crancy__item-input" required>
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
                                                            <option value="1" {{ $data->active ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ !$data->active ? 'selected' : '' }}>Inactive</option>
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
                                                        <textarea name="description" class="crancy__item-input" rows="4">{{ old('description', $data->description) }}</textarea>
                                                        @error('description')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Existing Images -->
                                                <div class="col-md-12">
                                                    <label class="crancy__item-label d-block mb-2">Existing Images:</label>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @php
                                                            $images = explode(',', $data->images);
                                                        @endphp
                                                        @foreach ($images as $img)
                                                            @if ($img)
                                                                <div>
                                                                    <img src="{{ asset('storage/' . $img) }}" alt="Image" width="120" height="80" style="object-fit: cover; border: 1px solid #ccc;">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Upload New Images -->
                                                <div class="col-md-12 mt-3">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">Upload Additional Images</label>
                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" name="images[]" id="input-img1" class="btn-check" accept="image/*" multiple onchange="previewImage(event)">
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

                                            <button class="crancy-btn mg-top-25" type="submit">Update</button>

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
