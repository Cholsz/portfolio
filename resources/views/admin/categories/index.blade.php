@extends('layouts.app')

@section('title', 'Kategori')
@section('header', 'Kategori')

@section('content')

<div class="p-20 m-6 min-h-screen bg-gray-50 space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Kategori
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Kelola kategori project portfolio.
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800">

            + Tambah Kategori

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Validation Error --}}
    @if($errors->any())

        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

            <ul class="list-inside list-disc space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Nama Kategori
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Slug
                        </th>

                        <th class="px-6 py-4 text-center font-semibold text-gray-700">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-gray-700">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($categories as $category)

                        <tr class="transition hover:bg-gray-50">

                            <td class="px-6 py-4 text-gray-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-800">
                                    {{ $category->nama }}
                                </div>

                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $category->slug }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                @if($category->status)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Aktif
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Toggle Status --}}
                                    <form action="{{ route('admin.categories.toggle-status', $category) }}"
                                          method="POST">

                                        @csrf
                                        @method('PATCH')

                                        @if($category->status)

                                            <button type="submit"
                                                    class="rounded-lg bg-yellow-100 px-3 py-2 text-xs font-semibold text-yellow-700 transition hover:bg-yellow-200">
                                                Nonaktifkan
                                            </button>

                                        @else

                                            <button type="submit"
                                                    class="rounded-lg bg-green-100 px-3 py-2 text-xs font-semibold text-green-700 transition hover:bg-green-200">
                                                Aktifkan
                                            </button>

                                        @endif

                                    </form>


                                    {{-- Edit --}}
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                       class="rounded-lg bg-blue-100 px-3 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-200">
                                        Edit
                                    </a>


                                    {{-- Delete --}}
                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-200">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-12 text-center">

                                <div class="text-gray-400">

                                    <p class="text-base font-medium">
                                        Belum ada kategori.
                                    </p>

                                    <p class="mt-1 text-sm">
                                        Tambahkan kategori untuk mengelompokkan project portfolio.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection