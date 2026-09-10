@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('header', 'Tambah Kategori')

@section('content')

<div class=" p-20 m-6 min-h-screen bg-gray-50">

    {{-- Header --}}
    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Kategori
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Tambahkan kategori baru untuk mengelompokkan project.
        </p>

    </div>


    {{-- Form --}}
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

        <form action="{{ route('admin.categories.store') }}"
              method="POST"
              class="space-y-6">

            @csrf


            {{-- Nama Kategori --}}
            <div>

                <label for="nama"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Contoh: Web Developer"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-900 focus:ring-1 focus:ring-gray-900"
                >

                @error('nama')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Status --}}
            <div>

                <label class="mb-3 block text-sm font-semibold text-gray-700">
                    Status
                </label>

                <label class="inline-flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        {{ old('status', true) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900"
                    >

                    <span class="text-sm text-gray-700">
                        Kategori aktif
                    </span>

                </label>

                <p class="mt-2 text-xs text-gray-500">
                    Kategori aktif akan tersedia untuk dipilih saat menambahkan project.
                </p>

            </div>


            {{-- Button --}}
            <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-5">

                <a href="{{ route('admin.categories.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800">
                    Simpan Kategori
                </button>

            </div>

        </form>

    </div>

</div>

@endsection