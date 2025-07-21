@extends('admin.master_layout')
@section('title')
    <title>All Showrooms</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">All Showrooms</h3>
    <p class="crancy-header__text">Manage Showrooms >> All Showrooms</p>
@endsection

@section('body-content')
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <div class="crancy-dsinner">
                        <div class="crancy-table crancy-table--v3 mg-top-30">
                            <div class="crancy-customer-filter">
                                <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                    <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title">All Showrooms</h4>
                                        <a href="{{ route('admin.showroom.create') }}" class="crancy-btn">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            Create New
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                <table class="crancy-table__main crancy-table__main-v3 no-footer" id="dataTable">
                                    <thead class="crancy-table__head">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="crancy-table__body">
                                        @foreach ($data as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>

                                                <td>
                                                    @php
                                                        $images = explode(',', $item->images);
                                                    @endphp
                                                    @if (!empty($images[0]))
                                                        <img src="{{ asset('storage/' . $images[0]) }}" width="80" height="60" alt="Showroom image" style="object-fit: cover;">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>

                                                <td>{{ $item->title }}</td>

                                                <td>
                                                    @if ($item->active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-secondary">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <button class="crancy-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{ route('admin.showroom.edit', $item->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a></li>
                                                            <li>
                                                                <a href="javascript:;" onclick="itemDeleteConfrimation({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item"><i class="fas fa-trash"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="item_delect_confirmation" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this showroom?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js_section')
<script>
    function itemDeleteConfrimation(id) {
        let url = '{{ url("admin/showroom") }}/' + id;
        $('#item_delect_confirmation').attr('action', url);
    }
</script>
@endpush
