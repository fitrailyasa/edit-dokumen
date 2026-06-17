@extends('layouts.admin.app')

@section('title', 'Edit Halaman')
@section('page-title', 'Edit Halaman')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Halaman</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card admin-card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-edit"></i> Edit Halaman</h3>
        </div>
        <div class="card-body">
            @include('admin.pages._form')
        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-warning btn-admin-add">
                <i class="fas fa-save"></i> Update Halaman
            </button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-light">Batal</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    const pageSlug = initAutoSlug('#page-title', '#page-slug');
    pageSlug?.detectManual();
</script>
@endpush

@include('layouts.admin.partials.tinymce')
