@extends('layouts.client.app')

@section('title', $post->title . ' | EditDokumen.id')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?: $post->body), 160))

@section('content')
    <div class="detail-layout">
        <article class="detail-main article-show">
            <header class="article-show-header">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span aria-hidden="true">›</span>
                    <a href="{{ route('articles.index') }}">Artikel</a>
                    <span aria-hidden="true">›</span>
                    <span>{{ Str::limit($post->title, 48) }}</span>
                </div>

                @if ($post->category)
                    <span class="section-tag">{{ $post->category->name }}</span>
                @else
                    <span class="section-tag">Artikel</span>
                @endif

                <h1>{{ $post->title }}</h1>

                @if ($post->tags->isNotEmpty())
                    <div class="tag-list">
                        @foreach ($post->tags as $tag)
                            <span class="tag">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
            </header>

            @if ($post->featured_image)
                <figure class="article-featured">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                </figure>
            @endif

            <div class="article-body">
                @if ($post->excerpt)
                    <p class="page-excerpt">{{ $post->excerpt }}</p>
                @endif

                <div class="prose">
                    {!! $post->body !!}
                </div>
            </div>
        </article>

        @include('partials.detail-sidebar', [
            'sidebarTitle' => $sidebarTitle,
            'sidebarItems' => $sidebarItems,
        ])
    </div>
@endsection
