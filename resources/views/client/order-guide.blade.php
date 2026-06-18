@extends('layouts.client.app')

@section('title', 'Cara Order | EditDokumen.id')
@section('meta_description', 'Panduan cara order jasa edit dokumen, PDF, scan, dan makalah di EditDokumen.id — mudah via WhatsApp, bayar di awal, selesai 1-2 jam.')

@section('content')
    <header class="page-header">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span aria-hidden="true">›</span>
            <span>Cara Order</span>
        </div>
        <span class="section-tag">Cara Order</span>
        <h1>Mudah, Cepat, Beres!</h1>
        <p class="page-header-desc">Empat langkah sederhana untuk order jasa edit dokumen via WhatsApp.</p>
    </header>

    @include('partials.how-steps')

    @include('partials.page-cta')
@endsection
