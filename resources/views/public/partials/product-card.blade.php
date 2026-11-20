@php
    $imageUrl = $product->imageUrl();
    $waMessage = rawurlencode('Halo Concierge PT_apadeh, saya tertarik dengan koleksi jam tangan '.$product->name.' ('.$product->formattedPrice().'). Mohon info ketersediaan stok dan jadwal private viewing.');
@endphp

<article class="group relative flex h-full flex-col overflow-hidden rounded-2xl border border-white/10 bg-dark-850/90 p-4 shadow-card transition-all duration-300 hover:-translate-y-1 hover:border-accent-500/60 hover:shadow-glow">
    <!-- Image Stage -->
    <a href="{{ route('products.show', $product) }}" class="relative block aspect-[4/3] w-full overflow-hidden rounded-xl bg-dark-950 flex items-center justify-center p-3" aria-label="Lihat detail arloji {{ $product->name }}">
        <img
            src="{{ $imageUrl }}"
            alt="Foto {{ $product->name }}"
            class="max-h-full max-w-full object-contain transition-transform duration-500 ease-out group-hover:scale-110 drop-shadow-[0_15px_25px_rgba(0,0,0,0.8)]"
            loading="lazy"
        >
        <!-- Gradient overlay -->
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-dark-950/80 via-transparent to-transparent"></div>

        <!-- Badges -->
        <div class="absolute left-3 top-3 flex flex-wrap gap-1.5 z-10">
            <span class="inline-flex items-center gap-1.5 rounded-md bg-dark-900/90 px-2.5 py-1 text-[10px] font-extrabold uppercase tracking-wider text-accent-400 ring-1 ring-white/10 backdrop-blur">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-400"></span>
                {{ $product->category->name }}
            </span>
            <span class="inline-flex items-center rounded-md bg-accent-500 px-2 py-1 text-[9px] font-black tracking-wider text-dark-950">
                100% ORIGINAL
            </span>
        </div>
    </a>

    <!-- Details -->
    <div class="mt-4 flex flex-1 flex-col">
        <h3 class="font-sans text-sm font-bold leading-snug text-white transition group-hover:text-accent-400">
            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
        </h3>

        <p class="mt-2 text-xs leading-relaxed text-steel-400 line-clamp-2">{{ $product->description }}</p>

        <div class="mt-auto border-t border-white/[0.08] pt-3.5">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <span class="block text-[9px] font-extrabold uppercase tracking-widest text-steel-500">Harga Resmi</span>
                    <p class="font-display text-base font-extrabold tracking-tight text-white">{{ $product->formattedPrice() }}</p>
                </div>

                <div class="flex items-center gap-1.5">
                    <a href="https://wa.me/6281234567890?text={{ $waMessage }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent-500 text-dark-950 transition hover:bg-accent-400" title="Pesan via WhatsApp">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35ZM12.04 21.49h-.01a9.43 9.43 0 0 1-4.8-1.32l-.34-.2-3.57.93.95-3.48-.22-.36a9.41 9.41 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.89.99 6.67 2.77a9.4 9.4 0 0 1 2.76 6.68c0 5.2-4.24 9.44-9.45 9.44Zm8.04-17.48A11.3 11.3 0 0 0 12.04.83C5.81.83.74 5.9.74 12.13c0 1.99.52 3.93 1.51 5.65L.66 23.47l5.82-1.52a11.28 11.28 0 0 0 5.55 1.42h.01c6.23 0 11.3-5.07 11.3-11.3 0-3.02-1.18-5.86-3.31-8Z"/></svg>
                    </a>
                    <a href="{{ route('products.show', $product) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 bg-white/5 text-white transition hover:border-white/30 hover:bg-white/10" title="Lihat Spesifikasi Lengkap">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>
