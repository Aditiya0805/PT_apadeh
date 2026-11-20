@extends('layouts.admin')

@section('title', 'Kelola Produk Jam Tangan — Admin PT_apadeh')
@section('page_label', 'Koleksi Jam Tangan')

@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-xs font-extrabold uppercase tracking-widest text-brand-600">Manajemen Inventori</p>
            <h1 class="mt-1 font-sans text-2xl font-black tracking-tight text-steel-950 sm:text-3xl">Kelola produk jam tangan</h1>
            <p class="mt-1 max-w-xl text-xs text-steel-500">Tambah, perbarui, atau hapus koleksi jam tangan mewah yang tampil di website PT_apadeh.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-steel-900 px-5 py-2.5 text-xs font-bold text-white shadow-sm transition duration-200 hover:bg-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
            Tambah Jam Tangan Baru
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="mt-6 grid gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-steel-200/90 bg-white p-4 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-steel-400">Total Jam Tangan</p>
                    <p class="mt-1 font-sans text-2xl font-black text-steel-950">{{ $productCount }}</p>
                </div>
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </span>
            </div>
            <p class="mt-2 text-[11px] text-steel-400">Arloji aktif di katalog publik</p>
        </div>

        <div class="rounded-xl border border-steel-200/90 bg-white p-4 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-steel-400">Kategori Pokok</p>
                    <p class="mt-1 font-sans text-2xl font-black text-steel-950">{{ $categoryCount }}</p>
                </div>
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                </span>
            </div>
            <p class="mt-2 text-[11px] text-steel-400">Kelompok kategori bangunan</p>
        </div>

        <div class="rounded-xl border border-steel-200/90 bg-white p-4 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-steel-400">Hasil Pencarian</p>
                    <p class="mt-1 font-sans text-2xl font-black text-steel-950">{{ $products->total() }}</p>
                </div>
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
                </span>
            </div>
            <p class="mt-2 text-[11px] text-steel-400">{{ $search !== '' ? 'Berdasarkan filter pencarian' : 'Semua item ditampilkan' }}</p>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="mt-6 overflow-hidden rounded-xl border border-steel-200/90 bg-white shadow-sm">
        <div class="flex flex-col gap-3 border-b border-steel-100 p-4 sm:flex-row sm:items-center sm:justify-between">
            <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-1 flex-col gap-2 sm:flex-row sm:items-center" role="search">
                <div class="relative flex-1 sm:max-w-md">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-steel-400">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
                    </span>
                    <label for="search" class="sr-only">Cari koleksi jam tangan</label>
                    <input
                        id="search"
                        name="search"
                        type="search"
                        value="{{ $search }}"
                        placeholder="Cari Rolex, Submariner, Daytona, Diver..."
                        class="w-full rounded-lg border border-steel-200 bg-steel-50 py-2.5 pl-10 pr-4 text-xs text-steel-900 outline-none transition placeholder:text-steel-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-100"
                    >
                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-steel-300 bg-white px-3.5 py-2 text-xs font-bold text-steel-800 transition hover:bg-steel-50">
                        Cari
                    </button>
                    @if ($search !== '')
                        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-lg px-2.5 py-2 text-xs font-bold text-steel-500 transition hover:text-steel-900">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            <p class="text-xs font-semibold text-steel-500">{{ $products->firstItem() ?? 0 }}—{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} arloji</p>
        </div>

        @if ($products->isEmpty())
            <div class="flex flex-col items-center px-6 py-14 text-center">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-steel-100 text-steel-400">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/></svg>
                </span>
                <h2 class="mt-3 font-sans text-lg font-bold text-steel-900">{{ $search !== '' ? 'Jam Tangan Tidak Ditemukan' : 'Katalog Jam Tangan Kosong' }}</h2>
                <p class="mt-1 max-w-sm text-xs text-steel-500">{{ $search !== '' ? 'Coba gunakan kata kunci lain seperti "Rolex", "Submariner", atau "Automatic".' : 'Tambahkan jam tangan pertama Anda agar muncul di website publik.' }}</p>
                @if ($search !== '')
                    <a href="{{ route('admin.products.index') }}" class="mt-4 inline-flex items-center gap-2 rounded-lg border border-steel-300 bg-white px-4 py-2 text-xs font-bold text-steel-800 hover:bg-steel-50">Reset Pencarian</a>
                @else
                    <a href="{{ route('admin.products.create') }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-steel-900 px-4 py-2 text-xs font-bold text-white hover:bg-brand-600">Tambah Jam Tangan</a>
                @endif
            </div>
        @else
            <!-- Desktop Table -->
            <div class="hidden overflow-x-auto md:block">
                <table class="w-full min-w-[760px] text-left">
                    <thead>
                        <tr class="border-b border-steel-100 bg-steel-50 text-[10px] font-extrabold uppercase tracking-wider text-steel-400">
                            <th scope="col" class="px-5 py-3.5">Jam Tangan</th>
                            <th scope="col" class="px-5 py-3.5">Kategori</th>
                            <th scope="col" class="px-5 py-3.5">Harga Satuan</th>
                            <th scope="col" class="px-5 py-3.5">Terakhir Diupdate</th>
                            <th scope="col" class="px-5 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-steel-100 text-xs">
                        @foreach ($products as $product)
                            <tr class="transition hover:bg-steel-50/70">
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center gap-3">
                                        <div class="h-12 w-14 shrink-0 overflow-hidden rounded-lg bg-steel-900 ring-1 ring-steel-200">
                                            <img src="{{ $product->imageUrl() }}" alt="Foto {{ $product->name }}" class="h-full w-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="max-w-[260px] truncate font-bold text-steel-900">{{ $product->name }}</p>
                                            <p class="text-[10px] text-steel-400">SKU #MAT-{{ str_pad((string) $product->id, 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex rounded-md bg-steel-100 px-2.5 py-1 text-[10px] font-bold text-steel-700">{{ $product->category->name }}</span>
                                </td>
                                <td class="px-5 py-3.5">
                                    <p class="font-extrabold text-brand-600">{{ $product->formattedPrice() }}</p>
                                </td>
                                <td class="px-5 py-3.5">
                                    <p class="font-medium text-steel-600">{{ $product->updated_at->format('d/m/Y') }}</p>
                                    <p class="text-[10px] text-steel-400">{{ $product->updated_at->format('H:i') }} WIB</p>
                                </td>
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('products.show', $product) }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-steel-400 transition hover:bg-steel-100 hover:text-steel-900" title="Lihat di Web">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-steel-600 transition hover:bg-brand-50 hover:text-brand-600" title="Edit Material">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z"/></svg>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus material ini? Tindakan tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-steel-400 transition hover:bg-red-50 hover:text-red-600" title="Hapus Material">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards List -->
            <div class="divide-y divide-steel-100 md:hidden">
                @foreach ($products as $product)
                    <div class="p-4">
                        <div class="flex gap-3">
                            <div class="h-16 w-20 shrink-0 overflow-hidden rounded-lg bg-steel-900 ring-1 ring-steel-200">
                                <img src="{{ $product->imageUrl() }}" alt="Foto {{ $product->name }}" class="h-full w-full object-cover">
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="rounded bg-steel-100 px-2 py-0.5 text-[9px] font-bold text-steel-600">{{ $product->category->name }}</span>
                                <h3 class="mt-1 line-clamp-1 text-sm font-bold text-steel-900">{{ $product->name }}</h3>
                                <p class="mt-0.5 text-xs font-black text-brand-600">{{ $product->formattedPrice() }}</p>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center justify-between border-t border-steel-100 pt-2.5 text-xs">
                            <p class="text-[10px] text-steel-400">Update {{ $product->updated_at->format('d/m/Y') }}</p>
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('products.show', $product) }}" target="_blank" class="rounded p-1 text-steel-500 hover:bg-steel-100">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="rounded bg-steel-100 px-2.5 py-1 text-[10px] font-bold text-steel-800">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus material ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded p-1 text-red-500 hover:bg-red-50">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($products->hasPages())
                <div class="border-t border-steel-100 p-4">
                    {{ $products->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection
