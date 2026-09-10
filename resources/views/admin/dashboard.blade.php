
@extends('layouts.app')

@section('title', 'Admin - Portfolio Chols')

@section('content')

<section class="min-h-screen bg-gray-50 pt-28 pb-20">

    <div class="mx-auto max-w-4xl px-6">

        <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

            <div>
                <form action="{{ route('admin.logout') }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="rounded-lg border border-gray-300 bg-blue-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-red-500 hover:text-red-600"
                >
                    Logout
                </button>

                </form>

                <p class="pt-4 font-semibold text-blue-600">
                    Administration
                </p>

                <h1 class="mt-2 text-3xl font-bold text-gray-950">
                    Admin Dashboard
                </h1>

                <p class="mt-2 text-gray-500">
                    Kelola profil portfolio kamu.
                </p>
                
                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

                {{-- Total Projects --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Total Projects
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-950">
                        {{ $totalProjects }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Semua project
                    </p>

                </div>


                {{-- Active Projects --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Project Aktif
                    </p>

                    <p class="mt-2 text-3xl font-bold text-green-600">
                        {{ $activeProjects }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Tampil di portfolio
                    </p>

                </div>


                {{-- Total Categories --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Total Kategori
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-950">
                        {{ $totalCategories }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Semua kategori
                    </p>

                </div>


                {{-- Active Categories --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

                    <p class="text-sm font-medium text-gray-500">
                        Kategori Aktif
                    </p>

                    <p class="mt-2 text-3xl font-bold text-blue-600">
                        {{ $activeCategories }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Tersedia untuk project
                    </p>

                </div>

            </div>
            </div>

        </div>


        {{-- Success --}}
        @if (session('success'))
            <div class="mb-6 rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif


        {{-- Profile Photo --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <h2 class="text-xl font-bold text-gray-900">
                    Foto Profil
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Ganti foto profil yang tampil pada halaman utama.
                </p>

            </div>


            <form
                action="{{ route('profile.photo.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="flex flex-col items-center gap-6 sm:flex-row">

                    {{-- Current Photo --}}
                    @php
                        $profilePhoto = null;

                        foreach (['jpg', 'jpeg', 'png', 'webp'] as $extension) {
                            $path = 'profile/profile.' . $extension;

                            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
                                $profilePhoto = asset('storage/' . $path);
                                break;
                            }
                        }
                    @endphp


                    <div class="h-32 w-32 shrink-0 overflow-hidden rounded-full border border-gray-200 bg-gray-50">

                        @if ($profilePhoto)

                            <img
                                src="{{ $profilePhoto }}"
                                alt="Foto profil"
                                class="h-full w-full object-cover"
                            >

                        @else

                            <div class="flex h-full w-full items-center justify-center text-4xl font-bold text-blue-600">
                                C
                            </div>

                        @endif

                    </div>


                    <div class="flex-1">

                        <input
                            type="file"
                            name="photo"
                            accept="image/jpeg,image/png,image/webp"
                            required
                            class="block w-full rounded-lg border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-blue-600 file:px-4 file:py-3 file:font-medium file:text-white hover:file:bg-blue-700"
                        >

                        <p class="mt-2 text-xs text-gray-500">
                            JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                        </p>

                        @error('photo')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror


                        <button
                            type="submit"
                            class="mt-4 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700"
                        >
                            Simpan Foto
                        </button>

                    </div>

                </div>

            </form>

        </div>
        {{-- Projects --}}
<div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

        <div>

            <h2 class="text-xl font-bold text-gray-900">
                Projects
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Tambahkan dan kelola project yang tampil di portfolio.
            </p>

        </div>

        <a
            href="{{ route('admin.projects.index') }}"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">
            Kelola Projects
        </a>

    </div>

</div>

{{-- Categories --}}
<div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

        <div>

            <h2 class="text-xl font-bold text-gray-900">
                Categories
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Tambahkan dan kelola kategori project portfolio.
            </p>

        </div>

        <a
            href="{{ route('admin.categories.index') }}"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
        >
            Kelola Kategori
        </a>

    </div>

</div>


{{-- Experiences --}}
<div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

        <div>
            <h2 class="text-xl font-bold text-gray-900">
                Experiences
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Kelola organisasi, pelatihan, dan pencapaian portfolio.
            </p>
        </div>

        <a
            href="{{ route('admin.experiences.index') }}"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
        >
            Kelola Experiences
        </a>

    </div>


    {{-- Experience Statistics --}}
    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

        {{-- Organisasi --}}
        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">

            <p class="text-sm font-medium text-gray-500">
                Organisasi
            </p>

            <p class="mt-2 text-2xl font-bold text-gray-900">
                {{ $totalOrganisasi }}
            </p>

            <p class="mt-1 text-xs text-gray-400">
                Data organisasi
            </p>

        </div>


        {{-- Pelatihan --}}
        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">

            <p class="text-sm font-medium text-gray-500">
                Pelatihan
            </p>

            <p class="mt-2 text-2xl font-bold text-gray-900">
                {{ $totalPelatihan }}
            </p>

            <p class="mt-1 text-xs text-gray-400">
                Data pelatihan
            </p>

        </div>


        {{-- Pencapaian --}}
        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">

            <p class="text-sm font-medium text-gray-500">
                Pencapaian
            </p>

            <p class="mt-2 text-2xl font-bold text-gray-900">
                {{ $totalPencapaian }}
            </p>

            <p class="mt-1 text-xs text-gray-400">
                Data pencapaian
            </p>

        </div>

    </div>

</div>



    </div>

</section>

@endsection

