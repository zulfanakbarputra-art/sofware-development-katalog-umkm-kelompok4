<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Katalog keripik jamur crispy, jamur kuping crispy, usus crispy, dan pare crispy dari Kediri. Pesan lewat WhatsApp.">
    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500..800&family=DM+Sans:opsz,wght@9..40,400..700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top border-bottom border-light border-opacity-10">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#beranda">Indo Jamur <span class="text-warning">Crispy</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbar-menu" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto gap-md-4 pb-3 pb-md-0">
                <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="#cara-pesan">Cara Pesan</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
    @yield('content')
</main>

<footer class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-center justify-content-sm-between align-items-center gap-2">
        <span class="font-heading fw-bold fs-6 d-none d-sm-inline">Indo Jamur <span class="text-warning">Crispy</span></span>
        <small class="opacity-75">&copy; {{ date('Y') }} {{ config('app.name') }}</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="{{ asset('js/site.js') }}" defer></script>
</body>
</html>