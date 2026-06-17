<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed admin-theme">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" target="_blank" class="nav-link">
                    <i class="fas fa-external-link-alt fa-sm"></i> Lihat Situs
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown navbar-user">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-sm border-0" style="border-radius: 10px;">
                    <div class="dropdown-item-text">
                        <div class="font-weight-bold">{{ auth()->user()->name }}</div>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2 text-muted"></i> Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    @include('layouts.admin.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1>@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        @hasSection('breadcrumb')
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                                @yield('breadcrumb')
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="content pb-4">
            <div class="container-fluid">
                @include('layouts.admin.alerts')
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }} {{ config('app.name') }}</strong>
        <span class="float-right d-none d-sm-inline-block">Panel Admin</span>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
    window.slugify = function (text) {
        return (text || '')
            .toString()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    };

    window.initAutoSlug = function (sourceSelector, slugSelector) {
        const $source = $(sourceSelector);
        const $slug = $(slugSelector);

        if (!$source.length || !$slug.length) {
            return null;
        }

        let manual = false;

        $slug.off('input.autoSlug').on('input.autoSlug', function () {
            manual = true;
        });

        $source.off('input.autoSlug').on('input.autoSlug', function () {
            if (!manual) {
                $slug.val(window.slugify($source.val()));
            }
        });

        return {
            reset: function (name, slug) {
                $source.val(name);
                $slug.val(slug);
                manual = slug !== '' && slug !== window.slugify(name);
            },
            clear: function () {
                $source.val('');
                $slug.val('');
                manual = false;
            },
            detectManual: function () {
                manual = $slug.val() !== '' && $slug.val() !== window.slugify($source.val());
            },
        };
    };
</script>
@stack('scripts')
</body>
</html>
