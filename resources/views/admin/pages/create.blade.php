@extends('layouts.admin.app')

@section('title', 'Tambah Halaman')
@section('page-title', 'Tambah Halaman')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Halaman</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card admin-card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-plus-circle"></i> Form Halaman Baru</h3>
        </div>
        <div class="card-body">
            @include('admin.pages._form')
        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-primary btn-admin-add">
                <i class="fas fa-save"></i> Simpan Halaman
            </button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-light">Batal</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    initAutoSlug('#page-title', '#page-slug');
</script>
@endpush

@include('layouts.admin.partials.tinymce')
