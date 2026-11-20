@extends('layouts.admin')

@section('title', 'Tambah Produk — Admin PT_apadeh')
@section('page_label', 'Tambah produk')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-stone-500 transition hover:text-ink">
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Kembali ke daftar produk
        </a>
        <div class="mt-4">
            <p class="text-[10px] font-extrabold uppercase tracking-[0.22em] text-brand-600">Katalog baru</p>
            <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink sm:text-4xl">Tambah produk</h1>
            <p class="mt-2 max-w-xl text-sm leading-6 text-stone-500">Lengkapi informasi di bawah ini untuk menambahkan menu baru ke website.</p>
        </div>
    </div>

    @include('admin.products._form', [
        'product' => null,
        'categories' => $categories,
    ])
@endsection
