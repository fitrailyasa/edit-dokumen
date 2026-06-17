<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563EB">
    <title>@yield('title', 'EditDokumen.id')</title>
    <meta name="description" content="@yield('meta_description', 'Jasa edit dokumen, PDF, scan, dan makalah online profesional di Indonesia.')">
    @stack('meta')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/client.css') }}">
    @stack('styles')
</head>
<body>
    <main class="shell" role="main">
        <nav aria-label="Navigasi utama">
            @include('layouts.client.header')
        </nav>

        <div class="page-content">
            @yield('content')
        </div>

        <footer>
            @include('layouts.client.footer')
        </footer>
    </main>
    @stack('scripts')
</body>
</html>
