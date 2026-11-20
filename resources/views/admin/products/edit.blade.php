@extends('layouts.admin')

@section('title', 'Edit '.$product->name.' — Admin PT_apadeh')
@section('page_label', 'Edit produk')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-stone-500 transition hover:text-ink">
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Kembali ke daftar produk
        </a>
        <div class="mt-4 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-extrabold uppercase tracking-[0.22em] text-brand-600">Perbarui menu</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink sm:text-4xl">Edit produk</h1>
                <p class="mt-2 max-w-xl text-sm leading-6 text-stone-500">Perbarui detail <strong class="font-bold text-ink">{{ $product->name }}</strong> di bawah ini.</p>
            </div>
            <a href="{{ route('products.show', $product) }}" target="_blank" rel="noopener noreferrer" class="inline-flex shrink-0 items-center justify-center gap-2 self-start rounded-full border border-stone-300 bg-white px-4 py-2.5 text-xs font-bold text-ink transition hover:border-stone-400 hover:bg-stone-50 sm:self-auto">
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z" stroke-linejoin="round"/><circle cx="12" cy="12" r="3"/></svg>
                Lihat di situs
            </a>
        </div>
    </div>

    @include('admin.products._form', [
        'product' => $product,
        'categories' => $categories,
    ])
@endsection
