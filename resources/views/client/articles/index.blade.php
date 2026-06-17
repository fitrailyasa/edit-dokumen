@extends('layouts.client.app')

@section('title', 'Artikel & Panduan | EditDokumen.id')
@section('meta_description', 'Kumpulan artikel dan panduan edit dokumen, PDF, scan, makalah, dan tips dokumen digital dari EditDokumen.id.')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span>›</span>
        <span>Artikel</span>
    </div>

    <h1>Artikel & Panduan</h1>
    <p class="page-meta">Tips dan panduan lengkap seputar dokumen digital</p>

    <div class="article-list">
        @forelse ($posts as $post)
            <a href="{{ route('articles.show', $post->slug) }}" class="article-card">
                <div>
                    <div class="article-card-title">{{ $post->title }}</div>
                    <div class="article-card-date">
                        {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
                        @if ($post->category)
                            · {{ $post->category->name }}
                        @endif
                    </div>
                </div>
                <span class="article-card-arrow">›</span>
            </a>
        @empty
            <p class="page-meta">Belum ada artikel yang dipublikasikan.</p>
        @endforelse
    </div>

    @if ($posts->hasPages())
        <div class="pagination-wrap">
            {{ $posts->links() }}
        </div>
    @endif
@endsection
