@extends('layouts.site')

@section('content')

    {{-- BERANDA --}}
    <section id="beranda" class="hero position-relative d-flex flex-column flex-xl-row align-items-xl-center bg-dark text-white">
        <div class="hero-photo flex-grow-1">
            <img class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                 src="{{ asset('images/hero.webp') }}" alt="">
            <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
        </div>

        <div class="container position-relative py-4 py-md-5">
            <div class="row">
                <div class="col-md-9 col-xl-6">
                    <h1 class="hero-title lh-1 fw-bold mb-3">Kriuknya renyah, bikin susah berhenti</h1>
                    <p class="fs-6 opacity-75 mb-4">
                        Jamur crispy, jamur kuping, usus, dan pare goreng renyah buatan rumahan dari Pagu, Kediri. Pesan langsung lewat WhatsApp
                    </p>
                    <div class="d-grid d-sm-flex flex-wrap gap-2 gap-sm-3">
                        <a class="btn btn-warning px-4 py-2 fw-semibold" href="{{ $setting->greetingUrl() }}" target="_blank">Hubungi via WhatsApp</a>
                        <a class="btn btn-outline-light px-4 py-2 fw-semibold" href="#produk">Lihat Katalog Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUK --}}
    <section id="produk" class="section">
        <div class="container">
            <div class="mb-4 mb-md-5">
                <h2 class="section-title lh-sm fw-bold mb-2">Produk Kami</h2>
                <p class="fs-6 text-body-secondary mb-0">Pilih varian, tentukan ukuran dan jumlah, lalu kirim pesanan lewat WhatsApp</p>
            </div>

            @if (session('error') || $errors->any())
                <div class="alert alert-warning" role="alert">
                    {{ session('error') ?? 'Pesanan belum lengkap, pilih ukuran dan jumlah lalu coba lagi' }}
                </div>
            @endif

            <div class="row g-3 g-lg-4">
                @forelse ($products as $product)
                    <div class="col-xl-6">
                        @include('partials.product-card')
                    </div>
                @empty
                    <p class="text-body-secondary">Produk belum tersedia</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CARA PEMESANAN --}}
    <section id="cara-pesan" class="section bg-dark text-white">
        <div class="container">
            <div class="mb-4 mb-md-5">
                <h2 class="section-title lh-sm fw-bold mb-2">Cara Pemesanan</h2>
                <p class="fs-6 opacity-75 mb-0">Pesan varian favoritmu dalam tiga langkah mudah</p>
            </div>

            <ol class="row g-3 g-lg-4 list-unstyled mb-0">
                <li class="col-md-4">
                    <div class="h-100 p-4 bg-black bg-opacity-25 rounded-4">
                        <span class="font-heading display-5 fw-bold text-warning">1</span>
                        <h3 class="fs-6 fw-bold mt-3 mb-1">Pilih Varian</h3>
                        <p class="opacity-75 mb-0">Tentukan varian, ukuran, dan jumlah yang kamu mau di bagian Produk Kami</p>
                    </div>
                </li>
                <li class="col-md-4">
                    <div class="h-100 p-4 bg-black bg-opacity-25 rounded-4">
                        <span class="font-heading display-5 fw-bold text-warning">2</span>
                        <h3 class="fs-6 fw-bold mt-3 mb-1">Kirim Pesan WhatsApp</h3>
                        <p class="opacity-75 mb-0">Tekan Pesan via WhatsApp, isi pesanan otomatis tertulis tinggal kirim</p>
                    </div>
                </li>
                <li class="col-md-4">
                    <div class="h-100 p-4 bg-black bg-opacity-25 rounded-4">
                        <span class="font-heading display-5 fw-bold text-warning">3</span>
                        <h3 class="fs-6 fw-bold mt-3 mb-1">Tunggu Konfirmasi</h3>
                        <p class="opacity-75 mb-0">Kami balas untuk memastikan total harga dan pengirimannya, lalu pesanan disiapkan</p>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    {{-- TENTANG (foto dan teks sementara) --}}
    <section id="tentang" class="section bg-white">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="img-fluid rounded-4" src="{{ asset('images/tentang.webp') }}"
                         alt="Proses pengemasan keripik di dapur rumahan" width="1200" height="896" loading="lazy">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title lh-sm fw-bold mb-3">Dari dapur rumahan di Pagu</h2>
                    <p class="fs-6 text-body-secondary">
                        Indo Jamur Crispy adalah usaha rumahan dari Dusun Sumberejo, Desa Tanjung, Pagu, Kediri. Kami mengolah jamur dan sayuran menjadi beberapa varian crispy dengan bumbu sederhana yang cocok di lidah.
                    </p>
                    <p class="fs-6 text-body-secondary mb-0">
                        Setiap pesanan digoreng lalu dikemas rapat supaya tetap kriuk sampai di tanganmu. Setiap varian pas untuk teman santai keluarga, teman nonton, atau oleh-oleh dari Kediri.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- KONTAK DAN LOKASI (data dari tabel settings) --}}
    <section id="kontak" class="section">
        <div class="container">
            <div class="mb-4 mb-md-5">
                <h2 class="section-title lh-sm fw-bold mb-2">Kontak dan Lokasi</h2>
                <p class="fs-6 text-body-secondary mb-0">Mau tanya stok atau pesan dalam jumlah banyak? Langsung kabari kami</p>
            </div>

            <div class="card bg-white border-0 rounded-4 overflow-hidden shadow-sm">
                <div class="row g-0">
                    <div class="col-lg-5 d-flex flex-column justify-content-center gap-3 p-4 p-lg-5">
                        <div>
                            <div class="small fw-medium text-body-secondary">Alamat</div>
                            <div class="fs-6">{{ $setting->address }}</div>
                        </div>
                        <div class="border-top pt-3">
                            <div class="small fw-medium text-body-secondary">WhatsApp</div>
                            <a class="font-heading fs-4 fw-bold text-body text-decoration-none"
                               href="{{ $setting->greetingUrl() }}" target="_blank">{{ $setting->formattedNumber() }}</a>
                        </div>
                        <div class="border-top pt-3">
                            <div class="small fw-medium text-body-secondary">Jam Buka</div>
                            <div class="fs-6">{{ $setting->opening_hours }}</div>
                        </div>
                    </div>

                    {{-- Peta: di HP berbentuk 16:9, di laptop setinggi kartu --}}
                    <div class="col-lg-7 position-relative">
                        <div class="ratio ratio-16x9 d-lg-none"></div>
                        <iframe class="position-absolute top-0 start-0 w-100 h-100 border-0"
                                src="{{ $setting->map_embed_url }}" title="Peta lokasi {{ config('app.name') }}"
                                loading="lazy" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection