@extends('layouts.client.app')

@section('title', 'Layanan Kami | EditDokumen.id')
@section('meta_description', 'Daftar lengkap layanan edit dokumen, PDF, scan, makalah, dan jasa dokumen digital profesional dari EditDokumen.id.')

@section('content')
    <header class="page-header">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span aria-hidden="true">›</span>
            <span>Layanan</span>
        </div>
        <span class="section-tag">Layanan Kami</span>
        <h1>Semua Layanan Dokumen</h1>
        <p class="page-header-desc">Pilih layanan sesuai kebutuhanmu — edit PDF, scan, makalah, dan puluhan layanan dokumen lainnya.</p>
    </header>

    <div class="service-list">
        @forelse ($services as $service)
            <a href="{{ route('pages.show', $service->slug) }}" class="service-card">
                @if ($service->is_featured)
                    <span class="service-card-badge">Populer</span>
                @endif
                <div class="service-card-icon" aria-hidden="true">{{ $service->icon ?: '📝' }}</div>
                <div class="service-card-body">
                    <div class="service-card-title">{{ $service->title }}</div>
                    @if ($service->excerpt)
                        <p class="service-card-excerpt">{{ $service->excerpt }}</p>
                    @endif
                    @if (!empty($service->highlights))
                        <div class="service-card-tags">
                            @foreach (array_slice($service->highlights, 0, 3) as $highlight)
                                <span class="service-card-tag">{{ $highlight }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
                <span class="service-card-cta">Pesan →</span>
            </a>
        @empty
            <div class="empty-state">
                <p>Belum ada layanan yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>

    @if ($services->hasPages())
        <div class="pagination-wrap">
            {{ $services->links() }}
        </div>
    @endif
@endsection
