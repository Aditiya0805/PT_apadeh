@extends('layouts.admin')

@section('title', 'Edit '.$product->name.' — Admin PT_apadeh')
@section('page_label', 'Edit produk')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-steel-500 transition hover:text-steel-900">
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Kembali ke daftar material
        </a>
        <div class="mt-3 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-extrabold uppercase tracking-widest text-brand-600">Perbarui Inventori</p>
                <h1 class="mt-1 font-sans text-2xl font-black tracking-tight text-steel-950 sm:text-3xl">Edit produk</h1>
                <p class="mt-1 max-w-xl text-xs text-steel-500">Perbarui data material <strong class="font-bold text-steel-900">{{ $product->name }}</strong>.</p>
            </div>
            <a href="{{ route('products.show', $product) }}" target="_blank" rel="noopener noreferrer" class="inline-flex shrink-0 items-center justify-center gap-2 self-start rounded-lg border border-steel-300 bg-white px-3.5 py-2 text-xs font-bold text-steel-800 transition hover:bg-steel-50 sm:self-auto">
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                Lihat di Web
            </a>
        </div>
    </div>

    @include('admin.products._form', [
        'product' => $product,
        'categories' => $categories,
    ])
@endsection
