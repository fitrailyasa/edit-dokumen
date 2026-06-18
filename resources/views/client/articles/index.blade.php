@extends('layouts.client.app')

@section('title', 'Artikel & Panduan | EditDokumen.id')
@section('meta_description', 'Kumpulan artikel dan panduan edit dokumen, PDF, scan, makalah, dan tips dokumen digital dari EditDokumen.id.')

@section('content')
    <header class="page-header">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span aria-hidden="true">›</span>
            <span>Artikel</span>
        </div>
        <span class="section-tag">Panduan & Tips</span>
        <h1>Artikel & Panduan</h1>
        <p class="page-header-desc">Tips dan panduan lengkap seputar edit dokumen, PDF, scan, dan makalah.</p>
    </header>

    <div class="article-list">
        @forelse ($posts as $post)
            <a href="{{ route('articles.show', $post->slug) }}" class="article-card">
                <div class="article-card-icon" aria-hidden="true">📄</div>
                <div class="article-card-body">
                    @if ($post->category)
                        <span class="article-card-category">{{ $post->category->name }}</span>
                    @endif
                    <div class="article-card-title">{{ $post->title }}</div>
                    @if ($post->excerpt)
                        <p class="article-card-excerpt">{{ Str::limit(strip_tags($post->excerpt), 120) }}</p>
                    @endif
                    <div class="article-card-date">
                        {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
                    </div>
                </div>
                <span class="article-card-arrow" aria-hidden="true">→</span>
            </a>
        @empty
            <div class="empty-state">
                <p>Belum ada artikel yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>

    @if ($posts->hasPages())
        <div class="pagination-wrap">
            {{ $posts->links() }}
        </div>
    @endif
@endsection
