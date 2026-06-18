<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ $siteSetting->tagline ?: 'Jasa Edit PDF, Scan & Makalah Online Murah' }} |
        {{ $siteSetting->title ?: 'EditDokumen.id' }}</title>
    <link rel="apple-touch-icon" href="favicon.png" />
    <link rel="shortcut icon" href="favicon.png" />
    <link rel="icon" type="image/png" href="favicon.png" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#13316c" />
    <meta name="description"
        content="{{ $siteSetting->description ?: 'Jasa profesional edit PDF, scan dokumen, dan pembuatan makalah online murah & cepat. Solusi olah dokumen digital terpercaya di Indonesia dengan layanan 24 jam.' }}" />
    <meta name="keywords"
        content="jasa edit pdf, jasa scan dokumen, jasa bikin makalah, edit pdf online, jasa ketik dokumen, jasa convert pdf" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title"
        content="{{ $siteSetting->tagline ?: 'Jasa Edit PDF, Scan & Makalah Online Murah' }} | {{ $siteSetting->title ?: 'EditDokumen.id' }}" />
    <meta property="og:description"
        content="{{ $siteSetting->description ?: 'Solusi profesional olah dokumen digital. Edit PDF, scan berkas, dan pengerjaan makalah dengan hasil berkualitas dan cepat.' }}" />
    <meta property="og:image" content="og-image.png" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="index.html" />
    <meta property="twitter:title" content="Jasa Edit PDF, Scan & Makalah Online Murah | EditDokumen.id" />
    <meta property="twitter:description" content="Solusi profesional olah dokumen digital terpercaya di Indonesia." />
    <meta property="twitter:image" content="og-image.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/" />
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="global.css" />

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "EditDokumen.id",
    "image": "https://editdokumen.id/og-image.png",
    "@id": "https://editdokumen.id/#business",
    "url": "https://editdokumen.id/",
    "telephone": @json($siteSetting->whatsappInternational()),
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Jakarta",
      "addressCountry": "ID"
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
      ],
      "opens": "00:00",
      "closes": "23:59"
    },
    "sameAs": [
      @json($siteSetting->whatsappUrl())
    ]
  }
  </script>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #13316c;
            --primary-dark: #122549;
            --primary-mid: #24478f;
            --primary-light: #e8eef7;
            --accent: #2bab6f;
            --accent-light: #d4f5e6;
            --accent-bright: #40bf84;
            --green: #2bab6f;
            --text: #1b2232;
            --muted: #676f7e;
            --border: #e2e4e9;
            --bg: #f3f5f7;
            --white: #FFFFFF;
            --radius: 16px;
            --mobile-w: 460px;
            --container: min(1200px, calc(100% - 48px));
            --gradient-hero: linear-gradient(180deg, #13316c 0%, #122549 100%);
            --gradient-primary: linear-gradient(135deg, #13316c 0%, #24478f 100%);
            --gradient-accent: linear-gradient(135deg, #2bab6f 0%, #40bf84 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .shell {
            width: 100%;
            max-width: var(--mobile-w);
            background: var(--white);
            min-height: 100vh;
            position: relative;
            box-shadow: 0 0 60px rgba(0, 0, 0, .12);
            overflow: hidden;
        }

        /* ── NAV ── */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .logo-icon {
            width: 34px;
            height: 34px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 18px;
            height: 18px;
            fill: white;
        }

        .logo-text {
            font-weight: 800;
            font-size: 17px;
            color: var(--text);
            letter-spacing: -.3px;
        }

        .logo-text span {
            color: var(--primary);
        }

        .nav-wa {
            display: flex;
            align-items: center;
            gap: 6px;
            background: var(--gradient-accent);
            color: white;
            font-weight: 600;
            font-size: 13px;
            padding: 8px 16px;
            border-radius: 10px;
            text-decoration: none;
            transition: opacity .2s, transform .2s;
            box-shadow: 0 4px 14px -2px rgba(43, 171, 111, .4);
        }

        .nav-wa:hover {
            opacity: .85;
        }

        .nav-wa svg {
            width: 14px;
            height: 14px;
            fill: white;
        }

        .nav-links {
            display: none;
        }

        .nav-inner {
            display: contents;
        }

        /* ── HERO ── */
        .hero {
            background: var(--gradient-hero);
            padding: 32px 24px 48px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            background: rgba(255, 255, 255, .07);
            border-radius: 50%;
            top: -80px;
            right: -80px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, .06);
            border-radius: 50%;
            bottom: -60px;
            left: -40px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(43, 171, 111, .15);
            border: 1px solid rgba(43, 171, 111, .35);
            color: var(--accent-bright);
            font-size: 12px;
            font-weight: 600;
            padding: 7px 16px;
            border-radius: 50px;
            margin-bottom: 20px;
        }

        .hero-badge .dot {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .hero h1 {
            font-size: 30px;
            font-weight: 800;
            color: white;
            line-height: 1.25;
            letter-spacing: -.5px;
            margin-bottom: 14px;
        }

        .hero h1 em {
            font-style: normal;
            color: var(--accent-bright);
        }

        .hero p {
            color: rgba(255, 255, 255, .85);
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .hero-cta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gradient-accent);
            color: white;
            font-weight: 700;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 4px 14px -2px rgba(43, 171, 111, .45);
            transition: transform .2s, box-shadow .2s;
            width: 100%;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px -2px rgba(43, 171, 111, .5);
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
            fill: white;
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: white;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            padding: 13px 24px;
            border: 1.5px solid rgba(255, 255, 255, .55);
            border-radius: 10px;
            background: transparent;
            transition: background .2s, border-color .2s;
            width: 100%;
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, .08);
            border-color: rgba(255, 255, 255, .8);
        }

        .btn-ghost svg {
            width: 16px;
            height: 16px;
            fill: rgba(255, 255, 255, .9);
        }

        .hero-trust {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-bottom: 28px;
        }

        .hero-trust span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: rgba(255, 255, 255, .92);
            font-size: 13px;
            font-weight: 500;
            padding: 4px 8px;
        }

        .hero-trust span::before {
            content: '✓';
            color: var(--accent-bright);
            font-weight: 800;
            font-size: 14px;
        }

        .hero-offer {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
            padding: 0 4px;
        }

        .btn-offer {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2px;
            background: linear-gradient(145deg, rgba(36, 71, 143, .42) 0%, rgba(18, 37, 73, .72) 100%);
            color: white;
            padding: 16px 28px 18px;
            border-radius: 18px;
            border: 1.5px solid rgba(64, 191, 132, .5);
            text-decoration: none;
            box-shadow:
                0 10px 32px rgba(0, 0, 0, .22),
                inset 0 1px 0 rgba(255, 255, 255, .1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: transform .25s, box-shadow .25s, border-color .25s, background .25s;
            width: 100%;
            max-width: 340px;
            overflow: hidden;
        }

        .btn-offer::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 25%, rgba(64, 191, 132, .18) 50%, transparent 75%);
            transform: translateX(-120%);
            transition: transform .6s ease;
        }

        .btn-offer:hover::before {
            transform: translateX(120%);
        }

        .btn-offer:hover {
            transform: translateY(-3px) scale(1.02);
            border-color: var(--accent-bright);
            background: linear-gradient(145deg, rgba(43, 171, 111, .28) 0%, rgba(18, 37, 73, .78) 100%);
            box-shadow:
                0 14px 40px rgba(43, 171, 111, .28),
                inset 0 1px 0 rgba(255, 255, 255, .14);
        }

        .btn-offer-eyebrow {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .7px;
            text-transform: uppercase;
            color: var(--accent-bright);
            margin-bottom: 4px;
        }

        .btn-offer-price {
            font-size: clamp(28px, 7vw, 34px);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -.6px;
            color: white;
            margin: 2px 0;
        }

        .btn-offer-price span {
            color: var(--accent-bright);
        }

        .btn-offer-tagline {
            font-size: 13.5px;
            font-weight: 500;
            color: rgba(255, 255, 255, .78);
            line-height: 1.4;
            margin-top: 6px;
        }

        .btn-offer-tagline em {
            font-style: normal;
            color: white;
            font-weight: 700;
        }

        /* stats row */
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 0;
            margin-top: 32px;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 14px;
            overflow: hidden;
        }

        .stat {
            flex: 1;
            padding: 14px 8px;
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, .2);
        }

        .stat:last-child {
            border-right: none;
        }

        .stat-num {
            font-size: 20px;
            font-weight: 800;
            color: white;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 10.5px;
            color: rgba(255, 255, 255, .75);
            font-weight: 500;
        }

        /* ── SECTION HEADER ── */
        .section-header {
            text-align: center;
            padding: 36px 24px 4px;
        }

        .section-tag {
            display: inline-block;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 11.5px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 50px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .section-header h2 {
            font-size: 22px;
            font-weight: 800;
            color: var(--text);
            line-height: 1.3;
            letter-spacing: -.3px;
        }

        .section-header p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        /* ── SERVICES ── */
        .services {
            padding: 20px 20px 12px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .service-card {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 20px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
            transition: box-shadow .2s, transform .2s;
            text-decoration: none;
            color: inherit;
        }

        .service-card:hover {
            box-shadow: 0 4px 24px rgba(19, 49, 108, .1);
            transform: translateY(-2px);
        }

        .service-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 24px;
        }

        .icon-purple {
            background: var(--primary-light);
        }

        .icon-blue {
            background: var(--primary-light);
        }

        .icon-pink {
            background: var(--accent-light);
        }

        .service-body {
            flex: 1;
        }

        .service-body h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--text);
        }

        .service-body p {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.55;
            margin-bottom: 10px;
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .tag {
            background: white;
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 50px;
        }

        .service-cta {
            display: none;
            color: var(--accent);
        }

        /* ── WHY US ── */
        .why-us {
            background: var(--bg);
            padding: 48px 20px;
        }

        .why-grid {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .why-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px 20px;
            text-align: center;
        }

        .why-icon {
            width: 52px;
            height: 52px;
            background: var(--primary-light);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: 0 auto 14px;
        }

        .why-card h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text);
        }

        .why-card p {
            font-size: 13.5px;
            color: var(--muted);
            line-height: 1.6;
        }

        /* ── PROMO BANNER ── */
        .promo {
            margin: 20px;
            background: var(--gradient-primary);
            border-radius: var(--radius);
            padding: 22px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .promo-icon {
            font-size: 36px;
            line-height: 1;
            flex-shrink: 0;
        }

        .promo-body h3 {
            font-size: 16px;
            font-weight: 800;
            color: white;
            margin-bottom: 4px;
        }

        .promo-body p {
            font-size: 12.5px;
            color: rgba(255, 255, 255, .65);
            line-height: 1.5;
        }

        .promo-body strong {
            color: var(--accent-bright);
        }

        /* ── HOW IT WORKS ── */
        .how {
            padding: 8px 20px 28px;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .step {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 18px;
            top: 44px;
            bottom: -8px;
            width: 2px;
            background: var(--border);
        }

        .step-num {
            width: 36px;
            height: 36px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .step-body {
            padding: 6px 0 24px;
        }

        .step-body h4 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .step-body p {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* ── PRICING ── */
        .pricing {
            padding: 8px 20px 28px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .price-card {
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 20px;
            background: white;
            position: relative;
            transition: border-color .2s;
        }

        .price-card.popular {
            border-color: var(--primary);
        }

        .popular-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 14px;
            border-radius: 50px;
            white-space: nowrap;
        }

        .price-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .price-name {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
        }

        .price-emoji {
            font-size: 22px;
        }

        .price-amount {
            font-size: 26px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 14px;
        }

        .price-amount small {
            font-size: 13px;
            font-weight: 500;
            color: var(--muted);
        }

        .price-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .price-features li {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--muted);
        }

        .price-features li::before {
            content: '✓';
            width: 18px;
            height: 18px;
            background: var(--accent-light);
            color: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
            flex-shrink: 0;
        }

        /* ── TESTIMONIALS ── */
        .testimonials {
            padding: 8px 20px 28px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .testi-card {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
        }

        .testi-stars {
            color: #FBBF24;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .testi-text {
            font-size: 14px;
            color: var(--text);
            line-height: 1.6;
            margin-bottom: 12px;
            font-style: italic;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .testi-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }

        .testi-info strong {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
        }

        .testi-info span {
            font-size: 12px;
            color: var(--muted);
        }

        /* ── FAQ ── */
        .faq-list {
            padding: 8px 20px 28px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .faq-item {
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .faq-q {
            width: 100%;
            background: none;
            border: none;
            padding: 16px;
            text-align: left;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .faq-q svg {
            width: 18px;
            height: 18px;
            fill: var(--muted);
            transition: transform .3s;
            flex-shrink: 0;
        }

        .faq-item.open .faq-q svg {
            transform: rotate(180deg);
        }

        .faq-a {
            max-height: 0;
            overflow: hidden;
            transition: max-height .35s ease;
            padding: 0;
        }

        .faq-item.open .faq-a {
            max-height: 300px;
        }

        .faq-a p {
            padding: 0 16px 16px;
            font-size: 13.5px;
            color: var(--muted);
            line-height: 1.6;
        }

        /* ── CTA BOTTOM ── */
        .cta-wrap {
            padding: 0 20px 28px;
        }

        .cta-bottom {
            background: var(--gradient-hero);
            border-radius: var(--radius);
            padding: 28px 20px;
            text-align: center;
        }

        .cta-bottom h2 {
            font-size: 22px;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .cta-bottom p {
            color: rgba(255, 255, 255, .8);
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn-wa {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--gradient-accent);
            color: white;
            font-weight: 700;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            width: 100%;
            box-shadow: 0 4px 14px -2px rgba(43, 171, 111, .45);
            transition: transform .2s, box-shadow .2s;
        }

        .btn-wa:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px -2px rgba(43, 171, 111, .5);
        }

        .btn-wa svg {
            width: 20px;
            height: 20px;
            fill: white;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--primary-dark);
            padding: 28px 24px;
            text-align: center;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px 16px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .footer-logo-icon {
            width: 30px;
            height: 30px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-logo-icon svg {
            width: 16px;
            height: 16px;
            fill: white;
        }

        .footer-brand {
            font-size: 16px;
            font-weight: 800;
            color: white;
        }

        .footer-brand span {
            color: var(--accent-bright);
        }

        footer p {
            font-size: 12.5px;
            color: rgba(255, 255, 255, .45);
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 14px;
        }

        .footer-links a {
            font-size: 12px;
            color: rgba(255, 255, 255, .4);
            text-decoration: none;
            transition: color .2s;
        }

        .footer-links a:hover {
            color: white;
        }

        /* ── FLOAT WA ── */
        .float-wa {
            position: fixed;
            bottom: 24px;
            right: calc(50% - var(--mobile-w)/2 + 20px);
            z-index: 200;
        }

        @media (max-width: 460px) {
            .float-wa {
                right: 20px;
            }
        }

        .float-wa a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            background: var(--gradient-accent);
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(43, 171, 111, .45);
            text-decoration: none;
            transition: transform .2s;
        }

        .float-wa a:hover {
            transform: scale(1.1);
        }

        .float-wa svg {
            width: 28px;
            height: 28px;
            fill: white;
        }

        /* divider */
        .divider {
            height: 6px;
            background: var(--bg);
        }

        /* A11Y */
        .content a {
            text-decoration: none;
        }

        .content a:hover {
            text-decoration: underline;
        }

        /* ── DESKTOP ── */
        @media (min-width: 768px) {
            body {
                background: var(--white);
                display: block;
            }

            .shell {
                max-width: 100%;
                box-shadow: none;
            }

            nav {
                padding: 0 24px;
            }

            .nav-inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: var(--container);
                margin: 0 auto;
                padding: 16px 0;
            }

            .nav-links {
                display: flex;
                align-items: center;
                gap: 32px;
            }

            .nav-links a {
                color: var(--muted);
                text-decoration: none;
                font-size: 14px;
                font-weight: 600;
                transition: color .2s;
            }

            .nav-links a:hover,
            .nav-links a.active {
                color: var(--accent);
            }

            .nav-links a.active {
                background: var(--accent-light);
                padding: 6px 12px;
                border-radius: 8px;
            }

            .hero {
                padding: 40px 24px 72px;
            }

            .hero h1 {
                font-size: clamp(36px, 4.5vw, 52px);
                max-width: 820px;
                margin-left: auto;
                margin-right: auto;
            }

            .hero h1 br {
                display: none;
            }

            .hero p {
                font-size: 17px;
                max-width: 640px;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-cta {
                flex-direction: row;
                justify-content: center;
                gap: 14px;
            }

            .btn-primary,
            .btn-ghost {
                width: auto;
            }

            .btn-primary {
                padding: 15px 32px;
            }

            .btn-offer {
                max-width: 380px;
                padding: 18px 36px 20px;
            }

            .btn-offer-price {
                font-size: 36px;
            }

            .hero-stats {
                max-width: 520px;
                margin-left: auto;
                margin-right: auto;
            }

            .section-header {
                padding: 56px 24px 8px;
                max-width: var(--container);
                margin: 0 auto;
            }

            .section-header h2 br {
                display: none;
            }

            .section-header h2 {
                font-size: 32px;
            }

            .section-header p {
                font-size: 16px;
                max-width: 560px;
                margin-left: auto;
                margin-right: auto;
            }

            .services {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                max-width: var(--container);
                margin: 0 auto;
                padding: 24px 0 40px;
            }

            .service-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 28px 24px;
                background: white;
            }

            .service-body p {
                font-size: 14px;
            }

            .service-cta {
                display: inline-flex;
                align-items: center;
                gap: 4px;
                margin-top: 16px;
                color: var(--accent);
                font-size: 14px;
                font-weight: 700;
            }

            .why-us {
                padding: 64px 24px;
            }

            .why-us .section-header {
                padding-top: 0;
            }

            .why-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                max-width: var(--container);
                margin: 32px auto 0;
            }

            .promo {
                max-width: var(--container);
                margin: 0 auto 40px;
            }

            .how {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 24px 32px;
                max-width: var(--container);
                margin: 0 auto;
                padding: 24px 0 48px;
            }

            .step:not(:last-child)::after {
                display: none;
            }

            .pricing {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                max-width: var(--container);
                margin: 0 auto;
                padding: 24px 0 48px;
            }

            .testimonials {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                max-width: var(--container);
                margin: 0 auto;
                padding: 24px 0 48px;
            }

            .faq-list {
                max-width: 720px;
                margin: 0 auto;
                padding: 24px 0 48px;
            }

            .cta-wrap {
                padding: 0;
                background: var(--gradient-hero);
                margin-bottom: 0;
            }

            .cta-bottom {
                max-width: var(--container);
                margin: 0 auto;
                padding: 72px 40px;
                background: none;
                border-radius: 0;
            }

            .cta-bottom h2 {
                font-size: 32px;
            }

            .btn-wa {
                width: auto;
                padding: 15px 36px;
            }

            footer {
                padding: 48px 24px;
            }

            .float-wa {
                right: 28px;
            }

            .about-section,
            .articles-section,
            .keywords-section {
                max-width: var(--container);
                margin: 0 auto;
                padding-left: 0;
                padding-right: 0;
            }

            .about-section {
                padding-top: 48px;
                padding-bottom: 48px;
            }

            .articles-section {
                padding-top: 48px;
                padding-bottom: 48px;
            }

            .keywords-section {
                padding-top: 40px;
                padding-bottom: 40px;
            }

            .articles-grid {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 14px !important;
            }

            .keywords-grid {
                grid-template-columns: repeat(4, 1fr) !important;
            }
        }

        @media (min-width: 1024px) {
            .services {
                grid-template-columns: repeat(3, 1fr);
            }

            .why-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .how {
                grid-template-columns: repeat(4, 1fr);
            }

            .articles-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }
        }
    </style>
    <meta name="description"
        content="EditDokumen.id — jasa edit PDF, scan foto ke PDF, bikin makalah, convert JPG ke PDF, tambah watermark, dan 30+ layanan dokumen online. Mulai Rp 5.000. Chat WA sekarang!" />
    <link rel="canonical" href="index.html" />
    <!-- Open Graph / Social Meta -->
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:site_name" content="EditDokumen.id" />
    <meta property="og:title" content="Jasa Edit PDF, Scan & Makalah Online Murah | EditDokumen.id" />
    <meta property="og:description"
        content="EditDokumen.id — jasa edit PDF, scan foto ke PDF, bikin makalah, convert JPG ke PDF, tambah watermark, dan 30+ layanan dokumen online. Mulai Rp 5.000. Chat WA sekarang!" />
    <meta property="og:url" content="https://editdokumen.id/" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Jasa Edit PDF, Scan & Makalah Online Murah | EditDokumen.id" />
    <meta name="twitter:description"
        content="EditDokumen.id — jasa edit PDF, scan foto ke PDF, bikin makalah, convert JPG ke PDF, tambah watermark, dan 30+ layanan dokumen online. Mulai Rp 5.000. Chat WA sekarang!" />
    <!-- Schema: LocalBusiness + WebSite -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": ["LocalBusiness", "ProfessionalService"],
        "@id": "https://editdokumen.id/#business",
        "name": "EditDokumen.id",
        "description": "Jasa edit PDF, scan dokumen, bikin makalah, konversi foto ke PDF, tambah watermark, dan 30+ layanan dokumen online.",
        "url": "https://editdokumen.id/",
        "telephone": @json($siteSetting->whatsappInternational()),
        "priceRange": "Rp5.000 – Rp100.000",
        "currenciesAccepted": "IDR",
        "paymentAccepted": "DANA, GoPay, ShopeePay, Transfer BCA",
        "areaServed": {
          "@type": "Country",
          "name": "Indonesia"
        },
        "address": {
          "@type": "PostalAddress",
          "addressCountry": "ID"
        },
        "sameAs": []
      },
      {
        "@type": "WebSite",
        "@id": "https://editdokumen.id/#website",
        "url": "https://editdokumen.id/",
        "name": "EditDokumen.id",
        "description": "Jasa edit PDF dan dokumen online terjangkau.",
        "publisher": {
          "@id": "https://editdokumen.id/#business"
        },
        "inLanguage": "id-ID"
      }
    ]
  }
  </script>
    <!-- Schema: FAQPage -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Apakah data dan file saya aman?",
        "acceptedAnswer": { "@type": "Answer", "text": "Ya, file kamu dijaga kerahasiaannya. Kami tidak menyimpan atau membagikan file kepada pihak manapun. File dihapus setelah pesanan selesai." }
      },
      {
        "@type": "Question",
        "name": "Berapa lama proses pengerjaan jasa edit PDF?",
        "acceptedAnswer": { "@type": "Answer", "text": "Rata-rata 1–2 jam untuk edit PDF dan scan dokumen. Makalah bisa 3–6 jam tergantung panjang dan tingkat kesulitan. Bisa lebih cepat jika tidak antri." }
      },
      {
        "@type": "Question",
        "name": "Bagaimana cara pembayaran jasa edit PDF?",
        "acceptedAnswer": { "@type": "Answer", "text": "Bayar di awal setelah harga disepakati, lalu kami langsung mengerjakan pesanan. Transfer via DANA, GoPay, ShopeePay nomor 082118355665 atau Transfer BCA 7745648461 a.n. Maullana Ishak." }
      },
      {
        "@type": "Question",
        "name": "Boleh minta revisi berapa kali?",
        "acceptedAnswer": { "@type": "Answer", "text": "Revisi gratis sampai kamu puas. Tidak ada batasan jumlah revisi dan tidak ada biaya tambahan." }
      },
      {
        "@type": "Question",
        "name": "Format file apa saja yang diterima?",
        "acceptedAnswer": { "@type": "Answer", "text": "Kami menerima PDF, JPG, PNG, HEIC, Word (DOCX), dan foto dari HP. Hasil akhir bisa dalam format PDF atau Word sesuai kebutuhan." }
      },
      {
        "@type": "Question",
        "name": "Berapa harga jasa edit PDF?",
        "acceptedAnswer": { "@type": "Answer", "text": "Harga jasa edit PDF mulai Rp 10.000 per halaman tergantung tingkat kesulitan. Jasa scan foto ke PDF mulai Rp 5.000. Jasa bikin makalah mulai Rp 15.000. Semua harga transparan tanpa biaya tersembunyi." }
      },
      {
        "@type": "Question",
        "name": "Apakah bisa edit PDF yang hasil scan atau foto?",
        "acceptedAnswer": { "@type": "Answer", "text": "Bisa. Kami menggunakan software profesional untuk mengedit PDF hasil scan, foto KTP, sertifikat, dan dokumen lainnya meski tidak bisa diedit dengan tool biasa." }
      },
      {
        "@type": "Question",
        "name": "Bagaimana cara order jasa edit PDF?",
        "acceptedAnswer": { "@type": "Answer", "text": "Sangat mudah: chat WhatsApp ke 0877-7763-8865, kirim file yang ingin diedit, jelaskan perubahan yang diinginkan, setujui harga, transfer pembayaran, dan hasil akan dikirim dalam 1–2 jam." }
      },
      {
        "@type": "Question",
        "name": "Apakah tersedia jasa pembuatan CV dan surat lamaran kerja?",
        "acceptedAnswer": { "@type": "Answer", "text": "Ya. EditDokumen.id menyediakan jasa pembuatan CV profesional ATS-friendly mulai Rp 35.000, jasa pembuatan surat lamaran kerja dan cover letter mulai Rp 30.000, serta jasa surat resmi mulai Rp 20.000. Semua dikerjakan dalam 1–6 jam via WhatsApp." }
      },
      {
        "@type": "Question",
        "name": "Apakah ada jasa parafrase dan rapikan daftar pustaka?",
        "acceptedAnswer": { "@type": "Answer", "text": "Ya. Kami menyediakan jasa parafrase untuk skripsi, tesis, dan artikel mulai Rp 25.000 per 500 kata — membantu menurunkan tingkat plagiarisme di Turnitin. Tersedia juga jasa merapikan daftar pustaka format APA, MLA, IEEE, Chicago, dan Harvard mulai Rp 20.000." }
      }
    ]
  }
  </script>
    <meta name="twitter:image" content="https://editdokumen.id/og-image.png" />
