@extends('layouts.public')

@section('title', 'PT_apadeh — Pusat Material & Bahan Bangunan Terpercaya')
@section('meta_description', 'Distributor material bangunan dan konstruksi berstandar SNI. Semen PCC, Besi Beton Ulir, Bata Merah Press, Baja Ringan, Pipa PVC, dan Cat Waterproofing.')

@section('content')
    @php
        $heroProduct = $featuredProducts->get(0);
        $secondaryProduct = $featuredProducts->get(1);
        $tertiaryProduct = $featuredProducts->get(2);
        $fallbackImage = asset('images/products/placeholder.svg');
    @endphp

    <!-- ============================================================== -->
    <!-- SCREEN 1: HERO SHOWCASE (Yamaha Automotive Industrial Style)     -->
    <!-- ============================================================== -->
    <section class="relative min-h-[92vh] overflow-hidden border-b border-white/[0.08] bg-gradient-to-b from-dark-900 via-dark-850 to-dark-950 flex flex-col justify-between">
        <!-- Giant Outlined Atmospheric Watermark -->
        <div class="pointer-events-none absolute inset-x-0 top-1/2 -translate-y-1/2 flex items-center justify-center select-none opacity-[0.035] overflow-hidden">
            <span class="font-display text-[16rem] sm:text-[22rem] lg:text-[28rem] font-black tracking-tighter text-white">2026</span>
        </div>

        <!-- Radial Ambient Spotlight behind product -->
        <div class="pointer-events-none absolute left-1/4 top-1/2 -translate-x-1/2 -translate-y-1/2 h-[450px] w-[450px] sm:h-[600px] sm:w-[600px] rounded-full bg-accent-500/15 blur-[120px]"></div>
        <div class="pointer-events-none absolute right-1/4 top-1/3 h-80 w-80 rounded-full bg-brand-500/10 blur-[100px]"></div>

        <!-- Left Vertical Social & Quick Action Rail -->
        <div class="hidden lg:flex fixed left-5 top-1/2 -translate-y-1/2 z-40 flex-col items-center gap-5 text-steel-400">
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="transition hover:text-accent-400" aria-label="Instagram">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="transition hover:text-accent-400" aria-label="WhatsApp Proyek">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35ZM12.04 21.49h-.01a9.43 9.43 0 0 1-4.8-1.32l-.34-.2-3.57.93.95-3.48-.22-.36a9.41 9.41 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.89.99 6.67 2.77a9.4 9.4 0 0 1 2.76 6.68c0 5.2-4.24 9.44-9.45 9.44Zm8.04-17.48A11.3 11.3 0 0 0 12.04.83C5.81.83.74 5.9.74 12.13c0 1.99.52 3.93 1.51 5.65L.66 23.47l5.82-1.52a11.28 11.28 0 0 0 5.55 1.42h.01c6.23 0 11.3-5.07 11.3-11.3 0-3.02-1.18-5.86-3.31-8Z"/></svg>
            </a>
            <a href="tel:081234567890" class="transition hover:text-accent-400" aria-label="Telepon Gudang">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </a>
            <span class="h-14 w-px bg-white/20"></span>
            <span class="rotate-90 text-[10px] font-extrabold uppercase tracking-widest text-steel-500 whitespace-nowrap">PT APADEH 2026</span>
        </div>

        <!-- Main Stage Container -->
        <div class="relative mx-auto w-full max-w-7xl px-6 pt-12 pb-8 sm:px-8 lg:px-16 flex-1 flex flex-col justify-center">
            <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-8">
                <!-- Left: 3D Hero Product Visual with Carousel Arrows -->
                <div class="relative flex items-center justify-center">
                    <!-- Left Arrow Nav -->
                    <button type="button" id="hero-prev-btn" class="absolute -left-3 sm:-left-6 top-1/2 -translate-y-1/2 z-20 flex h-12 w-12 items-center justify-center rounded-full border border-white/20 bg-dark-900/80 text-white shadow-2xl backdrop-blur transition hover:border-accent-400 hover:text-accent-400" aria-label="Material Sebelumnya">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m15 18-6-6 6-6"/></svg>
                    </button>

                    <!-- 3D Floating Hero Showcase Card -->
                    <div class="relative w-full max-w-lg aspect-square flex items-center justify-center">
                        <!-- 3D Floor Shadow -->
                        <div class="absolute bottom-6 inset-x-12 h-14 rounded-full bg-black/60 blur-2xl"></div>

                        <!-- 3D Material Visual (Concrete Block / Actual Product) -->
                        <div id="hero-visual-container" class="relative z-10 w-full max-w-md transition-all duration-700 ease-out animate-float-hero">
                            <img
                                id="hero-product-img"
                                src="{{ $heroProduct?->imageUrl() ?? asset('images/3d/3d-concrete-cube.png') }}"
                                alt="{{ $heroProduct?->name ?? 'Material Bangunan' }}"
                                class="max-h-[380px] w-auto mx-auto object-contain drop-shadow-[0_25px_35px_rgba(0,0,0,0.85)] filter"
                            >
                        </div>

                        <!-- 3D Isometric Floating Cube Accent -->
                        <div class="absolute -top-4 -right-2 w-24 h-24 hidden sm:block opacity-80 pointer-events-none">
                            <img src="{{ asset('images/3d/3d-concrete-cube.png') }}" alt="3D Concrete Cube" class="w-full h-full object-contain">
                        </div>
                    </div>

                    <!-- Right Arrow Nav -->
                    <button type="button" id="hero-next-btn" class="absolute -right-3 sm:-right-6 top-1/2 -translate-y-1/2 z-20 flex h-12 w-12 items-center justify-center rounded-full border border-white/20 bg-dark-900/80 text-white shadow-2xl backdrop-blur transition hover:border-accent-400 hover:text-accent-400" aria-label="Material Selanjutnya">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg>
                    </button>
                </div>

                <!-- Right: Product Information & Call to Action -->
                <div class="relative z-10 lg:pl-6 text-left">
                    <div class="inline-flex items-center gap-2 rounded-md bg-accent-500/15 px-3 py-1 text-[11px] font-extrabold uppercase tracking-widest text-accent-400 border border-accent-500/30">
                        <span class="h-1.5 w-1.5 rounded-full bg-accent-400"></span>
                        <span id="hero-category-badge">{{ $heroProduct?->category->name ?? 'Semen & Mortar' }}</span>
                    </div>

                    <h1 id="hero-title" class="mt-4 font-display text-4xl sm:text-5xl xl:text-6xl font-black uppercase tracking-tight text-white leading-[1.05]">
                        {{ $heroProduct?->name ?? 'SEMEN PORTLAND PCC 50KG SNI' }}
                    </h1>

                    <p id="hero-desc" class="mt-4 max-w-lg text-xs sm:text-sm leading-relaxed text-steel-400">
                        {{ $heroProduct?->description ?? 'Semen Portland Composite berdaya rekat ekstra kuat, daya tekan tinggi tanpa retak rambut untuk pengecoran balok dan dinding.' }}
                    </p>

                    <!-- Pricing Info -->
                    <div class="mt-7">
                        <p class="text-[10px] font-black uppercase tracking-widest text-steel-500">BASE PRICE / HARGA RESMI</p>
                        <p id="hero-price" class="mt-1 font-display text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                            {{ $heroProduct?->formattedPrice() ?? 'Rp 68.000' }}
                        </p>
                    </div>

                    <!-- Outlined Pill CTA Button (Reference Style) -->
                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a
                            id="hero-order-link"
                            href="https://wa.me/6281234567890?text={{ rawurlencode('Halo PT_apadeh, saya ingin memesan material '.$heroProduct?->name.' ('.$heroProduct?->formattedPrice().'). Mohon info stok dan jadwal pengiriman armada proyek.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-xl border-2 border-white/70 bg-transparent px-8 py-3.5 font-display text-xs font-black uppercase tracking-widest text-white shadow-lg transition duration-200 hover:bg-white hover:text-dark-950 hover:border-white focus:outline-none"
                        >
                            ORDER MATERIAL
                        </a>
                        <a href="{{ $heroProduct ? route('products.show', $heroProduct) : '#produk' }}" id="hero-spec-link" class="inline-flex items-center justify-center rounded-xl border border-white/15 bg-white/5 px-6 py-3.5 text-xs font-bold text-steel-300 transition hover:bg-white/10 hover:text-white">
                            Lihat Spesifikasi &rarr;
                        </a>
                    </div>

                    <!-- Subtabs with Plus Signs (Reference Style) -->
                    <div class="mt-10 flex flex-wrap gap-x-6 gap-y-2 border-t border-white/[0.08] pt-6 text-[10px] sm:text-xs font-extrabold tracking-wider text-steel-400 uppercase">
                        <a href="#keunggulan" class="transition hover:text-accent-400">+ TOP FEATURES</a>
                        <a href="#inspeksi-3d" class="transition hover:text-accent-400">+ 3D INSPECTION</a>
                        <a href="#produk" class="transition hover:text-accent-400">+ SPECS &amp; SNI</a>
                        <a href="#estimasi" class="transition hover:text-accent-400">+ HITUNG RAB</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar with Prev/Next Material Titles & Dots Pagination -->
        <div class="border-t border-white/[0.08] bg-dark-950/80 backdrop-blur py-4 px-6 sm:px-12">
            <div class="mx-auto max-w-7xl flex items-center justify-between text-xs font-extrabold tracking-wider text-steel-400">
                <button type="button" id="quick-prev" class="flex items-center gap-2 transition hover:text-white">
                    <span class="text-accent-400 font-bold">&lsaquo;</span>
                    <span class="truncate max-w-[140px] sm:max-w-xs">{{ $heroProduct?->name ?? 'Semen Portland PCC' }}</span>
                </button>

                <!-- Dots Indicator -->
                <div class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-accent-400 ring-2 ring-accent-400/30"></span>
                    <span class="h-1.5 w-1.5 rounded-full bg-white/20"></span>
                    <span class="h-1.5 w-1.5 rounded-full bg-white/20"></span>
                    <span class="h-1.5 w-1.5 rounded-full bg-white/20"></span>
                    <span class="h-1.5 w-1.5 rounded-full bg-white/20"></span>
                </div>

                <button type="button" id="quick-next" class="flex items-center gap-2 transition hover:text-white">
                    <span class="truncate max-w-[140px] sm:max-w-xs">{{ $secondaryProduct?->name ?? 'Besi Beton Ulir D13' }}</span>
                    <span class="text-accent-400 font-bold">&rsaquo;</span>
                </button>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- SCREEN 2: ABOUT US / WAREHOUSE LOGISTICS FACILITY SECTION       -->
    <!-- ============================================================== -->
    <section id="tentang-kami" class="relative scroll-mt-20 border-b border-white/[0.08] bg-dark-900 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-16">
            <!-- Giant Header Brand Title -->
            <div class="border-b border-white/10 pb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-accent-400">DISTRIBUTOR &amp; LOGISTIK UTAMA</span>
                    <h2 class="mt-2 font-display text-5xl sm:text-7xl font-black uppercase tracking-tight text-white leading-none">
                        PT APADEH
                    </h2>
                </div>
                <div class="flex items-center gap-6 text-xs font-bold uppercase tracking-widest text-steel-400">
                    <a href="#gudang" class="hover:text-white">DEALER &amp; GUDANG</a>
                    <a href="#produk" class="hover:text-white">KATALOG</a>
                    <a href="#estimasi" class="hover:text-white">LAYANAN PROYEK</a>
                </div>
            </div>

            <!-- Two-Column Grid (About Us Story + Facility Card) -->
            <div class="mt-12 grid gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                <!-- Left Narrative -->
                <div>
                    <h3 class="font-display text-2xl sm:text-3xl font-extrabold uppercase tracking-tight text-white">
                        ABOUT US
                    </h3>

                    <p class="mt-6 text-xs sm:text-sm leading-relaxed text-steel-400">
                        <strong class="font-bold text-white">PT Apadeh Indonesia</strong> adalah distributor material konstruksi dan bahan bangunan terkemuka yang telah memasok kebutuhan proyek infrastruktur, gedung perkantoran, perumahan residensial, dan pemborong ritel di seluruh wilayah.
                    </p>

                    <p class="mt-4 text-xs sm:text-sm leading-relaxed text-steel-400">
                        Kami menjamin setiap sak semen, batang besi beton ulir, bata ringan hebel, baja ringan, hingga pipa sanitasi yang didistribusikan memiliki sertifikasi resmi Standar Nasional Indonesia (SNI) dan uji mutu dari pabrikan utama.
                    </p>

                    <p class="mt-4 text-xs sm:text-sm leading-relaxed text-steel-400">
                        Didukung oleh armada mandiri terdiri dari truk crane, tronton, dump truck, dan mobil pick-up, kami memastikan pasokan material selalu tiba tepat waktu langsung ke titik koordinat proyek Anda tanpa hambatan operasional.
                    </p>

                    <div class="mt-8 grid grid-cols-3 gap-4 border-t border-white/10 pt-6">
                        <div>
                            <span class="font-display text-2xl sm:text-3xl font-black text-accent-400">100%</span>
                            <span class="block text-[10px] uppercase tracking-wider text-steel-400 mt-1">Standar SNI Resmi</span>
                        </div>
                        <div>
                            <span class="font-display text-2xl sm:text-3xl font-black text-white">24/7</span>
                            <span class="block text-[10px] uppercase tracking-wider text-steel-400 mt-1">Dispatch Armada</span>
                        </div>
                        <div>
                            <span class="font-display text-2xl sm:text-3xl font-black text-white">500+</span>
                            <span class="block text-[10px] uppercase tracking-wider text-steel-400 mt-1">Proyek Terpasok</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Facility Photo Card (Reference Style) -->
                <div id="gudang" class="relative overflow-hidden rounded-2xl border border-white/10 bg-dark-950 shadow-2xl">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img
                            src="{{ asset('images/3d/3d-warehouse.jpg') }}"
                            alt="Fasilitas Pergudangan Logistik PT APADEH"
                            class="h-full w-full object-cover transition-transform duration-700 hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-dark-950/40 to-transparent"></div>
                    </div>

                    <div class="p-6">
                        <p class="font-display text-xs font-black uppercase tracking-widest text-accent-400">
                            MANUFAKTUR &amp; PERGUDANGAN MATERIAL INDONESIA
                        </p>
                        <p class="mt-2 text-sm font-black text-white">
                            HOTLINE LOGISTIK: (021) 2457-5555 / 0812-3456-7890
                        </p>
                        <p class="mt-1 text-xs text-steel-400 leading-relaxed">
                            KAWASAN INDUSTRI LOGISTIK MATERIAL, JL. RAYA KONSTRUKSI TERPADU NO. 88, JAWA BARAT — INDONESIA
                        </p>
                        <div class="mt-4 flex items-center justify-between border-t border-white/[0.08] pt-4">
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-emerald-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                Hub Siap Beroperasi &bull; Stok Tersedia
                            </span>
                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="text-xs font-bold text-accent-400 hover:underline">
                                Hubungi Gudang &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- SCREEN 3: 3D INTERACTIVE DETAIL INSPECTION CAROUSEL             -->
    <!-- ============================================================== -->
    <section id="inspeksi-3d" class="relative scroll-mt-20 border-b border-white/[0.08] bg-gradient-to-b from-dark-950 via-dark-900 to-dark-950 py-24 text-center overflow-hidden">
        <!-- Ambient Glow -->
        <div class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-96 w-[700px] rounded-full bg-accent-500/10 blur-[130px]"></div>

        <div class="relative mx-auto max-w-7xl px-6 sm:px-8 lg:px-16">
            <span class="text-xs font-black uppercase tracking-[0.3em] text-accent-400">3D QUALITY INSPECTION</span>
            <h2 class="mt-3 font-display text-3xl sm:text-5xl font-black uppercase tracking-tight text-white">
                Inspeksi Standar Mutu Material
            </h2>
            <p class="mt-3 max-w-xl mx-auto text-xs sm:text-sm text-steel-400">
                Setiap material melewati uji laboratorium kekuatan tekan beton, uji lentur baja, dan ketahanan penetrasi air.
            </p>

            <!-- 3D Perspective Layered Carousel Stage (Screen 3 Reference Style) -->
            <div class="relative mt-12 mx-auto max-w-4xl perspective-1000">
                <div class="flex items-center justify-center gap-4 sm:gap-6 preserve-3d py-8">
                    <!-- Left Layer Card -->
                    <div class="tilt-card-left relative w-48 sm:w-64 rounded-2xl overflow-hidden border border-white/10 bg-dark-950 shadow-2xl cursor-pointer">
                        <img src="{{ asset('images/3d/3d-inspection-1.jpg') }}" alt="Inspeksi Tekan Semen" class="aspect-[4/3] w-full object-cover">
                        <div class="p-3 bg-dark-950 text-left">
                            <span class="text-[9px] font-black uppercase tracking-wider text-accent-400">UJI KUAT TEKAN</span>
                            <p class="text-[11px] font-bold text-white mt-0.5">Matrix Crystalline PCC</p>
                        </div>
                    </div>

                    <!-- Center Active 3D Card -->
                    <div class="tilt-card-center relative z-20 w-64 sm:w-80 rounded-2xl overflow-hidden border-2 border-accent-400/80 bg-dark-950 shadow-glow cursor-pointer">
                        <img src="{{ asset('images/3d/3d-inspection-2.jpg') }}" alt="Inspeksi Baja Tulang D13" class="aspect-[4/3] w-full object-cover">
                        <div class="p-4 bg-dark-950 text-left">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-black uppercase tracking-widest text-brand-400">DAYA TARIK BJTS 420B</span>
                                <span class="rounded bg-accent-500/20 px-2 py-0.5 text-[9px] font-extrabold text-accent-400">SNI FULL</span>
                            </div>
                            <p class="text-sm font-extrabold text-white mt-1">Besi Beton Ulir D13 SNI</p>
                            <p class="text-[10px] text-steel-400 mt-1">Kuat leleh minimum 420 MPa tanpa retak bengkok 180°.</p>
                        </div>
                    </div>

                    <!-- Right Layer Card -->
                    <div class="tilt-card-right relative w-48 sm:w-64 rounded-2xl overflow-hidden border border-white/10 bg-dark-950 shadow-2xl cursor-pointer">
                        <img src="{{ asset('images/3d/3d-inspection-3.jpg') }}" alt="Inspeksi Waterproofing" class="aspect-[4/3] w-full object-cover">
                        <div class="p-3 bg-dark-950 text-left">
                            <span class="text-[9px] font-black uppercase tracking-wider text-sky-400">UJI ELASTOMERIK</span>
                            <p class="text-[11px] font-bold text-white mt-0.5">Kedap Air 400% Elastis</p>
                        </div>
                    </div>
                </div>

                <!-- Footnote in Reference Style -->
                <p class="mt-4 text-[11px] text-steel-500 italic">*Tersedia pada Batch Terverifikasi Standar Laboratorium Uji Bahan Konstruksi</p>

                <!-- Tap to View More Button -->
                <div class="mt-6">
                    <a href="#produk" class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/5 px-6 py-2.5 font-display text-xs font-black uppercase tracking-widest text-white shadow-md transition hover:border-accent-400 hover:text-accent-400">
                        TAP TO VIEW MORE
                    </a>
                </div>

                <!-- Sub-tabs below carousel -->
                <div class="mt-8 flex flex-wrap justify-center gap-x-8 gap-y-2 text-xs font-black tracking-widest text-steel-400 uppercase">
                    <span class="text-white">+ TOP FEATURES</span>
                    <a href="#produk" class="hover:text-white">+ GALLERY</a>
                    <a href="#estimasi" class="hover:text-white">+ SPECS</a>
                    <a href="#kontak" class="hover:text-white">+ ACCESSORIES</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- SCREEN 4: FULL MATERIAL CATALOG (Integrated with Database)     -->
    <!-- ============================================================== -->
    <section id="produk" class="scroll-mt-20 border-b border-white/[0.08] bg-dark-900 py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-16">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between border-b border-white/10 pb-6">
                <div>
                    <span class="text-xs font-black uppercase tracking-widest text-accent-400">KATALOG LENGKAP</span>
                    <h2 class="mt-2 font-display text-3xl sm:text-5xl font-black uppercase tracking-tight text-white">
                        {{ $selectedCategory ? 'Katalog '.$selectedCategory->name : 'Katalog Material Pilihan' }}
                    </h2>
                    <p class="mt-2 text-xs sm:text-sm text-steel-400 max-w-2xl">
                        {{ $selectedCategory ? 'Daftar pilihan material '.$selectedCategory->name.' berstandar SNI siap pasok ke proyek Anda.' : 'Pilihan bahan bangunan resmi berkualitas nomor satu bergaransi pabrik. Siap kirim skala eceran maupun armada proyek grosir.' }}
                    </p>
                </div>
                <div class="text-xs font-extrabold uppercase tracking-wider text-steel-400">
                    Total: <span class="text-white">{{ $products->total() }}</span> Material Siap Pasok
                </div>
            </div>

            <!-- Filter Pills -->
            <div class="mt-8 flex flex-wrap items-center gap-2">
                <a href="{{ route('home') }}#produk" class="rounded-lg border px-4 py-2 text-xs font-extrabold uppercase tracking-wider transition {{ $selectedCategory === null ? 'border-accent-400 bg-accent-500 text-dark-950 shadow-glow' : 'border-white/10 bg-white/5 text-steel-400 hover:border-white/20 hover:text-white' }}">
                    Semua Material
                </a>
                @foreach ($categories as $category)
                    <a
                        href="{{ route('home', ['category' => $category->slug]).'#produk' }}"
                        class="rounded-lg border px-4 py-2 text-xs font-extrabold uppercase tracking-wider transition {{ $selectedCategory?->is($category) ? 'border-accent-400 bg-accent-500 text-dark-950 shadow-glow' : 'border-white/10 bg-white/5 text-steel-400 hover:border-white/20 hover:text-white' }}"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
                @if ($selectedCategory)
                    <a href="{{ route('home') }}#produk" class="ml-2 inline-flex items-center gap-1.5 text-xs font-bold text-brand-400 hover:underline">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 6 12 12M18 6 6 18" stroke-linecap="round"/></svg>
                        Reset Filter
                    </a>
                @endif
            </div>

            <!-- Catalog Cards Grid -->
            @if ($products->isEmpty())
                <div class="mt-12 rounded-2xl border border-dashed border-white/10 bg-dark-950 p-16 text-center">
                    <p class="font-display text-lg font-bold text-white uppercase">Material Tidak Ditemukan</p>
                    <p class="mt-1 text-xs text-steel-400">Belum ada item untuk filter ini. Tambahkan data melalui panel admin.</p>
                </div>
            @else
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        @include('public.partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                @if ($products->hasPages())
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- SCREEN 5: HITUNG ESTIMASI RAB PROYEK BANNER                    -->
    <!-- ============================================================== -->
    <section id="estimasi" class="scroll-mt-20 border-b border-white/[0.08] bg-dark-950 py-20 text-white">
        <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-16">
            <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-r from-dark-900 via-dark-850 to-dark-900 p-8 sm:p-14 shadow-2xl">
                <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-accent-500/15 blur-3xl"></div>

                <div class="grid items-center gap-10 lg:grid-cols-[1.2fr_0.8fr]">
                    <div>
                        <span class="text-xs font-black uppercase tracking-[0.25em] text-accent-400">ESTIMASI KEBUTUHAN PROYEK</span>
                        <h2 class="mt-3 font-display text-3xl sm:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                            Hitung RAB &amp; Kebutuhan Material Anda Sekarang
                        </h2>
                        <p class="mt-4 text-xs sm:text-sm text-steel-400 leading-relaxed max-w-xl">
                            Konsultasikan luas bangunan, ketebalan dinding, dan bentang atap Anda. Tim teknik PT_apadeh akan menghitung volume sak semen, bata merah, dan lonjor besi beton yang tepat agar anggaran proyek Anda hemat dan efisien.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-4 text-xs font-bold text-steel-300">
                            <span class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-accent-400"></span>
                                Hitung Volume Semen &amp; Pasir
                            </span>
                            <span class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-accent-400"></span>
                                Kebutuhan Bata Merah / Hebel
                            </span>
                            <span class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-accent-400"></span>
                                Rangka Baja Ringan C75
                            </span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-dark-950/80 p-6 backdrop-blur text-left">
                        <p class="font-display text-xs font-black uppercase tracking-widest text-white">SURAT PENAWARAN HARGA (RAB)</p>
                        <p class="mt-1 text-xs text-steel-400">Dapatkan penawaran harga kontraktor khusus untuk pesanan proyek partai besar.</p>
                        
                        <a
                            href="https://wa.me/6281234567890?text={{ rawurlencode('Halo Konsultan Proyek PT_apadeh, saya ingin menghitung estimasi kebutuhan material (RAB) untuk proyek konstruksi saya.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-6 flex items-center justify-between gap-4 rounded-xl bg-accent-500 px-5 py-4 font-display text-xs font-black uppercase tracking-widest text-dark-950 shadow-glow transition hover:bg-accent-400"
                        >
                            <span>KONSULTASI VIA WHATSAPP</span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>
                        <p class="mt-3 text-[10px] text-steel-500 text-center">Tersedia layanan survei lokasi dan pengantaran sampel bahan material.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Interactive Hero Switcher Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const products = [
                @foreach ($products->take(6) as $p)
                {
                    id: {{ $p->id }},
                    name: @json($p->name),
                    category: @json($p->category->name),
                    price: @json($p->formattedPrice()),
                    desc: @json($p->description),
                    image: @json($p->imageUrl()),
                    url: @json(route('products.show', $p)),
                    waText: @json('Halo PT_apadeh, saya ingin memesan material '.$p->name.' ('.$p->formattedPrice().'). Mohon info ketersediaan stok.')
                },
                @endforeach
            ];

            let currentIndex = 0;
            const heroImg = document.getElementById('hero-product-img');
            const heroTitle = document.getElementById('hero-title');
            const heroCategory = document.getElementById('hero-category-badge');
            const heroDesc = document.getElementById('hero-desc');
            const heroPrice = document.getElementById('hero-price');
            const heroOrderLink = document.getElementById('hero-order-link');
            const heroSpecLink = document.getElementById('hero-spec-link');
            const quickPrev = document.getElementById('quick-prev');
            const quickNext = document.getElementById('quick-next');

            function updateHero(index) {
                if (!products.length) return;
                const p = products[index];
                
                if (heroImg) {
                    heroImg.style.opacity = '0';
                    heroImg.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        heroImg.src = p.image;
                        heroImg.alt = p.name;
                        heroImg.style.opacity = '1';
                        heroImg.style.transform = 'scale(1)';
                    }, 200);
                }

                if (heroTitle) heroTitle.textContent = p.name;
                if (heroCategory) heroCategory.textContent = p.category;
                if (heroDesc) heroDesc.textContent = p.desc;
                if (heroPrice) heroPrice.textContent = p.price;
                if (heroOrderLink) heroOrderLink.href = 'https://wa.me/6281234567890?text=' + encodeURIComponent(p.waText);
                if (heroSpecLink) heroSpecLink.href = p.url;

                // Update bottom quick buttons
                const prevP = products[(index - 1 + products.length) % products.length];
                const nextP = products[(index + 1) % products.length];
                if (quickPrev) quickPrev.querySelector('span:last-child').textContent = prevP.name;
                if (quickNext) quickNext.querySelector('span:first-child').textContent = nextP.name;
            }

            document.getElementById('hero-prev-btn')?.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + products.length) % products.length;
                updateHero(currentIndex);
            });

            document.getElementById('hero-next-btn')?.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % products.length;
                updateHero(currentIndex);
            });

            quickPrev?.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + products.length) % products.length;
                updateHero(currentIndex);
            });

            quickNext?.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % products.length;
                updateHero(currentIndex);
            });
        });
    </script>
@endsection
