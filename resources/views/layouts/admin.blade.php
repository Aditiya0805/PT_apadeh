<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#211C19">
    <title>@yield('title', 'Panel Admin — PT_apadeh')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">

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
                        card: '0 14px 40px -24px rgba(77, 44, 24, 0.24)',
                        soft: '0 24px 70px -30px rgba(77, 44, 24, 0.3)',
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

        ::selection {
            background-color: #FFD4A8;
            color: #742B12;
        }

    </style>

    @stack('head')
</head>
<body class="min-h-screen bg-[#F4F1EC] font-sans text-stone-700 antialiased">
    <a href="#admin-content" class="sr-only z-[100] rounded-full bg-ink px-5 py-3 text-sm font-semibold text-white focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
        Lewati ke konten utama
    </a>

    <div class="min-h-screen lg:flex">
        <aside class="sticky top-0 hidden h-screen w-72 shrink-0 flex-col bg-ink px-5 py-6 text-white lg:flex">
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-2" aria-label="Panel admin PT_apadeh">
                <span class="inline-flex h-11 w-11 items-center justify-center overflow-hidden rounded-[15px] bg-cream ring-1 ring-white/15">
                    <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-full w-full object-cover">
                </span>
                <span>
                    <span class="block font-display text-xl font-bold leading-none tracking-tight text-white">PT_apadeh</span>
                    <span class="mt-1.5 block text-[9px] font-bold uppercase tracking-[0.22em] text-stone-500">Admin Panel</span>
                </span>
            </a>

            <div class="mt-9 px-2">
                <p class="text-[9px] font-bold uppercase tracking-[0.22em] text-stone-600">Menu utama</p>
            </div>

            <nav class="mt-3 space-y-1.5" aria-label="Navigasi admin">
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.products.index', 'admin.products.edit') ? 'bg-brand-500 text-white shadow-lg shadow-brand-950/20' : 'text-stone-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7" rx="2"/>
                        <rect x="14" y="3" width="7" height="7" rx="2"/>
                        <rect x="3" y="14" width="7" height="7" rx="2"/>
                        <rect x="14" y="14" width="7" height="7" rx="2"/>
                    </svg>
                    Produk
                </a>
                <a href="{{ route('admin.products.create') }}" class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.products.create') ? 'bg-white/10 text-white' : 'text-stone-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 8v8M8 12h8" stroke-linecap="round"/>
                    </svg>
                    Tambah produk
                </a>
                <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold text-stone-400 transition hover:bg-white/5 hover:text-white">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M14 3h7v7M10 14 21 3M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Lihat situs
                </a>
            </nav>

            <div class="mt-auto">
                <div class="relative overflow-hidden rounded-2xl border border-brand-400/15 bg-gradient-to-br from-brand-500/15 to-white/[0.03] p-4">
                    <div class="pointer-events-none absolute -right-6 -top-8 h-20 w-20 rounded-full bg-brand-500/20 blur-xl"></div>
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-brand-500/15 text-brand-300">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M12 3c.5 4.8 2.7 7 7.5 7.5-4.8.5-7 2.7-7.5 7.5-.5-4.8-2.7-7-7.5-7.5 4.8-.5 7-2.7 7.5-7.5Z" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <p class="mt-3 text-xs font-bold text-white">Jaga katalog tetap segar</p>
                    <p class="mt-1.5 text-[11px] leading-5 text-stone-400">Perbarui foto dan deskripsi produk secara berkala agar pelanggan selalu mendapat informasi terbaik.</p>
                </div>

                <div class="mt-5 flex items-center gap-3 border-t border-white/10 px-2 pt-5">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-cream text-xs font-extrabold text-ink">AD</span>
                    <div>
                        <p class="text-xs font-bold text-white">Admin Apadeh</p>
                        <p class="mt-0.5 text-[10px] text-stone-500">Pengelola katalog</p>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-30 border-b border-stone-200/80 bg-[#F4F1EC]/90 backdrop-blur-xl">
                <div class="flex h-[72px] items-center justify-between gap-4 px-4 sm:px-6 lg:px-10">
                    <div class="flex min-w-0 items-center gap-3">
                        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2.5 lg:hidden" aria-label="Panel admin PT_apadeh">
                            <span class="inline-flex h-9 w-9 items-center justify-center overflow-hidden rounded-xl bg-cream ring-1 ring-stone-200">
                                <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-full w-full object-cover">
                            </span>
                            <span class="font-display text-lg font-bold tracking-tight text-ink">PT_apadeh</span>
                        </a>

                        <div class="hidden items-center gap-2 text-xs font-semibold text-stone-400 lg:flex">
                            <span class="uppercase tracking-[0.15em]">Admin</span>
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <span class="text-ink">@yield('page_label', 'Produk')</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-3">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-full border border-stone-300 bg-white px-3.5 py-2 text-xs font-bold text-ink transition hover:border-stone-400 hover:bg-stone-50 sm:px-4">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="M14 3h7v7M10 14 21 3M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="hidden sm:inline">Lihat situs</span>
                            <span class="sm:hidden">Situs</span>
                        </a>
                        <span class="hidden h-8 w-px bg-stone-200 sm:block"></span>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-ink text-[10px] font-extrabold text-white">AD</span>
                    </div>
                </div>
            </header>

            <main id="admin-content" class="mx-auto w-full max-w-7xl flex-1 px-4 py-7 sm:px-6 lg:px-10 lg:py-10">
                @if (session('success'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800 shadow-sm" role="status">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-white">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="m5 12 4 4L19 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <p class="font-semibold leading-6">{{ session('success') }}</p>
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="px-4 pb-7 text-center text-[11px] text-stone-400 sm:px-6 lg:px-10">
                Panel pengelolaan PT_apadeh &middot; {{ date('Y') }}
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
