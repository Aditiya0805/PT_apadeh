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
        $whatsAppMessage = rawurlencode('Halo PT_apadeh, saya ingin memesan '.$product->name.' ('.$product->formattedPrice().'). Apakah stoknya tersedia?');
    @endphp

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-14">
        <nav class="flex flex-wrap items-center gap-2 text-xs font-semibold text-stone-400" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="transition hover:text-brand-700">Beranda</a>
            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <a href="{{ route('home') }}#produk" class="transition hover:text-brand-700">Menu</a>
            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="max-w-[180px] truncate text-ink sm:max-w-none">{{ $product->name }}</span>
        </nav>

        <div class="mt-8 grid gap-10 lg:grid-cols-[1.02fr_0.98fr] lg:items-start lg:gap-16">
            <div class="lg:sticky lg:top-32">
                <div class="relative overflow-hidden rounded-[2.25rem] border-[6px] border-white bg-stone-100 shadow-soft">
                    <img src="{{ $product->imageUrl() }}" alt="Foto {{ $product->name }}" class="aspect-[4/3] w-full object-cover">
                    <span class="absolute left-5 top-5 inline-flex items-center gap-2 rounded-full bg-white/90 px-4 py-2 text-[10px] font-extrabold uppercase tracking-[0.16em] text-brand-700 shadow-sm backdrop-blur">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                        {{ $product->category->name }}
                    </span>
                    <span class="absolute bottom-5 right-5 rounded-full bg-ink/85 px-4 py-2 text-[10px] font-bold uppercase tracking-[0.16em] text-white backdrop-blur">PT_apadeh signature</span>
                </div>

                <div class="mt-5 grid grid-cols-3 gap-3">
                    @foreach ([
                        ['label' => 'Dibuat fresh', 'icon' => 'sparkle'],
                        ['label' => 'Bahan pilihan', 'icon' => 'leaf'],
                        ['label' => 'Dikemas rapi', 'icon' => 'box'],
                    ] as $highlight)
                        <div class="flex flex-col items-center gap-2 rounded-2xl border border-stone-200/80 bg-white px-3 py-4 text-center shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                                @if ($highlight['icon'] === 'sparkle')
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 3c.5 4.8 2.7 7 7.5 7.5-4.8.5-7 2.7-7.5 7.5-.5-4.8-2.7-7-7.5-7.5 4.8-.5 7-2.7 7.5-7.5Z" stroke-linejoin="round"/></svg>
                                @elseif ($highlight['icon'] === 'leaf')
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M20 4C12 4 5.5 8 5.5 15.5c0 2.5 1.5 4.5 4 4.5C17 20 20 12 20 4Z" stroke-linejoin="round"/><path d="M4 21c1.5-5 4.5-8 9-10.5" stroke-linecap="round"/></svg>
                                @else
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m4 8 8-4 8 4-8 4-8-4Z" stroke-linejoin="round"/><path d="M4 8v8l8 4 8-4V8M12 12v8" stroke-linejoin="round"/></svg>
                                @endif
                            </span>
                            <span class="text-[10px] font-bold leading-4 text-stone-600">{{ $highlight['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:pt-2">
                <a href="{{ route('home', ['category' => $product->category->slug]).'#produk' }}" class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-4 py-2 text-[10px] font-extrabold uppercase tracking-[0.18em] text-brand-700 transition hover:border-brand-300 hover:bg-brand-100">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 9h16M5 9l1 11h12l1-11M8 9V6a4 4 0 0 1 8 0v3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ $product->category->name }}
                </a>

                <h1 class="mt-5 font-display text-4xl font-semibold leading-[1.06] tracking-[-0.035em] text-ink sm:text-5xl xl:text-[3.5rem]">{{ $product->name }}</h1>

                <p class="mt-6 text-base leading-8 text-stone-500">{{ $product->description }}</p>

                <div class="mt-8 rounded-[1.75rem] border border-stone-200/80 bg-white p-6 shadow-card sm:p-7">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-[10px] font-extrabold uppercase tracking-[0.18em] text-stone-400">Harga per porsi</p>
                            <p class="mt-2 font-display text-3xl font-bold tracking-tight text-brand-700 sm:text-4xl">{{ $product->formattedPrice() }}</p>
                        </div>
                        <span class="inline-flex w-fit items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700 ring-1 ring-emerald-100">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Tersedia
                        </span>
                    </div>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <a href="https://wa.me/6281234567890?text={{ $whatsAppMessage }}" target="_blank" rel="noopener noreferrer" class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-ink px-6 py-4 text-sm font-bold text-white transition duration-300 hover:bg-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35ZM12.04 21.49h-.01a9.43 9.43 0 0 1-4.8-1.32l-.34-.2-3.57.93.95-3.48-.22-.36a9.41 9.41 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.89.99 6.67 2.77a9.4 9.4 0 0 1 2.76 6.68c0 5.2-4.24 9.44-9.45 9.44Zm8.04-17.48A11.3 11.3 0 0 0 12.04.83C5.81.83.74 5.9.74 12.13c0 1.99.52 3.93 1.51 5.65L.66 23.47l5.82-1.52a11.28 11.28 0 0 0 5.55 1.42h.01c6.23 0 11.3-5.07 11.3-11.3 0-3.02-1.18-5.86-3.31-8Z"/></svg>
                            Pesan via WhatsApp
                        </a>
                        <a href="{{ route('home') }}#produk" class="inline-flex items-center justify-center rounded-full border border-stone-300 bg-white px-6 py-4 text-sm font-bold text-ink transition hover:border-stone-400 hover:bg-stone-50">
                            Lihat menu lain
                        </a>
                    </div>
                    <p class="mt-4 text-center text-[11px] leading-5 text-stone-400">Pemesanan dikonfirmasi langsung oleh tim kami melalui WhatsApp.</p>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-3 sm:grid-cols-3 sm:gap-0 sm:divide-x sm:divide-stone-200 sm:rounded-2xl sm:border sm:border-stone-200/80 sm:bg-white/60">
                    <div class="rounded-2xl border border-stone-200/80 bg-white/60 p-4 sm:rounded-none sm:border-0 sm:bg-transparent">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-stone-400">Kategori</p>
                        <p class="mt-1.5 text-sm font-bold text-ink">{{ $product->category->name }}</p>
                    </div>
                    <div class="rounded-2xl border border-stone-200/80 bg-white/60 p-4 sm:rounded-none sm:border-0 sm:bg-transparent sm:pl-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-stone-400">Waktu penyajian</p>
                        <p class="mt-1.5 text-sm font-bold text-ink">15 — 30 menit</p>
                    </div>
                    <div class="rounded-2xl border border-stone-200/80 bg-white/60 p-4 sm:rounded-none sm:border-0 sm:bg-transparent sm:pl-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-stone-400">Pemesanan</p>
                        <p class="mt-1.5 text-sm font-bold text-ink">Minimal H-1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($relatedProducts->isNotEmpty())
        <section class="mt-8 border-t border-stone-200/70 bg-white/55 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.24em] text-brand-600">Masih dari kategori yang sama</p>
                        <h2 class="mt-3 font-display text-3xl font-semibold tracking-[-0.03em] text-ink sm:text-4xl">Lengkapi pilihan Anda.</h2>
                    </div>
                    <a href="{{ route('home', ['category' => $product->category->slug]).'#produk' }}" class="inline-flex items-center gap-2 self-start text-sm font-bold text-ink transition hover:text-brand-600 sm:self-auto">
                        Lihat semua {{ strtolower($product->category->name) }}
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
                <div class="mt-9 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($relatedProducts as $relatedProduct)
                        @include('public.partials.product-card', ['product' => $relatedProduct])
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
