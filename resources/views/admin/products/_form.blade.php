@php
    $isEditing = $product !== null;
    $previewImage = $product?->imageUrl() ?? asset('images/products/placeholder.svg');
@endphp

@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" aria-hidden="true"><path d="M12 8v5M12 17h.01" stroke-linecap="round"/></svg>
            </span>
            <div>
                <p class="font-bold">Periksa kembali data produk.</p>
                <ul class="mt-2 list-inside list-disc space-y-1 text-xs leading-5 text-red-700">
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

    <div class="grid items-start gap-6 xl:grid-cols-[minmax(0,1fr)_360px]">
        <div class="space-y-6">
            <section class="rounded-[1.5rem] border border-stone-200/80 bg-white p-5 shadow-card sm:p-6">
                <div class="border-b border-stone-100 pb-5">
                    <h2 class="font-display text-xl font-semibold text-ink">Informasi produk</h2>
                    <p class="mt-1.5 text-xs leading-5 text-stone-500">Isi data utama yang akan ditampilkan di halaman publik.</p>
                </div>

                <div class="mt-5 space-y-5">
                    <div>
                        <label for="category_id" class="mb-2 block text-xs font-bold text-ink">Kategori <span class="text-brand-600">*</span></label>
                        <div class="relative">
                            <select
                                id="category_id"
                                name="category_id"
                                required
                                class="w-full appearance-none rounded-xl border bg-stone-50/70 px-4 py-3 pr-10 text-sm text-ink outline-none transition focus:bg-white focus:ring-4 @error('category_id') border-red-300 focus:border-red-400 focus:ring-red-100 @else border-stone-200 focus:border-brand-400 focus:ring-brand-100 @enderror"
                            >
                                <option value="">Pilih kategori produk</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected((string) old('category_id', $product?->category_id) === (string) $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-stone-400">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        @error('category_id')
                            <p class="mt-2 flex items-center gap-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="name" class="mb-2 block text-xs font-bold text-ink">Nama produk <span class="text-brand-600">*</span></label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $product?->name) }}"
                            required
                            maxlength="255"
                            placeholder="Contoh: Nasi Goreng Rempah Apadeh"
                            class="w-full rounded-xl border bg-stone-50/70 px-4 py-3 text-sm text-ink outline-none transition placeholder:text-stone-400 focus:bg-white focus:ring-4 @error('name') border-red-300 focus:border-red-400 focus:ring-red-100 @else border-stone-200 focus:border-brand-400 focus:ring-brand-100 @enderror"
                        >
                        <div class="mt-2 flex items-start justify-between gap-4">
                            @error('name')
                                <p class="text-xs font-semibold text-red-600">{{ $message }}</p>
                            @else
                                <p class="text-[11px] text-stone-400">Gunakan nama yang mudah dikenali pelanggan.</p>
                            @enderror
                            <span class="shrink-0 text-[10px] font-medium text-stone-400">Maks. 255</span>
                        </div>
                    </div>

                    <div>
                        <label for="price" class="mb-2 block text-xs font-bold text-ink">Harga <span class="text-brand-600">*</span></label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-bold text-stone-400">Rp</span>
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
                                placeholder="28000"
                                class="w-full rounded-xl border bg-stone-50/70 py-3 pl-12 pr-4 text-sm text-ink outline-none transition placeholder:text-stone-400 focus:bg-white focus:ring-4 @error('price') border-red-300 focus:border-red-400 focus:ring-red-100 @else border-stone-200 focus:border-brand-400 focus:ring-brand-100 @enderror"
                            >
                        </div>
                        @error('price')
                            <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @else
                            <p class="mt-2 text-[11px] text-stone-400">Masukkan angka saja, tanpa titik atau koma. Contoh: 28000.</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-xs font-bold text-ink">Deskripsi <span class="text-brand-600">*</span></label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            required
                            maxlength="2000"
                            placeholder="Ceritakan bahan, rasa, dan keunikan produk ini..."
                            class="w-full resize-y rounded-xl border bg-stone-50/70 px-4 py-3 text-sm leading-6 text-ink outline-none transition placeholder:text-stone-400 focus:bg-white focus:ring-4 @error('description') border-red-300 focus:border-red-400 focus:ring-red-100 @else border-stone-200 focus:border-brand-400 focus:ring-brand-100 @enderror"
                        >{{ old('description', $product?->description) }}</textarea>
                        <div class="mt-2 flex items-start justify-between gap-4">
                            @error('description')
                                <p class="text-xs font-semibold text-red-600">{{ $message }}</p>
                            @else
                                <p class="text-[11px] text-stone-400">Tuliskan 2—3 kalimat yang menggugah selera.</p>
                            @enderror
                            <span class="shrink-0 text-[10px] font-medium text-stone-400">Maks. 2.000</span>
                        </div>
                    </div>
                </div>
            </section>

            <div class="flex items-start gap-3 rounded-2xl border border-brand-100 bg-brand-50/70 p-4">
                <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01" stroke-linecap="round"/></svg>
                </span>
                <p class="text-[11px] leading-5 text-brand-900">Data produk akan langsung tampil di halaman publik setelah disimpan. Pastikan harga dan deskripsi sudah sesuai.</p>
            </div>
        </div>

        <aside class="space-y-5 xl:sticky xl:top-24">
            <section class="rounded-[1.5rem] border border-stone-200/80 bg-white p-5 shadow-card">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="font-display text-xl font-semibold text-ink">Foto produk</h2>
                        <p class="mt-1.5 text-xs leading-5 text-stone-500">Format JPG, JPEG, atau PNG.</p>
                    </div>
                    <span class="rounded-full bg-brand-50 px-2.5 py-1 text-[9px] font-extrabold uppercase tracking-[0.12em] text-brand-700">Wajib</span>
                </div>

                <div class="mt-4 overflow-hidden rounded-2xl border border-stone-200 bg-stone-100">
                    <img id="image-preview" src="{{ $previewImage }}" alt="Pratinjau foto produk" class="aspect-[4/3] w-full object-cover">
                </div>

                <label for="image" class="mt-4 block cursor-pointer rounded-xl border border-dashed border-stone-300 bg-stone-50/70 px-4 py-3 text-center transition hover:border-brand-300 hover:bg-brand-50/40">
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-ink">
                        <svg class="h-4 w-4 text-brand-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 16V4M7 9l5-5 5 5M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ $isEditing ? 'Ganti foto produk' : 'Pilih foto produk' }}
                    </span>
                    <span class="mt-1 block text-[10px] text-stone-400">Maksimal 2 MB</span>
                    <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,image/jpeg,image/png" class="sr-only" {{ $isEditing ? '' : 'required' }}>
                </label>

                @error('image')
                    <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                @else
                    <p class="mt-2 text-[11px] leading-5 text-stone-400">{{ $isEditing ? 'Biarkan kosong jika tidak ingin mengganti foto saat ini.' : 'Gunakan foto landscape dengan pencahayaan yang baik.' }}</p>
                @enderror
            </section>

            <section class="rounded-[1.5rem] border border-stone-200/80 bg-white p-5 shadow-card">
                <div class="flex flex-col gap-2.5">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-ink px-5 py-3.5 text-sm font-bold text-white shadow-card transition duration-300 hover:bg-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M5 4h11l3 3v13H5V4Z" stroke-linejoin="round"/><path d="M8 4v5h7V4M8 20v-6h8v6" stroke-linejoin="round"/></svg>
                        {{ $isEditing ? 'Simpan perubahan' : 'Simpan produk' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-xl border border-stone-200 px-5 py-3 text-sm font-bold text-stone-600 transition hover:bg-stone-50 hover:text-ink">Batal</a>
                </div>
            </section>

            <div class="rounded-2xl border border-stone-200/80 bg-[#F8F5F0] p-4">
                <p class="flex items-center gap-2 text-[10px] font-extrabold uppercase tracking-[0.14em] text-stone-500">
                    <svg class="h-3.5 w-3.5 text-brand-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 3c.5 4.8 2.7 7 7.5 7.5-4.8.5-7 2.7-7.5 7.5-.5-4.8-2.7-7-7.5-7.5 4.8-.5 7-2.7 7.5-7.5Z" stroke-linejoin="round"/></svg>
                    Tips foto yang baik
                </p>
                <ul class="mt-3 space-y-2 text-[11px] leading-5 text-stone-500">
                    <li class="flex gap-2"><span class="text-brand-500">&bull;</span><span>Gunakan cahaya alami agar warna makanan terlihat segar.</span></li>
                    <li class="flex gap-2"><span class="text-brand-500">&bull;</span><span>Ambil dari sudut 45 derajat untuk hasil yang lebih menarik.</span></li>
                    <li class="flex gap-2"><span class="text-brand-500">&bull;</span><span>Gunakan rasio landscape 4:3 agar tampilan kartu konsisten.</span></li>
                </ul>
            </div>
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
