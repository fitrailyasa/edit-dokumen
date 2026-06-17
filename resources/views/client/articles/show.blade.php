@extends('layouts.client.app')

@section('title', $post->title . ' | EditDokumen.id')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?: $post->body), 160))

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span>›</span>
        <a href="{{ route('articles.index') }}">Artikel</a>
        <span>›</span>
        <span>{{ Str::limit($post->title, 40) }}</span>
    </div>

    <h1>{{ $post->title }}</h1>
    <p class="page-meta">
        {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
        @if ($post->category)
            · {{ $post->category->name }}
        @endif
        @if ($post->user)
            · {{ $post->user->name }}
        @endif
    </p>

    @if ($post->tags->isNotEmpty())
        <div class="tag-list">
            @foreach ($post->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
            @endforeach
        </div>
    @endif

    @if ($post->featured_image)
        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="page-featured">
    @endif

    @if ($post->excerpt)
        <p class="page-excerpt">{{ $post->excerpt }}</p>
    @endif

    <div class="prose">
        {!! $post->body !!}
    </div>
@endsection