</head>

<body>
    <main class="shell" role="main">
        <!-- NAV -->
        <nav aria-label="Navigasi utama">
            <div class="nav-inner">
                <a href="{{ route('home') }}" class="logo" aria-label="EditDokumen.id — Beranda">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path
                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
                        </svg>
                    </div>
                    <span class="logo-text">Edit<span>Dokumen</span>.id</span>
                </a>
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="active">Beranda</a>
                    <a href="{{ route('services.index') }}">Layanan</a>
                    <a href="{{ route('articles.index') }}">Artikel</a>
                </div>
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="nav-wa"
                    aria-label="Chat WhatsApp EditDokumen.id">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                    </svg>
                    WhatsApp
                </a>
            </div>
        </nav>
        <!-- HERO -->
        <section class="hero">
            <div class="hero-badge"><span class="dot"></span> Jasa Edit Dokumen Terpercaya #1</div>
            <h1>Butuh Bantuan <em>Edit Dokumen?</em> Kami Siap Membantu!</h1>
            <p>Jasa edit PDF, scan foto ke PDF, dan pembuatan makalah profesional untuk pelajar SMP, SMA, SMK, dan
                Mahasiswa. Dikerjakan dengan kualitas terbaik dan tepat waktu.</p>
            <div class="hero-trust">
                <span>Bebas Plagiarisme</span>
                <span>Tepat Waktu</span>
                <span>Garansi Revisi</span>
                <span>100% Rahasia</span>
            </div>
            <div class="hero-offer">
                <a href="{{ route('services.index') }}" class="btn-offer" aria-label="Lihat layanan mulai dari Rp20.000">
                    <span class="btn-offer-eyebrow">Harga terjangkau</span>
                    <span class="btn-offer-price">Mulai <span>Rp20.000</span></span>
                    <span class="btn-offer-tagline">Cepat selesai, <em>revisi sampai puas.</em></span>
                </a>
            </div>
            <div class="hero-cta">
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                    Pesan Sekarang →
                </a>
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                    Konsultasi Gratis
                </a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-num">500+</div>
                    <div class="stat-label">Pelanggan</div>
                </div>
                <div class="stat">
                    <div class="stat-num">1-2 Jam</div>
                    <div class="stat-label">Selesai</div>
                </div>
                <div class="stat">
                    <div class="stat-num">∞</div>
                    <div class="stat-label">Revisi</div>
                </div>
            </div>
        </section>
        <!-- SERVICES -->
        <div class="divider"></div>
        <div class="section-header" id="layanan">
            <div class="section-tag">Layanan Kami</div>
            <h2>{{ $featuredServices->count() }} Layanan Utama yang Tersedia</h2>
            <p>Pilih layanan sesuai kebutuhanmu, harga terjangkau hasil maksimal.</p>
        </div>
        <div class="services">
            @foreach ($featuredServices as $service)
                <a href="{{ route('pages.show', $service->slug) }}" class="service-card">
                    <div class="service-icon {{ $service->icon_style ?: 'icon-purple' }}">
                        {{ $service->icon ?: '📝' }}</div>
                    <div class="service-body">
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->excerpt }}</p>
                        @if (!empty($service->highlights))
                            <div class="tag-list">
                                @foreach ($service->highlights as $highlight)
                                    <span class="tag">{{ $highlight }}</span>
                                @endforeach
                            </div>
                        @endif
                        <span class="service-cta">Pesan →</span>
                    </div>
                </a>
            @endforeach
        </div>
        <div style="padding:0 20px 28px;text-align:center;">
            <a href="{{ route('services.index') }}"
                style="display:inline-flex;align-items:center;justify-content:center;gap:6px;background:white;border:2px solid var(--primary);color:var(--primary);font-weight:800;font-size:14px;padding:14px 28px;border-radius:12px;text-decoration:none;">
                Lihat Semua Layanan →
            </a>
        </div>
        <!-- WHY US -->
        <section class="why-us">
            <div class="section-header">
                <div class="section-tag">Keunggulan</div>
                <h2>Mengapa Memilih Kami?</h2>
                <p>Kepuasan dan kepercayaan pelanggan adalah prioritas utama kami.</p>
            </div>
            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon">🛡️</div>
                    <h3>Bebas Plagiarisme</h3>
                    <p>Setiap dokumen dicek kualitasnya dan dijaga orisinalitasnya.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">⏱️</div>
                    <h3>Tepat Waktu</h3>
                    <p>Pengerjaan sesuai deadline yang disepakati, rata-rata selesai 1–2 jam.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">🔄</div>
                    <h3>Garansi Revisi</h3>
                    <p>Revisi gratis tanpa batas sampai hasil sesuai keinginan Anda.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">🔒</div>
                    <h3>100% Rahasia</h3>
                    <p>Data dan file Anda dijaga kerahasiaannya sepenuhnya.</p>
                </div>
            </div>
        </section>
        <!-- PROMO BANNER -->
        <div class="promo">
            <div class="promo-icon">🎁</div>
            <div class="promo-body">
                <h3>Setelah Bayar, Langsung Dikerjakan!</h3>
                <p>Transfer di awal, kami langsung proses. <strong>Revisi tak terbatas</strong> sampai kamu 100% puas.
                </p>
            </div>
        </div>
        <!-- HOW IT WORKS -->
        <div class="divider" style="margin-top:20px;"></div>
        <div class="section-header">
            <div class="section-tag">Cara Order</div>
            <h2>Mudah, Cepat, Beres!</h2>
        </div>
        <div class="how">
            <div class="step">
                <div class="step-num">1</div>
                <div class="step-body">
                    <h4>Chat WhatsApp</h4>
                    <p>Hubungi kami via WA, ceritakan kebutuhanmu & kirim file yang perlu diedit.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <div class="step-body">
                    <h4>Bayar di Awal</h4>
                    <p>Transfer sesuai harga yang disepakati via GoPay, OVO, Dana, atau transfer bank.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <div class="step-body">
                    <h4>Proses 1-2 Jam</h4>
                    <p>Setelah pembayaran masuk, tim kami langsung mengerjakan pesananmu.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <div class="step-body">
                    <h4>Cek Hasil & Revisi</h4>
                    <p>Terima file hasil, minta revisi sebanyak apapun sampai kamu puas. File dikirim via WA.</p>
                </div>
            </div>
        </div>
        <!-- PRICING -->
        <div class="divider"></div>
        <div class="section-header">
            <div class="section-tag">Harga</div>
            <h2>Harga Transparan, Tanpa Biaya Tambahan</h2>
            <p>Harga bisa berubah sesuai tingkat kesulitan. Tanya dan konsultasi dulu gratis!</p>
        </div>
        <div class="pricing">
            <div class="price-card">
                <div class="price-header">
                    <div class="price-name">Edit PDF</div>
                    <div class="price-emoji">📝</div>
                </div>
                <div class="price-amount">Mulai Rp 25.000 <small>/ dokumen</small></div>
                <ul class="price-features">
                    <li>Edit teks & gambar PDF</li>
                    <li>Hapus / tambah watermark</li>
                    <li>Ubah layout & margin</li>
                    <li>Revisi tak terbatas</li>
                    <li>Selesai 1-2 jam</li>
                </ul>
            </div>
            <div class="price-card popular">
                <div class="popular-badge">⭐ Paling Laris</div>
                <div class="price-header">
                    <div class="price-name">Scan PDF Bersih</div>
                    <div class="price-emoji">📷</div>
                </div>
                <div class="price-amount">Mulai Rp 15.000 <small>/ halaman</small></div>
                <ul class="price-features">
                    <li>Foto jadi PDF berkualitas tinggi</li>
                    <li>Hapus bayangan & noise</li>
                    <li>Perbaiki kecerahan & warna</li>
                    <li>Luruskan dokumen miring</li>
                    <li>Gabungkan jadi 1 PDF</li>
                </ul>
            </div>
            <div class="price-card">
                <div class="price-header">
                    <div class="price-name">Bikin Makalah</div>
                    <div class="price-emoji">📚</div>
                </div>
                <div class="price-amount">Mulai Rp 75.000 <small>/ makalah</small></div>
                <ul class="price-features">
                    <li>Makalah & laporan akademik</li>
                    <li>Untuk SMP, SMA & Kampus</li>
                    <li>Format sesuai sekolah/kampus</li>
                    <li>Daftar pustaka lengkap</li>
                    <li>Revisi tak terbatas</li>
                </ul>
            </div>
        </div>
        <!-- TESTIMONIALS -->
        <div class="divider"></div>
        <div class="section-header">
            <div class="section-tag">Testimoni</div>
            <h2>Kata Mereka yang Sudah Order</h2>
        </div>
        <div class="testimonials">
            <div class="testi-card">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">"Cepet banget prosesnya! Kirim file jam 9 pagi, selesai jam 10. PDF ku yang
                    berantakan
                    jadi rapi banget. Recommended!"</p>
                <div class="testi-author">
                    <div class="testi-avatar" style="background:var(--primary);">A</div>
                    <div class="testi-info">
                        <strong>Andini R.</strong>
                        <span>Mahasiswi UI, Jakarta</span>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">"Foto KTP & sertifikatku gelap, blur, miring. Hasilnya jadi kayak scan asli!
                    Admin sabar
                    nemenin revisi sampe puas."</p>
                <div class="testi-author">
                    <div class="testi-avatar" style="background:var(--accent);">B</div>
                    <div class="testi-info">
                        <strong>Budi S.</strong>
                        <span>Karyawan Swasta, Surabaya</span>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">"Deadline makalah tinggal semalam, langsung order sini. Makalahnya bagus, format
                    udah
                    bener, dapat A! Pake lagi deh."</p>
                <div class="testi-author">
                    <div class="testi-avatar" style="background:var(--primary-mid);">D</div>
                    <div class="testi-info">
                        <strong>Dinda F.</strong>
                        <span>Mahasiswi UGM, Yogyakarta</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ -->
        <div class="divider"></div>
        <div class="section-header">
            <div class="section-tag">FAQ</div>
            <h2>Pertanyaan yang Sering Ditanya</h2>
        </div>
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Apakah data/file saya aman?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Ya, file kamu dijaga kerahasiaannya. Kami tidak menyimpan atau membagikan file kepada pihak
                        manapun. File
                        dihapus setelah pesanan selesai.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Berapa lama proses pengerjaannya?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Rata-rata 1-2 jam untuk edit PDF dan scan. Makalah bisa 3-6 jam tergantung panjang dan tingkat
                        kesulitan.
                        Bisa lebih cepat jika tidak antri.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Bagaimana cara pembayarannya?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Bayar di awal setelah harga disepakati, lalu kami langsung mengerjakan pesananmu. Transfer via
                        GoPay, OVO,
                        Dana, BCA, BRI, atau dompet digital lainnya.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Boleh minta revisi berapa kali?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Revisi tidak terbatas! Minta revisi sebanyak apapun sampai kamu benar-benar puas dengan hasilnya,
                        tanpa
                        biaya tambahan.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Format file apa saja yang diterima?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Kami menerima PDF, JPG, PNG, HEIC, Word (DOCX), dan foto dari HP. Hasil akhir bisa dalam format
                        PDF atau Word sesuai kebutuhan.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Berapa harga jasa edit PDF?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Harga mulai Rp 10.000 untuk edit PDF sederhana. Scan foto ke PDF mulai Rp 5.000/halaman. Makalah
                        mulai Rp 15.000. Semua harga transparan tanpa biaya tersembunyi — disepakati dulu sebelum
                        dikerjakan.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Apakah bisa edit PDF hasil scan atau foto HP?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Bisa. Kami menggunakan software profesional untuk mengedit PDF hasil scan, foto KTP, sertifikat,
                        dan dokumen lainnya — meski tidak bisa diedit dengan tool gratis biasa.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                    Bagaimana cara order jasa edit PDF?
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="faq-a">
                    <p>Chat WhatsApp ke 0877-7763-8865 → kirim file → jelaskan perubahan → setujui harga → transfer →
                        hasil dikirim dalam 1–2 jam. Tidak perlu install aplikasi apapun.</p>
                </div>
            </div>
        </div>
        <!-- ABOUT SECTION -->
        <div class="divider"></div>
        <!-- CTA BOTTOM -->
        <div class="cta-wrap">
            <div class="cta-bottom">
                <h2>Siap Menyelesaikan Tugas Dokumen Anda?</h2>
                <p>Jangan biarkan deadline menghantui. Pesan sekarang dan nikmati hasil berkualitas!</p>
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="btn-wa">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                    </svg>
                    Chat WhatsApp Sekarang
                </a>
            </div>
        </div>
        <!-- FOOTER -->
        <footer>
            <div class="footer-logo">
                <div class="footer-logo-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
                    </svg>
                </div>
                <span class="footer-brand">Edit<span>Dokumen</span>.id</span>
            </div>
            <p>{{ $siteSetting->tagline ?: 'Jasa Edit PDF · Scan Foto ke PDF · Bikin Makalah' }}<br />Profesional,
                Cepat & Terpercaya</p>
            <p>📍 {{ $siteSetting->address ?: 'Melayani di seluruh Indonesia via WhatsApp' }}</p>
            <div class="footer-links">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('services.index') }}">Layanan</a>
                <a href="{{ route('articles.index') }}">Artikel</a>
                @foreach ($footerPages ?? [] as $footerPage)
                    <a href="{{ route('pages.show', $footerPage->slug) }}">{{ $footerPage->title }}</a>
                @endforeach
            </div>
        </footer>
    </main>
    <!-- FLOATING WA BUTTON -->
    <div class="float-wa">
        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
            aria-label="Chat WhatsApp EditDokumen.id">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
            </svg>
        </a>
    </div>
    <script>
        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            const isOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item').forEach(i => {
                i.classList.remove('open');
                i.querySelector('.faq-q').setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                item.classList.add('open');
                btn.setAttribute('aria-expanded', 'true');
            }
        }

        function toggleLayanan() {
            var more = document.getElementById('more-layanan');
            var btn = document.getElementById('toggle-layanan');
            var isHidden = more.style.display === 'none';
            more.style.display = isHidden ? 'grid' : 'none';
            btn.textContent = isHidden ? 'Sembunyikan ↑' : 'Lihat Semua Layanan ↓';
            btn.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
        }
    </script>
</body>

</html>
