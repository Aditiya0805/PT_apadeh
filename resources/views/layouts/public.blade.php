<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'PT_apadeh adalah distributor & penyedia material bangunan terlengkap berstandar SNI. Menyediakan semen, besi beton SNI, bata ringan, baja ringan, cat pelapis, dan keramik granit.')">
    <meta name="theme-color" content="#071113">
    <meta property="og:title" content="@yield('title', 'PT_apadeh — Pusat Material & Bahan Bangunan Terpercaya')">
    <meta property="og:description" content="@yield('meta_description', 'Distributor material bangunan dan konstruksi terpercaya berstandar SNI. Pengiriman langsung ke proyek Anda.')">
    <meta property="og:type" content="website">

    <title>@yield('title', 'PT_apadeh — Pusat Material & Bahan Bangunan')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&amp;family=Space+Grotesk:wght@500;700;800&amp;display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: {
                            950: '#040B0C',
                            900: '#071113',
                            850: '#0A171A',
                            800: '#0E1E22',
                            750: '#13282D',
                            700: '#1B343A',
                        },
                        accent: {
                            400: '#2DD4BF',
                            500: '#14B8A6',
                            600: '#0D9488',
                        },
                        brand: {
                            50: '#FFF7ED',
                            100: '#FFEDD5',
                            400: '#FB923C',
                            500: '#F97316',
                            600: '#EA580C',
                            700: '#C2410C',
                        },
                        steel: {
                            100: '#F1F5F9',
                            200: '#E2E8F0',
                            300: '#CBD5E1',
                            400: '#94A3B8',
                            500: '#64748B',
                            600: '#475569',
                            700: '#334155',
                            800: '#1E293B',
                            900: '#0F172A',
                        },
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['"Space Grotesk"', '"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        glow: '0 0 35px -5px rgba(20, 184, 166, 0.25)',
                        'glow-orange': '0 0 35px -5px rgba(249, 115, 22, 0.3)',
                        card: '0 15px 35px -10px rgba(0, 0, 0, 0.5)',
                        '3d': '0 25px 50px -12px rgba(4, 11, 12, 0.7)',
                    },
                },
            },
        };
    </script>

    <style>
        html {
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            background-color: #071113;
        }

        body {
            background-color: #071113;
            color: #E2E8F0;
        }

        ::selection {
            background-color: #14B8A6;
            color: #040B0C;
        }

        /* 3D Perspective Card Tilt */
        .perspective-1000 {
            perspective: 1000px;
        }

        .preserve-3d {
            transform-style: preserve-3d;
        }

        .tilt-card-left {
            transform: rotateY(18deg) scale(0.9) translateZ(-40px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tilt-card-right {
            transform: rotateY(-18deg) scale(0.9) translateZ(-40px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tilt-card-center {
            transform: translateZ(40px) scale(1.05);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tilt-card-left:hover, .tilt-card-right:hover {
            transform: rotateY(0deg) scale(1) translateZ(10px);
            z-index: 30;
        }

        @keyframes float-hero {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(1deg); }
        }

        .animate-float-hero {
            animation: float-hero 5s ease-in-out infinite;
        }
    </style>

    @stack('head')
</head>
<body class="min-h-screen bg-dark-900 font-sans text-steel-200 antialiased selection:bg-accent-500 selection:text-dark-950">
    <a href="#main-content" class="sr-only z-[100] rounded-full bg-accent-500 px-5 py-3 text-sm font-semibold text-dark-950 focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
        Lewati ke konten utama
    </a>

    <!-- Top Navigation Bar (Yamaha/Luxury Automotive Industrial Concept) -->
    <header class="sticky top-0 z-50 border-b border-white/[0.08] bg-dark-900/90 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-4 sm:px-6 lg:px-8">
            <!-- Brand Logo & Name -->
            <div class="flex items-center gap-4">
                <button id="mobile-menu-button" type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-white/10 text-white transition hover:bg-white/10 lg:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu navigasi">
                    <svg id="mobile-menu-open-icon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                    </svg>
                    <svg id="mobile-menu-close-icon" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m6 6 12 12M18 6 6 18" stroke-linecap="round"/>
                    </svg>
                </button>

                <a href="{{ route('home') }}" class="group flex items-center gap-3" aria-label="PT_apadeh — Pusat Material Bangunan">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white p-1 shadow-glow ring-1 ring-white/20 transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-8 w-8 object-contain">
                    </div>
                    <div>
                        <span class="block font-display text-xl font-extrabold tracking-wider text-white">PT_apadeh</span>
                        <span class="block text-[9px] font-bold uppercase tracking-[0.22em] text-accent-400">Pusat Material &amp; Bangunan</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Nav Menu -->
            <nav class="hidden items-center gap-8 text-xs font-extrabold uppercase tracking-widest text-steel-400 lg:flex" aria-label="Navigasi utama">
                <a href="{{ route('home') }}#gudang" class="transition hover:text-white">Lokasi Gudang</a>
                <a href="{{ route('home') }}#produk" class="border-b-2 border-accent-400 pb-1 text-white transition hover:text-accent-400">Katalog Material</a>
                <a href="{{ route('home') }}#inspeksi-3d" class="transition hover:text-white">Inspeksi 3D</a>
                <a href="{{ route('home') }}#tentang-kami" class="transition hover:text-white">Tentang Kami</a>
                <a href="{{ route('home') }}#estimasi" class="transition hover:text-white">Hitung RAB</a>
                <div class="flex items-center gap-2 border-l border-white/10 pl-6 text-steel-400">
                    <span class="font-bold text-accent-400">ID</span>
                    <span class="text-steel-600">/</span>
                    <span class="hover:text-white cursor-pointer">EN</span>
                </div>
            </nav>

            <!-- Right CTA Button -->
            <div class="hidden items-center gap-3 sm:flex">
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 rounded-lg border border-white/15 bg-white/5 px-3.5 py-2 text-xs font-bold text-white transition hover:border-accent-400 hover:bg-accent-500/10 hover:text-accent-400">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Admin Panel
                </a>
                <a href="https://wa.me/6281234567890?text={{ rawurlencode('Halo PT_apadeh, saya ingin konsultasi kebutuhan material bangunan dan minta penawaran harga resmi.') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-lg bg-accent-500 px-4 py-2 text-xs font-extrabold uppercase tracking-wider text-dark-950 shadow-glow transition duration-200 hover:bg-accent-400">
                    Minta Penawaran
                </a>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden border-t border-white/10 bg-dark-950/95 px-4 py-5 shadow-2xl backdrop-blur-2xl lg:hidden">
            <nav class="flex flex-col gap-2 text-xs font-extrabold uppercase tracking-widest text-steel-300" aria-label="Navigasi mobile">
                <a href="{{ route('home') }}#gudang" class="rounded-lg px-3 py-2.5 transition hover:bg-white/5 hover:text-white">Lokasi Gudang</a>
                <a href="{{ route('home') }}#produk" class="rounded-lg px-3 py-2.5 text-accent-400 transition hover:bg-white/5">Katalog Material</a>
                <a href="{{ route('home') }}#inspeksi-3d" class="rounded-lg px-3 py-2.5 transition hover:bg-white/5 hover:text-white">Inspeksi 3D</a>
                <a href="{{ route('home') }}#tentang-kami" class="rounded-lg px-3 py-2.5 transition hover:bg-white/5 hover:text-white">Tentang Kami</a>
                <a href="{{ route('home') }}#estimasi" class="rounded-lg px-3 py-2.5 transition hover:bg-white/5 hover:text-white">Hitung RAB</a>
                <a href="{{ route('admin.products.index') }}" class="rounded-lg px-3 py-2.5 transition hover:bg-white/5 hover:text-white">Admin Panel</a>
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="mt-2 inline-flex items-center justify-center gap-2 rounded-lg bg-accent-500 px-4 py-3 font-extrabold text-dark-950 shadow-glow">
                    Minta Penawaran via WhatsApp
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content" class="relative">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-dark-950 py-16 text-steel-400">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[1.5fr_1fr_1fr_1.2fr]">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white p-1 ring-1 ring-white/20 shadow-glow">
                            <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-8 w-8 object-contain">
                        </div>
                        <div>
                            <span class="block font-display text-2xl font-extrabold tracking-wider text-white">PT_apadeh</span>
                            <span class="block text-[9px] font-bold uppercase tracking-[0.22em] text-accent-400">Material &amp; Konstruksi</span>
                        </div>
                    </div>
                    <p class="mt-5 max-w-sm text-xs leading-relaxed text-steel-400">
                        Distributor resmi semen, besi beton SNI, bata merah press, baja ringan, pipa PVC, dan cat pelapis anti bocor. Memasok kebutuhan proyek infrastruktur, gedung, ruko, dan residensial di seluruh Indonesia.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-xs font-bold text-accent-400">
                        <span class="h-2 w-2 rounded-full bg-accent-400 animate-ping"></span>
                        Armada Logistik Standar SNI Siap Kirim
                    </div>
                </div>

                <div>
                    <h3 class="text-xs font-extrabold uppercase tracking-widest text-white">Kategori Material</h3>
                    <ul class="mt-4 space-y-2.5 text-xs text-steel-400">
                        <li><a href="{{ route('home', ['category' => 'semen-mortar']).'#produk' }}" class="transition hover:text-white">Semen &amp; Mortar Instan</a></li>
                        <li><a href="{{ route('home', ['category' => 'besi-baja-ringan']).'#produk' }}" class="transition hover:text-white">Besi Beton &amp; Baja Ringan</a></li>
                        <li><a href="{{ route('home', ['category' => 'bata-material-dasar']).'#produk' }}" class="transition hover:text-white">Bata Merah &amp; Hebel</a></li>
                        <li><a href="{{ route('home', ['category' => 'cat-pelapis']).'#produk' }}" class="transition hover:text-white">Cat &amp; Waterproofing AM</a></li>
                        <li><a href="{{ route('home', ['category' => 'keramik-granit']).'#produk' }}" class="transition hover:text-white">Granit Tile 60x60</a></li>
                        <li><a href="{{ route('home', ['category' => 'atap-pipa']).'#produk' }}" class="transition hover:text-white">Pipa PVC &amp; Atap Spandek</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-extrabold uppercase tracking-widest text-white">Logistik &amp; Gudang</h3>
                    <ul class="mt-4 space-y-2.5 text-xs text-steel-400">
                        <li>Senin — Sabtu (08.00 — 17.00 WIB)</li>
                        <li>Dispatch Truk Crane &amp; Tronton</li>
                        <li>Layanan Muat Cepat Forklift</li>
                        <li>Konsultasi Hitung RAB Gratis</li>
                        <li class="pt-2"><a href="{{ route('admin.products.index') }}" class="font-bold text-accent-400 hover:underline">Panel Inventori Admin &rarr;</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-extrabold uppercase tracking-widest text-white">Kontak Proyek</h3>
                    <p class="mt-4 text-xs text-steel-400">Kawasan Pergudangan Logistik Material, Jawa Barat — Indonesia</p>
                    <p class="mt-2 text-xs font-bold text-white">Hotline: +62 812-3456-7890</p>
                    <p class="text-xs text-steel-400">Email: proyek@ptapadeh.com</p>
                </div>
            </div>

            <div class="mt-12 flex flex-col justify-between border-t border-white/[0.08] pt-8 text-[11px] text-steel-500 sm:flex-row sm:items-center">
                <p>&copy; {{ date('Y') }} PT_apadeh. Seluruh hak cipta dilindungi. Distributor Material Konstruksi Resmi.</p>
                <p class="mt-2 sm:mt-0 font-display text-steel-400 tracking-wider uppercase">Pondasi Kuat &bull; Proyek Tepat &bull; Mutu Terhebat</p>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('mobile-menu-open-icon');
        const closeIcon = document.getElementById('mobile-menu-close-icon');

        if (mobileMenuButton && mobileMenu && openIcon && closeIcon) {
            mobileMenuButton.addEventListener('click', () => {
                const isOpen = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', String(!isOpen));
                mobileMenu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
