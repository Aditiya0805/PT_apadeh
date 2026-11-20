@php
    $isEditing = $product !== null;
    $previewImage = $product?->imageUrl() ?? asset('images/products/placeholder.svg');
@endphp

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-xs text-red-800" role="alert">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M12 8v5M12 17h.01" stroke-linecap="round"/></svg>
            </span>
            <div>
                <p class="font-bold text-sm">Periksa kembali data produk material.</p>
                <ul class="mt-1.5 list-inside list-disc space-y-1 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<form action="{{ $isEditing ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($isEditing)
        @method('PUT')
    @endif

    <div class="grid items-start gap-6 xl:grid-cols-[minmax(0,1fr)_340px]">
        <div class="space-y-6">
            <section class="rounded-xl border border-steel-200/90 bg-white p-5 shadow-sm sm:p-6">
                <div class="border-b border-steel-100 pb-4">
                    <h2 class="font-sans text-lg font-bold text-steel-950">Informasi Material Bangunan</h2>
                    <p class="mt-1 text-xs text-steel-500">Isi data spesifikasi material yang akan ditampilkan di katalog publik.</p>
                </div>

                <div class="mt-5 space-y-4">
                    <div>
                        <label for="category_id" class="mb-1.5 block text-xs font-bold text-steel-900">Kategori Material <span class="text-brand-600">*</span></label>
                        <div class="relative">
                            <select
                                id="category_id"
                                name="category_id"
                                required
                                class="w-full appearance-none rounded-lg border bg-steel-50 px-3.5 py-2.5 pr-10 text-xs text-steel-900 outline-none transition focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-100 @error('category_id') border-red-300 @else border-steel-200 @enderror"
                            >
                                <option value="">Pilih kategori material</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected((string) old('category_id', $product?->category_id) === (string) $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-steel-400">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        @error('category_id')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="name" class="mb-1.5 block text-xs font-bold text-steel-900">Nama Material &amp; Spesifikasi <span class="text-brand-600">*</span></label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $product?->name) }}"
                            required
                            maxlength="255"
                            placeholder="Contoh: Semen Portland PCC 50kg SNI"
                            class="w-full rounded-lg border bg-steel-50 px-3.5 py-2.5 text-xs text-steel-900 outline-none transition placeholder:text-steel-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-100 @error('name') border-red-300 @else border-steel-200 @enderror"
                        >
                        <div class="mt-1.5 flex items-center justify-between text-[11px] text-steel-400">
                            <span>Sertakan dimensi atau tipe standar (cth: D13 SNI, 50kg, 6 Meter).</span>
                            <span>Maks. 255</span>
                        </div>
                        @error('name')
                            <p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="mb-1.5 block text-xs font-bold text-steel-900">Harga Satuan (Rp) <span class="text-brand-600">*</span></label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-xs font-bold text-steel-400">Rp</span>
                            <input
                                id="price"
                                name="price"
                                type="number"
                                value="{{ old('price', $product ? (float) $product->price : '') }}"
                                required
                                min="0"
                                max="9999999999"
                                step="1"
                                inputmode="numeric"
                                placeholder="68000"
                                class="w-full rounded-lg border bg-steel-50 py-2.5 pl-11 pr-4 text-xs font-bold text-steel-900 outline-none transition placeholder:text-steel-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-100 @error('price') border-red-300 @else border-steel-200 @enderror"
                            >
                        </div>
                        <p class="mt-1.5 text-[11px] text-steel-400">Ketik angka saja tanpa titik (cth: 68000 untuk Rp 68.000).</p>
                        @error('price')
                            <p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="mb-1.5 block text-xs font-bold text-steel-900">Deskripsi Teknis Material <span class="text-brand-600">*</span></label>
                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            required
                            maxlength="2000"
                            placeholder="Jelaskan standar mutu SNI, kegunaan struktur, daya rekat, atau petunjuk aplikasi..."
                            class="w-full resize-y rounded-lg border bg-steel-50 px-3.5 py-2.5 text-xs leading-relaxed text-steel-900 outline-none transition placeholder:text-steel-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-100 @error('description') border-red-300 @else border-steel-200 @enderror"
                        >{{ old('description', $product?->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
        </div>

        <aside class="space-y-5 xl:sticky xl:top-24">
            <section class="rounded-xl border border-steel-200/90 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-bold text-steel-950">Foto Material</h2>
                    <span class="rounded bg-brand-50 px-2 py-0.5 text-[10px] font-bold text-brand-700">Wajib</span>
                </div>

                <div class="mt-3 overflow-hidden rounded-lg border border-steel-200 bg-steel-900">
                    <img id="image-preview" src="{{ $previewImage }}" alt="Pratinjau foto material" class="aspect-[4/3] w-full object-cover">
                </div>

                <label for="image" class="mt-3 block cursor-pointer rounded-lg border border-dashed border-steel-300 bg-steel-50 px-3 py-2.5 text-center transition hover:border-brand-500 hover:bg-brand-50/40">
                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-steel-800">
                        <svg class="h-4 w-4 text-brand-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 16V4M7 9l5-5 5 5M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ $isEditing ? 'Ganti Foto Material' : 'Upload Foto Material' }}
                    </span>
                    <span class="mt-0.5 block text-[10px] text-steel-400">Format JPG / PNG, maks 2 MB</span>
                    <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,image/jpeg,image/png" class="sr-only" {{ $isEditing ? '' : 'required' }}>
                </label>

                @error('image')
                    <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </section>

            <section class="rounded-xl border border-steel-200/90 bg-white p-4 shadow-sm">
                <div class="flex flex-col gap-2">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-steel-900 px-4 py-3 text-xs font-bold text-white shadow-sm transition hover:bg-brand-600">
                        {{ $isEditing ? 'Simpan Perubahan' : 'Simpan Material Baru' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-lg border border-steel-200 px-4 py-2.5 text-xs font-bold text-steel-600 transition hover:bg-steel-50">
                        Batal
                    </a>
                </div>
            </section>
        </aside>
    </div>
</form>

<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', () => {
            const file = imageInput.files?.[0];

            if (file && file.type.startsWith('image/')) {
                imagePreview.src = URL.createObjectURL(file);
            }
        });
    }
</script>
