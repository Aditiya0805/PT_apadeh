@extends('layouts.admin')

@section('title', 'Tambah Produk Jam Tangan — Admin PT_apadeh')
@section('page_label', 'Tambah produk')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-steel-500 transition hover:text-steel-900">
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Kembali ke daftar jam tangan
        </a>
        <div class="mt-3">
            <p class="text-[10px] font-extrabold uppercase tracking-widest text-brand-600">Jam Tangan Baru</p>
            <h1 class="mt-1 font-sans text-2xl font-black tracking-tight text-steel-950 sm:text-3xl">Tambah produk</h1>
            <p class="mt-1 max-w-xl text-xs text-steel-500">Lengkapi formulir spesifikasi di bawah ini untuk menambahkan koleksi arloji mewah baru ke katalog.</p>
        </div>
    </div>

    @include('admin.products._form', [
        'product' => null,
        'categories' => $categories,
    ])
@endsection
