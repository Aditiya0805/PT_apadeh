<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#0F172A">
    <title>@yield('title', 'Panel Admin Material — PT_apadeh')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#FFF7ED',
                            100: '#FFEDD5',
                            200: '#FED7AA',
                            300: '#FDBA74',
                            400: '#FB923C',
                            500: '#F97316',
                            600: '#EA580C',
                            700: '#C2410C',
                            800: '#9A3412',
                            900: '#7C2D12',
                        },
                        steel: {
                            50: '#F8FAFC',
                            100: '#F1F5F9',
                            200: '#E2E8F0',
                            300: '#CBD5E1',
                            400: '#94A3B8',
                            500: '#64748B',
                            600: '#475569',
                            700: '#334155',
                            800: '#1E293B',
                            900: '#0F172A',
                            950: '#020617',
                        },
                        ink: '#0F172A',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 4px 20px -2px rgba(15, 23, 42, 0.06)',
                        soft: '0 12px 30px -10px rgba(15, 23, 42, 0.1)',
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
            background-color: #FED7AA;
            color: #7C2D12;
        }
    </style>

    @stack('head')
</head>
<body class="min-h-screen bg-[#F1F5F9] font-sans text-steel-700 antialiased">
    <a href="#admin-content" class="sr-only z-[100] rounded-full bg-steel-900 px-5 py-3 text-sm font-semibold text-white focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
        Lewati ke konten utama
    </a>

    <div class="min-h-screen lg:flex">
        <!-- Sidebar -->
        <aside class="sticky top-0 hidden h-screen w-72 shrink-0 flex-col bg-steel-950 px-5 py-6 text-white lg:flex border-r border-steel-900">
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-2" aria-label="Panel admin PT_apadeh">
                <span class="inline-flex h-11 w-11 items-center justify-center overflow-hidden rounded-xl bg-white p-1 ring-1 ring-white/10 shadow-sm">
                    <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-9 w-9 object-contain">
                </span>
                <span>
                    <span class="block font-sans text-lg font-black tracking-tight text-white">PT_apadeh</span>
                    <span class="block text-[9px] font-bold uppercase tracking-[0.2em] text-brand-400">Admin Material</span>
                </span>
            </a>

            <div class="mt-9 px-2">
                <p class="text-[10px] font-bold uppercase tracking-wider text-steel-500">Menu Pengelolaan</p>
            </div>

            <nav class="mt-3 space-y-1.5" aria-label="Navigasi admin">
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-bold transition {{ request()->routeIs('admin.products.index', 'admin.products.edit') ? 'bg-brand-600 text-white shadow-md shadow-brand-950/20' : 'text-steel-400 hover:bg-steel-900 hover:text-white' }}">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                    Katalog Material
                </a>
                <a href="{{ route('admin.products.create') }}" class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-bold transition {{ request()->routeIs('admin.products.create') ? 'bg-steel-800 text-white' : 'text-steel-400 hover:bg-steel-900 hover:text-white' }}">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 8v8M8 12h8" stroke-linecap="round"/>
                    </svg>
                    Tambah Material
                </a>
                <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-bold text-steel-400 transition hover:bg-steel-900 hover:text-white">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 3h7v7M10 14 21 3M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Lihat Web Publik
                </a>
            </nav>

            <div class="mt-auto">
                <div class="rounded-xl border border-steel-800 bg-steel-900/60 p-4">
                    <div class="flex items-center gap-2">
                        <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-brand-500/20 text-brand-400">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                        <p class="text-xs font-bold text-white">Stok &amp; Harga Realtime</p>
                    </div>
                    <p class="mt-2 text-[11px] leading-relaxed text-steel-400">Pastikan harga besi, semen, dan material dasar selalu sesuai dengan harga pabrikan terkini.</p>
                </div>

                <div class="mt-5 flex items-center gap-3 border-t border-steel-900 px-2 pt-5">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-brand-600 text-xs font-black text-white">AP</span>
                    <div>
                        <p class="text-xs font-bold text-white">Admin PT_apadeh</p>
                        <p class="text-[10px] text-steel-500">Logistik &amp; Material</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-30 border-b border-steel-200/90 bg-white/95 backdrop-blur-md">
                <div class="flex h-16 items-center justify-between gap-4 px-4 sm:px-6 lg:px-10">
                    <div class="flex min-w-0 items-center gap-3">
                        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2.5 lg:hidden" aria-label="Panel admin PT_apadeh">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-white p-1 ring-1 ring-steel-200">
                                <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="Logo PT_apadeh" class="h-7 w-7 object-contain">
                            </span>
                            <span class="font-sans text-base font-extrabold text-steel-900">PT_apadeh</span>
                        </a>

                        <div class="hidden items-center gap-2 text-xs font-semibold text-steel-400 lg:flex">
                            <span class="uppercase tracking-wider">Admin</span>
                            <svg class="h-3 w-3 text-steel-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <span class="text-steel-900 font-bold">@yield('page_label', 'Katalog Material')</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-3">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-lg border border-steel-200 bg-white px-3.5 py-1.5 text-xs font-bold text-steel-700 transition hover:bg-steel-50">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 3h7v7M10 14 21 3M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Lihat Web</span>
                        </a>
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-steel-900 text-xs font-black text-white">AP</span>
                    </div>
                </div>
            </header>

            <main id="admin-content" class="mx-auto w-full max-w-7xl flex-1 px-4 py-6 sm:px-6 lg:px-10 lg:py-8">
                @if (session('success'))
                    <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800 shadow-sm" role="status">
                        <span class="mt-0.5 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-white">
                            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m5 12 4 4L19 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <p class="font-bold leading-5">{{ session('success') }}</p>
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="px-4 pb-6 text-center text-xs text-steel-400 sm:px-6 lg:px-10">
                Panel Logistik &amp; Material PT_apadeh &middot; &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
