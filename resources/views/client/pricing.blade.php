@extends('layouts.client.app')

@section('title', 'Daftar Harga | EditDokumen.id')
@section('meta_description', 'Harga transparan jasa edit PDF, scan dokumen, dan bikin makalah di EditDokumen.id. Mulai Rp15.000, revisi tak terbatas, tanpa biaya tersembunyi.')

@section('content')
    <header class="page-header">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span aria-hidden="true">›</span>
            <span>Harga</span>
        </div>
        <span class="section-tag">Harga</span>
        <h1>Harga Transparan, Tanpa Biaya Tambahan</h1>
        <p class="page-header-desc">Harga bisa berubah sesuai tingkat kesulitan. Tanya dan konsultasi dulu gratis!</p>
    </header>

    @include('partials.pricing-cards')

    @include('partials.page-cta')
@endsection
