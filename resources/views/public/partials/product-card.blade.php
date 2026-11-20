@php
    $imageUrl = $product->imageUrl();
@endphp

<article class="group flex h-full flex-col overflow-hidden rounded-[1.75rem] border border-stone-200/80 bg-white shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-soft">
    <a href="{{ route('products.show', $product) }}" class="relative block aspect-[4/3] overflow-hidden bg-stone-100" aria-label="Lihat detail {{ $product->name }}">
        <img
            src="{{ $imageUrl }}"
            alt="Foto {{ $product->name }}"
            class="h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.04]"
            loading="lazy"
        >
        <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-stone-950/20 to-transparent"></div>
        <span class="absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-full bg-white/90 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.16em] text-brand-700 shadow-sm backdrop-blur">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            {{ $product->category->name }}
        </span>
    </a>

    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <h3 class="font-display text-[1.35rem] font-semibold leading-tight text-ink">
            <a href="{{ route('products.show', $product) }}" class="transition hover:text-brand-700">{{ $product->name }}</a>
        </h3>
        <p class="mt-2.5 text-sm leading-6 text-stone-500">{{ str($product->description)->limit(100) }}</p>

        <div class="mt-auto flex items-center justify-between gap-4 pt-5">
            <p class="font-display text-xl font-bold tracking-tight text-brand-700">{{ $product->formattedPrice() }}</p>
            <a href="{{ route('products.show', $product) }}" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-stone-200 bg-white text-ink transition duration-300 group-hover:border-ink group-hover:bg-ink group-hover:text-white" aria-label="Lihat detail {{ $product->name }}">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M7 17 17 7M8 7h9v9" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</article>
