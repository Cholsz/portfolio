@extends('layouts.app')

@section('title', 'Tambah Project')
@section('header', 'Tambah Project')

@section('content')

<div class="m-8 pt-15 mx-auto max-w-4xl">

    {{-- Header --}}
    <div class="mb-6">
        <a
            href="{{ route('admin.projects.index') }}"
            class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition  hover:text-blue-600"
        >
            ← Kembali ke Project
        </a>

        <h1 class="mt-4 text-2xl font-bold text-gray-900">
            Tambah Project
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Tambahkan project baru ke portfolio.
        </p>
    </div>


    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
            <p class="font-semibold text-red-700">
                Terdapat kesalahan:
            </p>

            <ul class="mt-2 list-inside list-disc text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Form --}}
    <form
        action="{{ route('admin.projects.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- Informasi Project --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Informasi Project
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Informasi utama yang akan ditampilkan pada portfolio.
            </p>


            <div class="mt-6 space-y-5">

                {{-- Judul --}}
                <div>
                    <label
                        for="judul"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Judul Project
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul') }}"
                        required
                        placeholder="Contoh: Aplikasi Kasir"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>


                {{-- Kategori --}}
                <div>
                    <label for="category_id"
                        class="mb-2 block text-sm font-semibold text-gray-700">
                        Kategori
                    </label>

                    <select
                        name="category_id"
                        id="category_id"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-900 focus:ring-1 focus:ring-gray-900"
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->nama }}
                            </option>

                        @endforeach

                    </select>

                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Deskripsi --}}
                <div>
                    <label
                        for="deskripsi"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="6"
                        required
                        placeholder="Jelaskan project yang kamu buat..."
                        class="w-full resize-y rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('deskripsi') }}</textarea>
                </div>

            </div>

        </div>


        {{-- Gambar --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Gambar Project
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Upload screenshot atau gambar utama project.
            </p>


            <div class="mt-6">

                <label
                    for="gambar"
                    class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center transition hover:border-blue-400 hover:bg-blue-50/30"
                >

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-100 text-2xl">
                        🖼️
                    </div>

                    <p class="mt-4 text-sm font-semibold text-gray-700">
                        Klik untuk memilih gambar
                    </p>

                    <p class="mt-1 text-xs text-gray-500">
                        JPG, JPEG, PNG, atau WEBP — maksimal 4MB
                    </p>

                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                    class="hidden"
                >


                {{-- Preview --}}
                <div id="preview-container" class="mt-5 hidden">

                    <p class="mb-2 text-sm font-semibold text-gray-700">
                        Preview
                    </p>

                    <img
                        id="preview-image"
                        src=""
                        alt="Preview gambar project"
                        class="max-h-80 w-full rounded-2xl border border-gray-200 object-cover shadow-sm"
                    >

                </div>

            </div>

        </div>


        {{-- Teknologi --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Teknologi
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Pisahkan setiap teknologi menggunakan koma.
            </p>

            <input
                type="text"
                name="teknologi"
                value="{{ old('teknologi') }}"
                placeholder="Laravel, PHP, MySQL, Tailwind CSS"
                class="mt-5 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
            >

        </div>


        {{-- Link --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Link Project
            </h2>


            <div class="mt-6 grid gap-5 md:grid-cols-2">

                {{-- GitHub --}}
                <div>
                    <label
                        for="github_url"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        GitHub
                    </label>

                    <input
                        type="url"
                        id="github_url"
                        name="github_url"
                        value="{{ old('github_url') }}"
                        placeholder="https://github.com/username/project"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>


                {{-- Demo --}}
                <div>
                    <label
                        for="demo_url"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Live Demo
                    </label>

                    <input
                        type="url"
                        id="demo_url"
                        name="demo_url"
                        value="{{ old('demo_url') }}"
                        placeholder="https://website-project.com"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

            </div>

        </div>


        {{-- Pengaturan --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Pengaturan
            </h2>


            <div class="mt-6 grid gap-5 md:grid-cols-2">

                {{-- Urutan --}}
                <div>
                    <label
                        for="urutan"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Urutan Tampilan
                    </label>

                    <input
                        type="number"
                        id="urutan"
                        name="urutan"
                        value="{{ old('urutan', 0) }}"
                        min="0"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1 text-xs text-gray-500">
                        Angka lebih kecil akan tampil lebih dahulu.
                    </p>
                </div>


                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Status
                    </label>

                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 p-4">

                        <input
                            type="checkbox"
                            name="status"
                            value="1"
                            {{ old('status', true) ? 'checked' : '' }}
                            class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >

                        <div>
                            <p class="text-sm font-semibold text-gray-800">
                                Aktif
                            </p>

                            <p class="text-xs text-gray-500">
                                Project akan ditampilkan di portfolio.
                            </p>
                        </div>

                    </label>

                </div>

            </div>

        </div>


        {{-- Tombol --}}
        <div class=" flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-xl border border-gray-300 px-6 py-3 text-center text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Simpan Project
            </button>

        </div>

    </form>

</div>


{{-- Preview gambar --}}
<script>
    const gambarInput = document.getElementById('gambar');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');

    gambarInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            previewContainer.classList.add('hidden');
            previewImage.src = '';
            return;
        }

        const imageUrl = URL.createObjectURL(file);

        previewImage.src = imageUrl;
        previewContainer.classList.remove('hidden');
    });
</script>

@endsection