<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'PT_apadeh adalah UMKM kuliner Nusantara yang menghadirkan makanan rumahan dengan bahan pilihan, rasa jujur, dan sentuhan modern.')">
    <meta name="theme-color" content="#211C19">
    <meta property="og:title" content="@yield('title', 'PT_apadeh — Kuliner Nusantara')">
    <meta property="og:description" content="@yield('meta_description', 'Cita rasa lokal, disajikan dengan cara yang lebih modern. Jelajahi menu pilihan PT_apadeh.')">
    <meta property="og:type" content="website">

    <title>@yield('title', 'PT_apadeh — Kuliner Nusantara')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#FFF8F0',
                            100: '#FFEBD6',
                            200: '#FFD4A8',
                            300: '#FFB472',
                            400: '#FB8B3C',
                            500: '#F26A21',
                            600: '#D9520D',
                            700: '#B33D0D',
                            800: '#8F3112',
                            900: '#742B12',
                        },
                        ink: '#211C19',
                        cream: '#FAF7F2',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['"Fraunces"', 'Georgia', 'serif'],
                    },
                    boxShadow: {
                        soft: '0 24px 70px -28px rgba(77, 44, 24, 0.28)',
                        card: '0 14px 40px -24px rgba(77, 44, 24, 0.3)',
                    },
                },
            },
        };
    </script>

    <style>
        html {
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            background-image: radial-gradient(circle at 8% 2%, rgba(251, 146, 60, 0.08), transparent 28%), radial-gradient(circle at 92% 16%, rgba(120, 113, 108, 0.06), transparent 24%);
        }

        ::selection {
            background-color: #FFD4A8;
            color: #742B12;
        }

        @keyframes float-soft {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }

        .animate-float-soft {
            animation: float-soft 6s ease-in-out infinite;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

    @stack('head')
</head>
<body class="min-h-screen bg-cream font-sans text-stone-700 antialiased">
    <a href="#main-content" class="sr-only z-[100] rounded-full bg-ink px-5 py-3 text-sm font-semibold text-white focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
        Lewati ke konten utama
    </a>

    <header class="sticky top-0 z-50 border-b border-stone-200/70 bg-cream/90 backdrop-blur-xl">
        <div class="border-b border-stone-800 bg-ink text-cream">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-2.5 text-[10px] font-semibold uppercase tracking-[0.18em] sm:px-6 lg:px-8">
                <p class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                    Dibuat segar setiap hari
                </p>
                <p class="hidden text-stone-300 sm:block">Kuliner Nusantara, rasa yang dekat</p>
            </div>
        </div>

        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-3" aria-label="PT_apadeh — Beranda">
                <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-11 w-11 rounded-[15px] object-cover shadow-card ring-1 ring-stone-900/5 transition duration-300 group-hover:-rotate-3">
                <span>
                    <span class="block font-display text-xl font-bold leading-none tracking-tight text-ink">PT_apadeh</span>
                    <span class="mt-1.5 block text-[9px] font-bold uppercase tracking-[0.25em] text-stone-500">Kuliner Nusantara</span>
                </span>
            </a>

            <nav class="hidden items-center gap-8 text-sm font-semibold text-stone-600 lg:flex" aria-label="Navigasi utama">
                <a href="{{ route('home') }}" class="transition hover:text-brand-600 {{ request()->routeIs('home') ? 'text-ink' : '' }}">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="transition hover:text-brand-600">Tentang</a>
                <a href="{{ route('home') }}#kategori" class="transition hover:text-brand-600">Kategori</a>
                <a href="{{ route('home') }}#produk" class="transition hover:text-brand-600">Menu</a>
                <a href="{{ route('admin.products.index') }}" class="transition hover:text-brand-600">Admin</a>
            </nav>

            <div class="hidden items-center gap-3 lg:flex">
                <a href="{{ route('home') }}#kontak" class="inline-flex items-center gap-2 rounded-full bg-ink px-5 py-3 text-sm font-bold text-white shadow-card transition duration-300 hover:-translate-y-0.5 hover:bg-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                    Pesan Menu
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <button id="mobile-menu-button" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-stone-300 text-ink transition hover:bg-white lg:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu navigasi">
                <svg id="mobile-menu-open-icon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                </svg>
                <svg id="mobile-menu-close-icon" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="m6 6 12 12M18 6 6 18" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden border-t border-stone-200 bg-cream px-4 py-5 lg:hidden">
            <nav class="mx-auto flex max-w-7xl flex-col gap-1 text-sm font-semibold" aria-label="Navigasi mobile">
                <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 text-ink transition hover:bg-white">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="rounded-xl px-4 py-3 text-stone-600 transition hover:bg-white">Tentang</a>
                <a href="{{ route('home') }}#kategori" class="rounded-xl px-4 py-3 text-stone-600 transition hover:bg-white">Kategori</a>
                <a href="{{ route('home') }}#produk" class="rounded-xl px-4 py-3 text-stone-600 transition hover:bg-white">Menu</a>
                <a href="{{ route('admin.products.index') }}" class="rounded-xl px-4 py-3 text-stone-600 transition hover:bg-white">Admin</a>
                <a href="{{ route('home') }}#kontak" class="mt-3 inline-flex items-center justify-center gap-2 rounded-full bg-ink px-5 py-3.5 font-bold text-white">
                    Pesan Menu
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </nav>
        </div>
    </header>

    <main id="main-content">
        @yield('content')
    </main>

    <footer class="mt-24 bg-ink text-stone-300">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1.5fr_1fr_1fr_1.2fr] lg:px-8 lg:py-20">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-12 w-12 rounded-2xl object-cover ring-1 ring-white/10">
                    <span>
                        <span class="block font-display text-2xl font-bold leading-none text-white">PT_apadeh</span>
                        <span class="mt-1.5 block text-[9px] font-bold uppercase tracking-[0.25em] text-stone-500">Kuliner Nusantara</span>
                    </span>
                </a>
                <p class="mt-6 max-w-sm text-sm leading-7 text-stone-400">
                    Menghadirkan kehangatan rasa rumahan dengan bahan pilihan dan penyajian yang modern. Rasa jujur untuk setiap momen.
                </p>
                <div class="mt-6 flex gap-3">
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram PT_apadeh" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/10 text-stone-300 transition hover:border-brand-400 hover:bg-brand-500 hover:text-white">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp PT_apadeh" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/10 text-stone-300 transition hover:border-brand-400 hover:bg-brand-500 hover:text-white">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35ZM12.04 21.49h-.01a9.43 9.43 0 0 1-4.8-1.32l-.34-.2-3.57.93.95-3.48-.22-.36a9.41 9.41 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.89.99 6.67 2.77a9.4 9.4 0 0 1 2.76 6.68c0 5.2-4.24 9.44-9.45 9.44Zm8.04-17.48A11.3 11.3 0 0 0 12.04.83C5.81.83.74 5.9.74 12.13c0 1.99.52 3.93 1.51 5.65L.66 23.47l5.82-1.52a11.28 11.28 0 0 0 5.55 1.42h.01c6.23 0 11.3-5.07 11.3-11.3 0-3.02-1.18-5.86-3.31-8Z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h2 class="text-xs font-bold uppercase tracking-[0.22em] text-white">Jelajahi</h2>
                <ul class="mt-5 space-y-3 text-sm">
                    <li><a href="{{ route('home') }}#tentang" class="transition hover:text-brand-300">Tentang kami</a></li>
                    <li><a href="{{ route('home') }}#kategori" class="transition hover:text-brand-300">Kategori menu</a></li>
                    <li><a href="{{ route('home') }}#produk" class="transition hover:text-brand-300">Semua menu</a></li>
                    <li><a href="{{ route('admin.products.index') }}" class="transition hover:text-brand-300">Kelola produk</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-bold uppercase tracking-[0.22em] text-white">Informasi</h2>
                <ul class="mt-5 space-y-3 text-sm text-stone-400">
                    <li>Senin — Sabtu</li>
                    <li>09.00 — 21.00 WIB</li>
                    <li>Pemesanan H-1</li>
                    <li>Layanan catering tersedia</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-bold uppercase tracking-[0.22em] text-white">Hubungi kami</h2>
                <ul class="mt-5 space-y-4 text-sm text-stone-400">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-brand-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z" stroke-linejoin="round"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>
                        <span>Bandung, Jawa Barat<br>Indonesia</span>
                    </li>
                    <li>
                        <a href="mailto:halo@apadeh.id" class="transition hover:text-brand-300">halo@apadeh.id</a>
                    </li>
                    <li>
                        <a href="https://wa.me/6281234567890" class="transition hover:text-brand-300">+62 812-3456-7890</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-6 text-xs text-stone-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <p>&copy; {{ date('Y') }} PT_apadeh. Seluruh hak cipta dilindungi.</p>
                <p>Dibuat dengan rasa, untuk setiap momen.</p>
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

            mobileMenu.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    mobileMenu.classList.add('hidden');
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
