@extends('layouts.public')

@section('title', 'PT_apadeh — Cita Rasa Nusantara, Disajikan Modern')
@section('meta_description', 'Kenali PT_apadeh, UMKM kuliner Nusantara yang menghadirkan makanan rumahan dengan bahan pilihan. Jelajahi kategori dan katalog menu favorit kami.')

@section('content')
    @php
        $heroProduct = $featuredProducts->get(0);
        $secondaryProduct = $featuredProducts->get(1);
        $aboutProduct = $featuredProducts->get(2) ?? $heroProduct;
        $fallbackImage = asset('images/products/placeholder.svg');
        $categoryDescriptions = [
            'makanan-berat' => 'Hangat, mengenyangkan, dan penuh rempah pilihan.',
            'camilan' => 'Teman santai dengan rasa gurih dan manis yang pas.',
            'minuman' => 'Segar dan seimbang untuk melengkapi setiap sajian.',
        ];
    @endphp

    <section class="relative overflow-hidden">
        <div class="pointer-events-none absolute -left-28 top-32 h-80 w-80 rounded-full bg-brand-200/35 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-20 top-8 h-[28rem] w-[28rem] rounded-full bg-brand-100/50 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 pb-16 pt-12 sm:px-6 lg:px-8 lg:pb-28 lg:pt-20">
            <div class="grid items-center gap-16 lg:grid-cols-[1.02fr_0.98fr] lg:gap-14">
                <div class="max-w-2xl">
                    <p class="inline-flex items-center gap-2.5 rounded-full border border-brand-200/80 bg-white/80 px-4 py-2 text-[10px] font-extrabold uppercase tracking-[0.18em] text-brand-800 shadow-sm backdrop-blur">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-60"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                        </span>
                        UMKM Kuliner Nusantara
                    </p>

                    <h1 class="mt-6 font-display text-[2.9rem] font-semibold leading-[1.02] tracking-[-0.04em] text-ink sm:text-6xl xl:text-[4.7rem]">
                        Rasa yang <span class="relative whitespace-nowrap italic text-brand-600">dekat,<svg class="absolute -bottom-2 left-0 h-3 w-full text-brand-300" viewBox="0 0 240 12" fill="none" preserveAspectRatio="none" aria-hidden="true"><path d="M2 9C48 3 94 3 141 6c33 2 63 2 97-2" stroke="currentColor" stroke-width="4" stroke-linecap="round"/></svg></span><br>
                        kualitas yang berkelas.
                    </h1>

                    <p class="mt-7 max-w-xl text-base leading-8 text-stone-500 sm:text-lg">
                        Di <strong class="font-bold text-ink">PT_apadeh</strong>, kami mengolah bahan-bahan lokal menjadi hidangan yang akrab di hati. Rasa rumahan yang jujur, dikemas dengan sentuhan modern untuk menemani setiap momen Anda.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="#produk" class="inline-flex items-center justify-center gap-2 rounded-full bg-ink px-7 py-4 text-sm font-bold text-white shadow-card transition duration-300 hover:-translate-y-0.5 hover:bg-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                            Jelajahi Menu
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="#tentang" class="inline-flex items-center justify-center gap-2 rounded-full border border-stone-300 bg-white/60 px-7 py-4 text-sm font-bold text-ink transition duration-300 hover:border-stone-400 hover:bg-white">
                            Kenali Kami
                        </a>
                    </div>

                    <div class="mt-10 flex items-center gap-5 text-xs font-semibold text-stone-500 sm:gap-8">
                        <div>
                            <span class="block font-display text-2xl font-bold text-ink">{{ $totalProducts }}</span>
                            <span class="mt-0.5 block">Menu pilihan</span>
                        </div>
                        <span class="h-10 w-px bg-stone-200"></span>
                        <div>
                            <span class="block font-display text-2xl font-bold text-ink">{{ $totalCategories }}</span>
                            <span class="mt-0.5 block">Kategori</span>
                        </div>
                        <span class="h-10 w-px bg-stone-200"></span>
                        <div>
                            <span class="block font-display text-2xl font-bold text-ink">100%</span>
                            <span class="mt-0.5 block">Bahan pilihan</span>
                        </div>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-xl pb-10 lg:mx-0">
                    <div class="absolute -inset-4 -rotate-3 rounded-[3rem] bg-brand-100/80"></div>
                    <div class="relative rotate-1 overflow-hidden rounded-[2.5rem] border-[6px] border-white bg-stone-100 shadow-soft transition duration-500 hover:rotate-0">
                        <img
                            src="{{ $heroProduct?->imageUrl() ?? $fallbackImage }}"
                            alt="{{ $heroProduct ? 'Foto '.$heroProduct->name : 'Ilustrasi menu PT_apadeh' }}"
                            class="aspect-[4/3] w-full object-cover"
                        >
                        @if ($heroProduct)
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-stone-950/80 via-stone-950/20 to-transparent px-6 pb-6 pt-20">
                                <p class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-brand-200">Menu favorit</p>
                                <div class="mt-1.5 flex items-end justify-between gap-4">
                                    <h2 class="font-display text-2xl font-semibold leading-tight text-white">{{ $heroProduct->name }}</h2>
                                    <span class="shrink-0 rounded-full bg-white/15 px-3 py-1.5 text-xs font-bold text-white backdrop-blur">{{ $heroProduct->formattedPrice() }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($secondaryProduct)
                        <div class="absolute -bottom-1 -left-2 hidden w-48 rotate-[-5deg] overflow-hidden rounded-[1.5rem] border-4 border-white bg-stone-100 shadow-soft sm:block lg:-left-8">
                            <img src="{{ $secondaryProduct->imageUrl() }}" alt="Foto {{ $secondaryProduct->name }}" class="aspect-square w-full object-cover">
                            <div class="bg-white px-4 py-3">
                                <p class="text-[9px] font-extrabold uppercase tracking-[0.16em] text-brand-600">{{ $secondaryProduct->category->name }}</p>
                                <p class="mt-1 truncate text-xs font-bold text-ink">{{ $secondaryProduct->name }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="absolute -right-3 top-8 animate-float-soft rounded-2xl border border-white bg-white/95 px-4 py-3 shadow-card backdrop-blur sm:-right-6">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="M12 3c-3.5 3.4-5.5 6.3-5.5 9.3A5.5 5.5 0 0 0 12 18a5.5 5.5 0 0 0 5.5-5.7C17.5 9.3 15.5 6.4 12 3Z" stroke-linejoin="round"/>
                                    <path d="M12 11c-1.2 1.2-1.8 2.2-1.8 3.2A1.8 1.8 0 0 0 12 16a1.8 1.8 0 0 0 1.8-1.8c0-1-.6-2-1.8-3.2Z" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-stone-400">Fresh daily</p>
                                <p class="mt-0.5 text-xs font-bold text-ink">Dibuat setelah dipesan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-stone-200/70 bg-white/55">
        <div class="mx-auto grid max-w-7xl grid-cols-2 divide-x divide-stone-200/70 px-4 sm:px-6 lg:grid-cols-4 lg:px-8">
            @foreach ([
                ['title' => 'Bahan lokal pilihan', 'desc' => 'Dipilih dari mitra terpercaya', 'icon' => 'leaf'],
                ['title' => 'Tanpa pengawet', 'desc' => 'Rasa alami di setiap suapan', 'icon' => 'shield'],
                ['title' => 'Dibuat segar', 'desc' => 'Dimasak menjelang pengiriman', 'icon' => 'sparkle'],
                ['title' => 'Dikemas rapi', 'desc' => 'Siap dinikmati atau dihadiahkan', 'icon' => 'box'],
            ] as $feature)
                <div class="flex flex-col items-start gap-3 px-4 py-6 sm:flex-row sm:items-center sm:gap-4 first:pl-0 lg:px-7 lg:first:pl-0">
                    <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                        @if ($feature['icon'] === 'leaf')
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M20 4C12 4 5.5 8 5.5 15.5c0 2.5 1.5 4.5 4 4.5C17 20 20 12 20 4Z" stroke-linejoin="round"/><path d="M4 21c1.5-5 4.5-8 9-10.5" stroke-linecap="round"/></svg>
                        @elseif ($feature['icon'] === 'shield')
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 3 5 6v5.5c0 4.4 2.9 7.7 7 9.5 4.1-1.8 7-5.1 7-9.5V6l-7-3Z" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        @elseif ($feature['icon'] === 'sparkle')
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 3c.5 4.8 2.7 7 7.5 7.5-4.8.5-7 2.7-7.5 7.5-.5-4.8-2.7-7-7.5-7.5 4.8-.5 7-2.7 7.5-7.5Z" stroke-linejoin="round"/><path d="M19 17c.2 1.8 1 2.6 2.8 2.8-1.8.2-2.6 1-2.8 2.8-.2-1.8-1-2.6-2.8-2.8 1.8-.2 2.6-1 2.8-2.8Z" stroke-linejoin="round"/></svg>
                        @else
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m4 8 8-4 8 4-8 4-8-4Z" stroke-linejoin="round"/><path d="M4 8v8l8 4 8-4V8M12 12v8" stroke-linejoin="round"/></svg>
                        @endif
                    </span>
                    <div>
                        <p class="text-xs font-extrabold text-ink sm:text-[13px]">{{ $feature['title'] }}</p>
                        <p class="mt-1 text-[11px] leading-4 text-stone-500">{{ $feature['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="tentang" class="scroll-mt-28 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-14 lg:grid-cols-[0.88fr_1.12fr] lg:gap-20">
                <div class="relative">
                    <div class="absolute -left-5 -top-5 h-28 w-28 rounded-full border border-brand-200"></div>
                    <div class="relative overflow-hidden rounded-[2.25rem] border-[6px] border-white bg-stone-100 shadow-soft">
                        <img
                            src="{{ $aboutProduct?->imageUrl() ?? $fallbackImage }}"
                            alt="{{ $aboutProduct ? 'Sajian '.$aboutProduct->name.' dari PT_apadeh' : 'Dapur PT_apadeh' }}"
                            class="aspect-square w-full object-cover"
                            loading="lazy"
                        >
                    </div>
                    <div class="absolute -bottom-7 -right-2 w-[74%] rounded-2xl bg-ink p-5 text-white shadow-soft sm:-right-6 sm:p-6">
                        <div class="flex items-start gap-3">
                            <img src="{{ asset('images/logo.png') }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.svg') }}';" alt="" class="h-9 w-9 rounded-xl object-cover ring-1 ring-white/15" aria-hidden="true">
                            <div>
                                <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-brand-300">Filosofi kami</p>
                                <p class="mt-1.5 font-display text-base font-semibold leading-snug text-white sm:text-lg">Bahan baik, rasa jujur, disajikan dengan hati.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-[10px] font-extrabold uppercase tracking-[0.24em] text-brand-600">Tentang PT_apadeh</p>
                    <h2 class="mt-4 max-w-xl font-display text-4xl font-semibold leading-[1.08] tracking-[-0.03em] text-ink sm:text-5xl">
                        Dari dapur kami,<br>untuk meja Anda.
                    </h2>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-stone-500">
                        PT_apadeh lahir dari kebiasaan sederhana: memasak dengan bahan terbaik dan menyajikannya untuk orang-orang terdekat. Semangat itu kami bawa ke setiap menu — dari nasi goreng rempah yang hangat hingga kopi susu gula aren yang menemani obrolan panjang.
                    </p>
                    <p class="mt-4 max-w-2xl text-base leading-8 text-stone-500">
                        Sebagai UMKM kuliner Nusantara, kami percaya bahwa makanan yang baik bukan hanya soal rasa. Ia juga tentang bahan yang dipilih dengan teliti, proses yang bersih, dan penyajian yang membuat siapa pun merasa diterima.
                    </p>

                    <div class="mt-9 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-stone-200/80 bg-white p-5 shadow-card">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21s7-3.6 7-10V5l-7-2-7 2v6c0 6.4 7 10 7 10Z" stroke-linejoin="round"/><path d="m9 11 2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <h3 class="mt-4 text-sm font-extrabold text-ink">Bahan yang bertanggung jawab</h3>
                            <p class="mt-1.5 text-xs leading-5 text-stone-500">Bekerja sama dengan pemasok lokal dan memilih bahan segar secara berkala.</p>
                        </div>
                        <div class="rounded-2xl border border-stone-200/80 bg-white p-5 shadow-card">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.5A4 4 0 0 1 19 10c0 5.6-7 10-7 10Z" stroke-linejoin="round"/></svg>
                            </span>
                            <h3 class="mt-4 text-sm font-extrabold text-ink">Dibuat dengan perhatian</h3>
                            <p class="mt-1.5 text-xs leading-5 text-stone-500">Setiap porsi disiapkan dengan detail agar kualitasnya sampai ke tangan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kategori" class="scroll-mt-24 border-y border-stone-200/70 bg-white/55 py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <p class="text-[10px] font-extrabold uppercase tracking-[0.24em] text-brand-600">Jelajahi rasa</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink sm:text-5xl">Temukan favorit Anda.</h2>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-stone-500 sm:text-base">Mulai dari sajian utama yang mengenyangkan hingga camilan dan minuman segar untuk melengkapi hari.</p>
                </div>
                <a href="#produk" class="inline-flex items-center gap-2 self-start text-sm font-bold text-ink transition hover:text-brand-600 sm:self-auto">
                    Lihat semua menu
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                @forelse ($categories as $category)
                    <a
                        href="{{ route('home', ['category' => $category->slug]).'#produk' }}"
                        class="group relative overflow-hidden rounded-[1.75rem] border bg-white p-6 shadow-card transition duration-300 hover:-translate-y-1 hover:shadow-soft sm:p-7 {{ $selectedCategory?->is($category) ? 'border-brand-400 ring-2 ring-brand-100' : 'border-stone-200/80 hover:border-brand-200' }}"
                    >
                        <span class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-brand-50 transition duration-500 group-hover:scale-125"></span>
                        <div class="relative">
                            <div class="flex items-start justify-between gap-4">
                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-500 group-hover:text-white">
                                    @if ($category->slug === 'makanan-berat')
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M4 12h16c0 4.4-3.6 8-8 8s-8-3.6-8-8Z" stroke-linejoin="round"/><path d="M2.5 11h19M8 8c0-1.5.8-2.4.8-3.5M13 8c0-1.5.8-2.4.8-3.5M18 8c0-1.5.5-2.4.5-3.5" stroke-linecap="round"/></svg>
                                    @elseif ($category->slug === 'camilan')
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 3c.5 4.8 2.7 7 7.5 7.5-4.8.5-7 2.7-7.5 7.5-.5-4.8-2.7-7-7.5-7.5C9.3 10 11.5 7.8 12 3Z" stroke-linejoin="round"/><path d="M19 17c.2 1.8 1 2.6 2.8 2.8-1.8.2-2.6 1-2.8 2.8-.2-1.8-1-2.6-2.8-2.8 1.8-.2 2.6-1 2.8-2.8Z" stroke-linejoin="round"/></svg>
                                    @else
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M6 8h10v8.5a3.5 3.5 0 0 1-3.5 3.5h-3A3.5 3.5 0 0 1 6 16.5V8Z" stroke-linejoin="round"/><path d="M16 10h1.5a2.5 2.5 0 0 1 0 5H16M5 21h12M9 3c0 1.5-1 2-1 3.5M13 3c0 1.5-1 2-1 3.5" stroke-linecap="round"/></svg>
                                    @endif
                                </span>
                                <span class="rounded-full bg-stone-100 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.14em] text-stone-500">{{ $category->products_count }} menu</span>
                            </div>
                            <h3 class="mt-8 font-display text-2xl font-semibold text-ink">{{ $category->name }}</h3>
                            <p class="mt-2 min-h-12 text-sm leading-6 text-stone-500">{{ $categoryDescriptions[$category->slug] ?? 'Pilihan terbaik dari dapur kami untuk Anda.' }}</p>
                            <div class="mt-6 flex items-center justify-between">
                                <span class="text-xs font-bold text-brand-700">Jelajahi kategori</span>
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-stone-200 bg-white text-ink transition duration-300 group-hover:border-ink group-hover:bg-ink group-hover:text-white">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full rounded-2xl border border-dashed border-stone-300 bg-white/60 p-10 text-center">
                        <p class="font-display text-xl font-semibold text-ink">Kategori belum tersedia.</p>
                        <p class="mt-2 text-sm text-stone-500">Tambahkan kategori melalui seeder atau pengelolaan data.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="produk" class="scroll-mt-24 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-[10px] font-extrabold uppercase tracking-[0.24em] text-brand-600">Katalog menu</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink sm:text-5xl">
                        {{ $selectedCategory ? 'Menu '.$selectedCategory->name : 'Favorit dari dapur kami.' }}
                    </h2>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-stone-500 sm:text-base">
                        {{ $selectedCategory ? 'Berikut pilihan '.strtolower($selectedCategory->name).' yang siap menemani waktu Anda.' : 'Setiap menu dibuat dari bahan pilihan dengan resep yang kami rawat baik. Pilih yang paling menggugah selera.' }}
                    </p>
                </div>
                <p class="text-sm font-semibold text-stone-400">{{ $products->total() }} menu ditemukan</p>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-2">
                <a href="{{ route('home') }}#produk" class="rounded-full border px-4 py-2.5 text-xs font-bold transition {{ $selectedCategory === null ? 'border-ink bg-ink text-white' : 'border-stone-200 bg-white text-stone-600 hover:border-stone-300 hover:text-ink' }}">
                    Semua menu
                </a>
                @foreach ($categories as $category)
                    <a
                        href="{{ route('home', ['category' => $category->slug]).'#produk' }}"
                        class="rounded-full border px-4 py-2.5 text-xs font-bold transition {{ $selectedCategory?->is($category) ? 'border-ink bg-ink text-white' : 'border-stone-200 bg-white text-stone-600 hover:border-stone-300 hover:text-ink' }}"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
                @if ($selectedCategory)
                    <a href="{{ route('home') }}#produk" class="ml-1 inline-flex items-center gap-1.5 text-xs font-bold text-brand-700 transition hover:text-brand-800">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke-linecap="round"/></svg>
                        Reset filter
                    </a>
                @endif
            </div>

            @if ($products->isEmpty())
                <div class="mt-10 flex flex-col items-center rounded-[2rem] border border-dashed border-stone-300 bg-white/60 px-6 py-16 text-center">
                    <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-brand-50 text-brand-500">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 9h16M5 9l1 11h12l1-11M8 9V6a4 4 0 0 1 8 0v3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <h3 class="mt-5 font-display text-2xl font-semibold text-ink">Belum ada menu di sini.</h3>
                    <p class="mt-2 max-w-md text-sm leading-6 text-stone-500">Katalog masih kosong. Anda dapat menambahkan produk melalui halaman admin agar tampil di halaman ini.</p>
                    <a href="{{ route('admin.products.create') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-ink px-5 py-3 text-sm font-bold text-white transition hover:bg-brand-600">Tambah produk</a>
                </div>
            @else
                <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
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

    <section id="kontak" class="scroll-mt-24 pb-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-[2.25rem] bg-ink px-6 py-10 text-white shadow-soft sm:px-10 sm:py-14 lg:px-14">
                <div class="pointer-events-none absolute -right-24 -top-32 h-80 w-80 rounded-full border-[40px] border-brand-500/15"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/3 h-40 w-40 rounded-full bg-brand-500/10 blur-2xl"></div>
                <div class="relative grid gap-10 lg:grid-cols-[1.08fr_0.92fr] lg:items-center">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.24em] text-brand-300">Mari terhubung</p>
                        <h2 class="mt-4 max-w-xl font-display text-3xl font-semibold leading-[1.12] tracking-[-0.02em] text-white sm:text-4xl lg:text-5xl">Ada momen spesial? Biar kami yang masak.</h2>
                        <p class="mt-5 max-w-xl text-sm leading-7 text-stone-400">Pesan menu favorit, ajukan pesanan catering, atau tanyakan ketersediaan stok. Tim kami siap membantu Anda.</p>
                        <div class="mt-7 flex flex-wrap gap-x-6 gap-y-3 text-xs font-semibold text-stone-300">
                            <span class="inline-flex items-center gap-2">
                                <svg class="h-4 w-4 text-brand-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.5"/></svg>
                                Bandung, Jawa Barat
                            </span>
                            <span class="inline-flex items-center gap-2">
                                <svg class="h-4 w-4 text-brand-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Senin — Sabtu, 09.00 — 21.00
                            </span>
                        </div>
                    </div>

                    <div class="rounded-[1.5rem] border border-white/10 bg-white/[0.06] p-5 backdrop-blur sm:p-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-400">Pesan langsung</p>
                        <a href="https://wa.me/6281234567890?text={{ rawurlencode('Halo PT_apadeh, saya ingin bertanya tentang menu dan pemesanan.') }}" target="_blank" rel="noopener noreferrer" class="mt-4 flex items-center justify-between gap-4 rounded-xl bg-brand-500 px-5 py-4 text-sm font-extrabold text-white transition hover:bg-brand-400">
                            <span class="flex items-center gap-3">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35ZM12.04 21.49h-.01a9.43 9.43 0 0 1-4.8-1.32l-.34-.2-3.57.93.95-3.48-.22-.36a9.41 9.41 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.89.99 6.67 2.77a9.4 9.4 0 0 1 2.76 6.68c0 5.2-4.24 9.44-9.45 9.44Zm8.04-17.48A11.3 11.3 0 0 0 12.04.83C5.81.83.74 5.9.74 12.13c0 1.99.52 3.93 1.51 5.65L.66 23.47l5.82-1.52a11.28 11.28 0 0 0 5.55 1.42h.01c6.23 0 11.3-5.07 11.3-11.3 0-3.02-1.18-5.86-3.31-8Z"/></svg>
                                Chat WhatsApp
                            </span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <a href="mailto:halo@apadeh.id" class="mt-3 flex items-center justify-between gap-4 rounded-xl border border-white/10 bg-white/5 px-5 py-4 text-sm font-bold text-white transition hover:bg-white/10">
                            <span class="flex items-center gap-3">
                                <svg class="h-5 w-5 text-brand-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 7 8 6 8-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                halo@apadeh.id
                            </span>
                            <svg class="h-4 w-4 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <p class="mt-4 text-center text-[11px] leading-5 text-stone-500">Pemesanan catering sebaiknya dilakukan H-1.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
