@extends('layouts.admin')

@section('title', 'Kelola Produk — Admin PT_apadeh')
@section('page_label', 'Produk')

@section('content')
    <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[10px] font-extrabold uppercase tracking-[0.22em] text-brand-600">Katalog</p>
            <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink sm:text-4xl">Kelola produk</h1>
            <p class="mt-2 max-w-xl text-sm leading-6 text-stone-500">Tambah, perbarui, atau hapus menu yang tampil di website PT_apadeh.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-ink px-5 py-3 text-sm font-bold text-white shadow-card transition duration-300 hover:-translate-y-0.5 hover:bg-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
            Tambah produk
        </a>
    </div>

    <div class="mt-7 grid gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-stone-200/80 bg-white p-5 shadow-card">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-stone-400">Total produk</p>
                    <p class="mt-2 font-display text-3xl font-bold text-ink">{{ $productCount }}</p>
                </div>
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="m4 8 8-4 8 4-8 4-8-4Z" stroke-linejoin="round"/><path d="M4 8v8l8 4 8-4V8M12 12v8" stroke-linejoin="round"/></svg>
                </span>
            </div>
            <p class="mt-3 text-[11px] text-stone-400">Menu aktif di katalog publik</p>
        </div>

        <div class="rounded-2xl border border-stone-200/80 bg-white p-5 shadow-card">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-stone-400">Kategori</p>
                    <p class="mt-2 font-display text-3xl font-bold text-ink">{{ $categoryCount }}</p>
                </div>
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="2"/><rect x="14" y="3" width="7" height="7" rx="2"/><rect x="3" y="14" width="7" height="7" rx="2"/><rect x="14" y="14" width="7" height="7" rx="2"/></svg>
                </span>
            </div>
            <p class="mt-3 text-[11px] text-stone-400">Pengelompokan menu tersedia</p>
        </div>

        <div class="rounded-2xl border border-stone-200/80 bg-white p-5 shadow-card">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-stone-400">Hasil tampilan</p>
                    <p class="mt-2 font-display text-3xl font-bold text-ink">{{ $products->total() }}</p>
                </div>
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4" stroke-linecap="round"/></svg>
                </span>
            </div>
            <p class="mt-3 text-[11px] text-stone-400">{{ $search !== '' ? 'Berdasarkan kata kunci pencarian' : 'Semua produk ditampilkan' }}</p>
        </div>
    </div>

    <div class="mt-6 overflow-hidden rounded-[1.5rem] border border-stone-200/80 bg-white shadow-card">
        <div class="flex flex-col gap-4 border-b border-stone-100 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-5">
            <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-1 flex-col gap-2.5 sm:flex-row sm:items-center" role="search">
                <div class="relative flex-1 sm:max-w-md">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4" stroke-linecap="round"/></svg>
                    </span>
                    <label for="search" class="sr-only">Cari produk</label>
                    <input
                        id="search"
                        name="search"
                        type="search"
                        value="{{ $search }}"
                        placeholder="Cari nama produk atau kategori..."
                        class="w-full rounded-xl border border-stone-200 bg-stone-50/70 py-3 pl-11 pr-4 text-sm text-ink outline-none transition placeholder:text-stone-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100"
                    >
                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="inline-flex flex-1 items-center justify-center rounded-xl border border-stone-300 bg-white px-4 py-3 text-xs font-bold text-ink transition hover:border-stone-400 hover:bg-stone-50 sm:flex-none">
                        Cari
                    </button>
                    @if ($search !== '')
                        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-xl px-3 py-3 text-xs font-bold text-stone-500 transition hover:bg-stone-100 hover:text-ink">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            <p class="text-xs font-semibold text-stone-400">{{ $products->firstItem() ?? 0 }}—{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</p>
        </div>

        @if ($products->isEmpty())
            <div class="flex flex-col items-center px-6 py-16 text-center">
                <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-stone-100 text-stone-400">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="m4 8 8-4 8 4-8 4-8-4Z" stroke-linejoin="round"/><path d="M4 8v8l8 4 8-4V8M12 12v8" stroke-linejoin="round"/></svg>
                </span>
                <h2 class="mt-5 font-display text-2xl font-semibold text-ink">{{ $search !== '' ? 'Produk tidak ditemukan' : 'Katalog masih kosong' }}</h2>
                <p class="mt-2 max-w-md text-sm leading-6 text-stone-500">{{ $search !== '' ? 'Coba gunakan kata kunci lain atau reset pencarian untuk melihat seluruh produk.' : 'Tambahkan produk pertama Anda agar katalog di halaman publik langsung terisi.' }}</p>
                @if ($search !== '')
                    <a href="{{ route('admin.products.index') }}" class="mt-5 inline-flex items-center gap-2 rounded-full border border-stone-300 bg-white px-5 py-2.5 text-xs font-bold text-ink transition hover:bg-stone-50">Reset pencarian</a>
                @else
                    <a href="{{ route('admin.products.create') }}" class="mt-5 inline-flex items-center gap-2 rounded-full bg-ink px-5 py-2.5 text-xs font-bold text-white transition hover:bg-brand-600">Tambah produk</a>
                @endif
            </div>
        @else
            <div class="hidden overflow-x-auto md:block">
                <table class="w-full min-w-[820px] text-left">
                    <thead>
                        <tr class="border-b border-stone-100 bg-stone-50/70 text-[10px] font-extrabold uppercase tracking-[0.14em] text-stone-400">
                            <th scope="col" class="px-5 py-4">Produk</th>
                            <th scope="col" class="px-5 py-4">Kategori</th>
                            <th scope="col" class="px-5 py-4">Harga</th>
                            <th scope="col" class="px-5 py-4">Diperbarui</th>
                            <th scope="col" class="px-5 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach ($products as $product)
                            <tr class="group transition hover:bg-stone-50/50">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3.5">
                                        <div class="h-14 w-16 shrink-0 overflow-hidden rounded-xl bg-stone-100 ring-1 ring-stone-200/70">
                                            <img src="{{ $product->imageUrl() }}" alt="Foto {{ $product->name }}" class="h-full w-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="max-w-[240px] truncate text-sm font-bold text-ink">{{ $product->name }}</p>
                                            <p class="mt-1 text-[11px] text-stone-400">ID #{{ str_pad((string) $product->id, 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex whitespace-nowrap rounded-full bg-brand-50 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.1em] text-brand-700">{{ $product->category->name }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <p class="whitespace-nowrap text-sm font-bold text-ink">{{ $product->formattedPrice() }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <p class="text-xs font-medium text-stone-500">{{ $product->updated_at->format('d/m/Y') }}</p>
                                    <p class="mt-0.5 text-[10px] text-stone-400">{{ $product->updated_at->format('H:i') }} WIB</p>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('products.show', $product) }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-stone-400 transition hover:bg-stone-100 hover:text-ink" title="Lihat di situs" aria-label="Lihat {{ $product->name }} di situs">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z" stroke-linejoin="round"/><circle cx="12" cy="12" r="3"/></svg>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-stone-500 transition hover:bg-brand-50 hover:text-brand-700" title="Edit produk" aria-label="Edit {{ $product->name }}">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini? Tindakan tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-stone-500 transition hover:bg-red-50 hover:text-red-600" title="Hapus produk" aria-label="Hapus {{ $product->name }}">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13M10 11v5M14 11v5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="divide-y divide-stone-100 md:hidden">
                @foreach ($products as $product)
                    <div class="p-4">
                        <div class="flex gap-4">
                            <div class="h-20 w-24 shrink-0 overflow-hidden rounded-xl bg-stone-100 ring-1 ring-stone-200/70">
                                <img src="{{ $product->imageUrl() }}" alt="Foto {{ $product->name }}" class="h-full w-full object-cover">
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="inline-flex rounded-full bg-brand-50 px-2.5 py-1 text-[9px] font-extrabold uppercase tracking-[0.1em] text-brand-700">{{ $product->category->name }}</span>
                                <h3 class="mt-1.5 line-clamp-2 text-sm font-bold leading-5 text-ink">{{ $product->name }}</h3>
                                <p class="mt-1 text-sm font-extrabold text-brand-700">{{ $product->formattedPrice() }}</p>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-between gap-3 border-t border-stone-100 pt-3">
                            <p class="text-[10px] font-medium text-stone-400">Diperbarui {{ $product->updated_at->format('d/m/Y') }}</p>
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('products.show', $product) }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-stone-100 text-stone-500" aria-label="Lihat {{ $product->name }} di situs">
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z" stroke-linejoin="round"/><circle cx="12" cy="12" r="3"/></svg>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex h-8 items-center gap-1.5 rounded-lg bg-ink px-3 text-[10px] font-bold text-white">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini? Tindakan tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-red-100 bg-red-50 text-red-500" aria-label="Hapus {{ $product->name }}">
                                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13M10 11v5M14 11v5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($products->hasPages())
                <div class="border-t border-stone-100 px-4 py-4 sm:px-5">
                    {{ $products->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection
