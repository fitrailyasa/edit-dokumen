@extends('layouts.client.app')

@section('title', ($page->meta_title ?: $page->title) . ' | EditDokumen.id')
@section('meta_description', $page->meta_description ?: Str::limit(strip_tags($page->excerpt ?: $page->body), 160))

@section('content')
    <div class="detail-layout">
        <article class="detail-main article-show">
            <header class="article-show-header">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span aria-hidden="true">›</span>
                    <a href="{{ route('services.index') }}">Layanan</a>
                    <span aria-hidden="true">›</span>
                    <span>{{ Str::limit($page->title, 48) }}</span>
                </div>

                @if ($page->is_featured)
                    <span class="section-tag">Layanan Populer</span>
                @else
                    <span class="section-tag">Layanan</span>
                @endif

                <h1>{{ $page->title }}</h1>

                @if (!empty($page->highlights))
                    <div class="tag-list">
                        @foreach ($page->highlights as $highlight)
                            <span class="tag">{{ $highlight }}</span>
                        @endforeach
                    </div>
                @endif
            </header>

            @if ($page->featured_image)
                <figure class="article-featured">
                    <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}">
                </figure>
            @endif

            <div class="article-body">
                @if ($page->excerpt)
                    <p class="page-excerpt">{{ $page->excerpt }}</p>
                @endif

                <div class="prose">
                    {!! $page->body !!}
                </div>
            </div>
        </article>

        @include('partials.detail-sidebar', [
            'sidebarTitle' => $sidebarTitle,
            'sidebarItems' => $sidebarItems,
        ])
    </div>
@endsection
