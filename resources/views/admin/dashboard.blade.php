@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6 mb-3">
        <div class="stat-card stat-card-primary">
            <div class="stat-inner">
                <div class="stat-value">{{ $postsCount }}</div>
                <p class="stat-label">Total Artikel</p>
                <i class="fas fa-newspaper stat-icon"></i>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="stat-footer">
                Kelola artikel <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
        <div class="stat-card stat-card-success">
            <div class="stat-inner">
                <div class="stat-value">{{ $categoriesCount }}</div>
                <p class="stat-label">Kategori</p>
                <i class="fas fa-folder stat-icon"></i>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="stat-footer">
                Kelola kategori <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
        <div class="stat-card stat-card-warning">
            <div class="stat-inner">
                <div class="stat-value">{{ $tagsCount }}</div>
                <p class="stat-label">Tag</p>
                <i class="fas fa-tags stat-icon"></i>
            </div>
            <a href="{{ route('admin.tags.index') }}" class="stat-footer">
                Kelola tag <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
        <div class="stat-card stat-card-danger">
            <div class="stat-inner">
                <div class="stat-value">{{ $usersCount }}</div>
                <p class="stat-label">Pengguna</p>
                <i class="fas fa-users stat-icon"></i>
            </div>
            <a href="{{ route('admin.users.index') }}" class="stat-footer">
                Kelola pengguna <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</div>

<div class="card admin-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-clock"></i> Artikel Terbaru</h3>
        <div class="card-tools">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm btn-admin-add">
                <i class="fas fa-plus"></i> Tambah Artikel
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentPosts as $post)
                    <tr>
                        <td class="font-weight-bold">{{ $post->title }}</td>
                        <td>{{ $post->category?->name ?? '-' }}</td>
                        <td>
                            <span class="badge badge-pill-custom badge-{{ $post->status === 'published' ? 'success' : 'secondary' }}">
                                {{ $post->status === 'published' ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td class="text-muted">{{ $post->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    @include('layouts.admin.partials.empty-state', [
                        'colspan' => 5,
                        'icon' => 'fa-newspaper',
                        'message' => 'Belum ada artikel. Mulai tulis artikel pertama Anda.',
                    ])
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
