@extends('layouts.admin.app')

@section('title', 'Tambah Artikel')
@section('page-title', 'Tambah Artikel')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Artikel</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card admin-card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus-circle"></i> Form Artikel Baru</h3>
            </div>
            <div class="card-body">
                @include('admin.posts._form')
            </div>
            <div class="card-footer bg-white">
                <button type="submit" class="btn btn-primary btn-admin-add">
                    <i class="fas fa-save"></i> Simpan Artikel
                </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-light">Batal</a>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        initAutoSlug('#post-title', '#post-slug');
    </script>
@endpush

@include('layouts.admin.partials.tinymce')
@include('layouts.admin.partials.select2', ['placeholder' => 'Pilih tag...'])
