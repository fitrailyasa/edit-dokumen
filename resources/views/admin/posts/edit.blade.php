@extends('layouts.admin.app')

@section('title', 'Edit Artikel')
@section('page-title', 'Edit Artikel')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Artikel</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card admin-card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-edit"></i> Edit Artikel</h3>
        </div>
        <div class="card-body">
            @include('admin.posts._form')
        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-warning btn-admin-add">
                <i class="fas fa-save"></i> Update Artikel
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-light">Batal</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    const postSlug = initAutoSlug('#post-title', '#post-slug');
    postSlug?.detectManual();
</script>
@endpush
