<div class="footer-logo">
    <div class="footer-logo-icon">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
        </svg>
    </div>
    <span class="footer-brand">Edit<span>Dokumen</span>.id</span>
</div>
<p>{{ $siteSetting->tagline ?: 'Jasa Edit PDF · Scan Foto ke PDF · Bikin Makalah' }}<br />Profesional, Cepat & Terpercaya</p>
<p>📍 {{ $siteSetting->address ?: 'Melayani di seluruh Indonesia via WhatsApp' }}</p>
<div class="footer-links">
    <a href="{{ route('home') }}">Beranda</a>
    <a href="{{ route('services.index') }}">Layanan</a>
    <a href="{{ route('articles.index') }}">Artikel</a>
    @foreach ($footerPages ?? [] as $footerPage)
        <a href="{{ route('pages.show', $footerPage->slug) }}">{{ $footerPage->title }}</a>
    @endforeach
</div>
