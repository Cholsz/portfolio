@extends('layouts.app')

@section('title', $project->judul . ' - Portfolio Chols')

@section('content')

<section class="bg-gray-50 pt-28 pb-20">

    <div class="mx-auto max-w-6xl px-6">

        {{-- =========================================================
             NAVIGASI KEMBALI
        ========================================================== --}}
        <div class="mb-10">

            <a
                href="{{ route('home') }}#projects"
                class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 transition hover:text-gray-900"
            >
                <span class="text-lg">←</span>
                Kembali ke Projects
            </a>

        </div>


        {{-- =========================================================
             PROJECT HEADER
        ========================================================== --}}
        <div class="mx-auto max-w-4xl text-center">

            {{-- Kategori --}}
            @if ($project->category)

                <span
                    class="inline-flex items-center rounded-full bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-600"
                >
                    {{ $project->category->nama }}
                </span>

            @endif


            {{-- Judul --}}
            <h1 class="mt-5 text-4xl font-bold tracking-tight text-gray-950 sm:text-5xl">
                {{ $project->judul }}
            </h1>


            {{-- Deskripsi singkat --}}
            <p class="mx-auto mt-5 max-w-2xl text-base leading-7 text-gray-600 sm:text-lg">
                {{ $project->deskripsi }}
            </p>

        </div>


        {{-- =========================================================
             GAMBAR PROJECT
        ========================================================== --}}
        @if ($project->gambar)

            <div class="mx-auto mt-12 max-w-6xl overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">

                <img
                    src="{{ asset('storage/' . $project->gambar) }}"
                    alt="{{ $project->judul }}"
                    class="max-h-[650px] w-full object-cover"
                >

            </div>

        @endif


        {{-- =========================================================
             DETAIL PROJECT
        ========================================================== --}}
        <div class="mt-10 grid gap-8 lg:grid-cols-[1fr_320px]">


            {{-- =====================================================
                 DESKRIPSI
            ====================================================== --}}
            <article class="rounded-3xl border border-gray-200 bg-white p-7 shadow-sm sm:p-9">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-900 text-sm font-bold text-white"
                    >
                        ✦
                    </div>

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Overview
                        </p>

                        <h2 class="text-xl font-bold text-gray-950">
                            Tentang Project
                        </h2>

                    </div>

                </div>


                <div class="mt-7 whitespace-pre-line text-base leading-8 text-gray-600">
                    {{ $project->deskripsi }}
                </div>

            </article>


            {{-- =====================================================
                 SIDEBAR
            ====================================================== --}}
            <aside class="space-y-6">


                {{-- =================================================
                     KATEGORI
                ================================================== --}}
                @if ($project->category)

                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Category
                        </p>

                        <p class="mt-2 text-base font-bold text-gray-950">
                            {{ $project->category->nama }}
                        </p>

                    </div>

                @endif


                {{-- =================================================
                     TEKNOLOGI
                ================================================== --}}
                @if ($project->teknologi)

                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Technologies
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2">

                            @foreach (explode(',', $project->teknologi) as $teknologi)

                                @php
                                    $teknologi = trim($teknologi);
                                @endphp

                                @if ($teknologi)

                                    <span
                                        class="rounded-full bg-gray-100 px-3 py-2 text-sm font-medium text-gray-700"
                                    >
                                        {{ $teknologi }}
                                    </span>

                                @endif

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- =================================================
                     PROJECT LINKS
                ================================================== --}}
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Project Links
                    </p>


                    <div class="mt-4 space-y-3">

                        {{-- GitHub --}}
                        @if ($project->github_url)

                            <a
                                href="{{ $project->github_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex w-full items-center justify-between rounded-xl border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700 transition hover:border-gray-900 hover:bg-gray-50"
                            >
                                <span>GitHub Repository</span>

                                <span class="text-base">
                                    ↗
                                </span>
                            </a>

                        @endif


                        {{-- Live Demo --}}
                        @if ($project->demo_url)

                            <a
                                href="{{ $project->demo_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex w-full items-center justify-between rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
                            >
                                <span>Live Demo</span>

                                <span class="text-base">
                                    ↗
                                </span>
                            </a>

                        @endif


                        {{-- Jika tidak ada link --}}
                        @if (!$project->github_url && !$project->demo_url)

                            <div class="rounded-xl bg-gray-50 px-4 py-3">

                                <p class="text-sm leading-6 text-gray-500">
                                    Link project belum tersedia.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


            </aside>

        </div>


        {{-- =========================================================
             CTA
        ========================================================== --}}
        <div class="mt-10 overflow-hidden rounded-3xl bg-gray-900 px-6 py-12 text-center sm:px-10">

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                Explore More
            </p>

            <h2 class="mt-4 text-2xl font-bold text-white sm:text-3xl">
                Lihat project lainnya
            </h2>

            <p class="mx-auto mt-3 max-w-xl text-sm leading-7 text-gray-400">
                Jelajahi project lainnya yang saya kerjakan selama belajar,
                kuliah, dan mengembangkan kemampuan di bidang teknologi.
            </p>


            <div class="mt-7">

                <a
                    href="{{ route('home') }}#projects"
                    class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-gray-900 transition hover:bg-gray-100"
                >
                    Lihat Semua Projects
                    <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>

@endsection