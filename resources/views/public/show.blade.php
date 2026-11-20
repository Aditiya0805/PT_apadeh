@extends('layouts.public')

@section('title', $product->name.' — PT_apadeh')
@section('meta_description', str($product->description)->limit(155))

@push('head')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->imageUrl(),
            'category' => $product->category->name,
            'offers' => [
                '@type' => 'Offer',
                'price' => (float) $product->price,
                'priceCurrency' => 'IDR',
                'availability' => 'https://schema.org/InStock',
                'url' => route('products.show', $product),
            ],
        ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
    @php
        $whatsAppMessage = rawurlencode('Halo Concierge PT_apadeh, saya tertarik dengan koleksi jam tangan '.$product->name.' ('.$product->formattedPrice().'). Apakah unit tersedia untuk private viewing?');
    @endphp

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-14">
        <!-- Breadcrumb -->
        <nav class="flex flex-wrap items-center gap-2 text-xs font-semibold text-steel-400" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="transition hover:text-accent-400">Beranda</a>
            <svg class="h-3 w-3 text-steel-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            <a href="{{ route('home') }}#produk" class="transition hover:text-accent-400">Koleksi Jam Tangan</a>
            <svg class="h-3 w-3 text-steel-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            <a href="{{ route('home', ['category' => $product->category->slug]).'#produk' }}" class="transition hover:text-accent-400">{{ $product->category->name }}</a>
            <svg class="h-3 w-3 text-steel-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            <span class="max-w-[200px] truncate text-white sm:max-w-none">{{ $product->name }}</span>
        </nav>

        <div class="mt-8 grid gap-10 lg:grid-cols-[1fr_1fr] lg:items-start lg:gap-14">
            <!-- Left: Visual & Highlights -->
            <div class="lg:sticky lg:top-28">
                <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-dark-950 p-6 shadow-2xl">
                    <div class="relative aspect-square flex items-center justify-center">
                        <img src="{{ $product->imageUrl() }}" alt="Foto {{ $product->name }}" class="max-h-full max-w-full object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.9)]">
                    </div>

                    <span class="absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-md bg-dark-900/90 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-widest text-accent-400 border border-white/10 backdrop-blur">
                        <span class="h-1.5 w-1.5 rounded-full bg-accent-400"></span>
                        {{ $product->category->name }}
                    </span>

                    <span class="absolute bottom-4 right-4 rounded-md bg-accent-500 px-3 py-1 text-[9px] font-black uppercase tracking-wider text-dark-950 shadow-glow">
                        100% Original Certified
                    </span>
                </div>

                <div class="mt-4 grid grid-cols-3 gap-3">
                    <div class="flex flex-col items-center gap-1.5 rounded-xl border border-white/10 bg-dark-850 p-3.5 text-center">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-400">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-steel-300">100% Original &amp; Box</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5 rounded-xl border border-white/10 bg-dark-850 p-3.5 text-center">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-accent-500/10 text-accent-400">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-steel-300">Garansi Internasional</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5 rounded-xl border border-white/10 bg-dark-850 p-3.5 text-center">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-500/10 text-sky-400">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-steel-300">Private Salon Viewing</span>
                    </div>
                </div>
            </div>

            <!-- Right: Details & Order Card -->
            <div>
                <a href="{{ route('home', ['category' => $product->category->slug]).'#produk' }}" class="inline-flex items-center gap-1.5 rounded-md bg-accent-500/10 border border-accent-500/20 px-3 py-1 text-xs font-bold text-accent-400">
                    {{ $product->category->name }}
                </a>

                <h1 class="mt-3 font-display text-3xl sm:text-4xl xl:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                    {{ $product->name }}
                </h1>

                <p class="mt-5 text-xs sm:text-sm leading-relaxed text-steel-400">
                    {{ $product->description }}
                </p>

                <!-- Pricing & Action Card -->
                <div class="mt-8 rounded-2xl border border-white/10 bg-dark-850 p-6 shadow-2xl">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-steel-500">Harga Resmi Butik</span>
                            <p class="mt-1 font-display text-3xl sm:text-4xl font-black tracking-tight text-white">
                                {{ $product->formattedPrice() }}
                            </p>
                        </div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 text-xs font-bold text-emerald-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Tersedia di Boutique
                        </span>
                    </div>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="https://wa.me/6281234567890?text={{ $whatsAppMessage }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex flex-1 items-center justify-center gap-2.5 rounded-xl bg-accent-500 px-6 py-4 font-display text-xs font-black uppercase tracking-widest text-dark-950 shadow-glow transition hover:bg-accent-400"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35ZM12.04 21.49h-.01a9.43 9.43 0 0 1-4.8-1.32l-.34-.2-3.57.93.95-3.48-.22-.36a9.41 9.41 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.89.99 6.67 2.77a9.4 9.4 0 0 1 2.76 6.68c0 5.2-4.24 9.44-9.45 9.44Zm8.04-17.48A11.3 11.3 0 0 0 12.04.83C5.81.83.74 5.9.74 12.13c0 1.99.52 3.93 1.51 5.65L.66 23.47l5.82-1.52a11.28 11.28 0 0 0 5.55 1.42h.01c6.23 0 11.3-5.07 11.3-11.3 0-3.02-1.18-5.86-3.31-8Z"/></svg>
                            Konsultasi via WhatsApp Concierge
                        </a>
                        <a
                            href="tel:081234567890"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/5 px-6 py-4 font-display text-xs font-black uppercase tracking-widest text-white transition hover:bg-white/10"
                        >
                            Hubungi Salon
                        </a>
                    </div>
                </div>

                <!-- Horology Technical Specifications Table -->
                <div class="mt-10 overflow-hidden rounded-2xl border border-white/10 bg-dark-900 shadow-xl">
                    <div class="border-b border-white/10 bg-dark-850 px-6 py-4">
                        <h2 class="font-display text-xs font-black uppercase tracking-widest text-accent-400">
                            SPESIFIKASI TEKNIS HOROLOGI
                        </h2>
                    </div>

                    <dl class="divide-y divide-white/[0.08] text-xs">
                        <div class="grid grid-cols-3 px-6 py-3.5">
                            <dt class="font-bold text-steel-400">Kategori Arloji</dt>
                            <dd class="col-span-2 font-medium text-white">{{ $product->category->name }}</dd>
                        </div>
                        <div class="grid grid-cols-3 px-6 py-3.5 bg-white/[0.01]">
                            <dt class="font-bold text-steel-400">Mekanisme / Kaliber</dt>
                            <dd class="col-span-2 font-medium text-white">Otomatis Mekanikal &bull; Superlative Chronometer</dd>
                        </div>
                        <div class="grid grid-cols-3 px-6 py-3.5">
                            <dt class="font-bold text-steel-400">Material Casing</dt>
                            <dd class="col-span-2 font-medium text-white">Oystersteel 904L / Titanium Grade 5 / Keramik Cerachrom</dd>
                        </div>
                        <div class="grid grid-cols-3 px-6 py-3.5 bg-white/[0.01]">
                            <dt class="font-bold text-steel-400">Kaca Pelindung</dt>
                            <dd class="col-span-2 font-medium text-white">Sapphire Crystal Tahan Gores dengan Lapisan Anti-Reflektif</dd>
                        </div>
                        <div class="grid grid-cols-3 px-6 py-3.5">
                            <dt class="font-bold text-steel-400">Ketahanan Air</dt>
                            <dd class="col-span-2 font-medium text-white">Kedap Air hingga 50M &ndash; 300M (Screw-down Crown)</dd>
                        </div>
                        <div class="grid grid-cols-3 px-6 py-3.5 bg-white/[0.01]">
                            <dt class="font-bold text-steel-400">Kelengkapan</dt>
                            <dd class="col-span-2 font-medium text-white">Full Set: Box Mewah, Manual Book, Tag &amp; Sertifikat Garansi</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
