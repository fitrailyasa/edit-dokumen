@extends('layouts.client.app')

@section('title', ($page->meta_title ?: $page->title) . ' | EditDokumen.id')
@section('meta_description', $page->meta_description ?: Str::limit(strip_tags($page->excerpt ?: $page->body), 160))

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span>›</span>
        <span>{{ $page->title }}</span>
    </div>

    <h1>{{ $page->title }}</h1>

    @if ($page->featured_image)
        <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}" class="page-featured">
    @endif

    @if ($page->excerpt)
        <p class="page-excerpt">{{ $page->excerpt }}</p>
    @endif

    <div class="prose">
        {!! $page->body !!}
    </div>
@endsection
