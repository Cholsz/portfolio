@extends('layouts.app')

@section('title', 'Portfolio - Chols')

@section('content')

{{-- =========================================
     HERO
========================================== --}}
<section id="home" class="relative overflow-hidden pt-16">

    <div class="mx-auto grid min-h-[calc(100vh-4rem)] max-w-6xl items-center gap-8 px-6 py-16 md:grid-cols-[1.1fr_0.9fr] md:py-20">

        {{-- Hero Text --}}
        <div class="reveal">

            {{-- Status --}}
            <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                $ hello

            </div>

            {{-- Name --}}
            <h1 class="whitespace-nowrap text-6xl font-bold font-serif leading-tight tracking-tight text-gray-950 md:text-6xl">
                Ardhiansyah,<br>
                Junior Web Developer.
            </h1>

            {{-- Description --}}
            <p class="font-sans mt-6 max-w-xl text-lg leading-8 text-gray-600">
                Saya memiliki ketertarikan pada Web Development,
                UI/UX Design, dan Machine Learning.
                Saat ini saya fokus mengembangkan kemampuan dalam
                membangun aplikasi web menggunakan Laravel.
            </p>

            {{-- Buttons --}}
            <div class="mt-8 flex flex-wrap gap-4">

                <a href="#project"
                   class="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white shadow-sm transition-smooth hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md">
                    Lihat Project
                </a>

                <a href="{{ asset('cv/CV-Chols.pdf') }}"
                   target="_blank"
                   class="rounded-lg border border-gray-300 bg-white px-6 py-3 font-semibold text-gray-700 transition hover:-translate-y-0.5 hover:border-blue-600 hover:text-blue-600">
                    Download CV
                </a>

            </div>

            {{-- Social Media --}}
            <div class="mt-8 flex items-center gap-5">

                <a href="#"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-sm font-semibold text-gray-500 transition hover:text-gray-900">
                    GitHub
                </a>

                <span class="text-gray-300">
                    /
                </span>

                <a href="#"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-sm font-semibold text-gray-500 transition hover:text-blue-600">
                    LinkedIn
                </a>

            </div>

        </div>


        {{-- Hero Profile --}}
        <div class="reveal flex justify-center md:justify-end">

            <div class="relative">

                {{-- Decorative Background Blur --}}
                <div class="absolute -inset-6 rounded-[2rem] bg-blue-100/70 blur-3xl"></div>

                {{-- Profile Card --}}
                <div class="animate-float relative h-80 w-80 rounded-3xl border border-gray-100 bg-white p-3 shadow-xl md:h-96 md:w-96">

                    {{-- Wadah Foto --}}
                    <div class="h-full w-full overflow-hidden rounded-2xl bg-gray-50">

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

                        @if ($profilePhoto)

                            <img
                                src="{{ $profilePhoto }}"
                                alt="Foto profil Chols"
                                class="h-full w-full object-cover"
                            >

                        @else

                            <div class="flex h-full w-full items-center justify-center bg-gray-50">

                                <div class="text-center">

                                    <div class="mx-auto flex h-32 w-32 items-center justify-center rounded-full bg-blue-50 text-5xl font-bold text-blue-600 ring-8 ring-white shadow-sm">
                                        C
                                    </div>

                                    <h3 class="mt-6 text-2xl font-bold text-gray-900">
                                        Chols
                                    </h3>

                                    <p class="mt-2 text-sm text-gray-500">
                                        Informatics Engineering
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>


                    {{-- Badge 1 --}}
                    <div class="animate-float-delayed absolute -top-3 -right-3 z-10 flex items-center justify-center rounded-2xl border border-gray-100 bg-white p-3 shadow-lg">

                        <span class="font-mono text-sm font-bold text-blue-600">
                            &lt;/&gt;
                        </span>

                    </div>


                    {{-- Badge 2 --}}
                    <div class="animate-float-slow absolute -bottom-3 -left-3 z-10 flex items-center gap-2 rounded-2xl border border-gray-100 bg-white px-4 py-2 shadow-lg">

                        <span class="h-2 w-2 rounded-full bg-blue-600"></span>

                        <span class="text-xs font-semibold text-gray-700">
                            UI / UX
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================
     DEVELOPER CODE PREVIEW
========================================== --}}
<section class="reveal px-6">

    <div class="mx-auto max-w-6xl overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl">

        <div class="grid gap-6 bg-gray-50 lg:grid-cols-2">

            {{-- LEFT : CODE EDITOR --}}
            <div class="bg-[#0d0d0d] text-white">

                <div class="flex h-14 items-center border-b border-gray-800 px-5">

                    <div class="flex gap-2">
                        <span class="h-3 w-3 rounded-full bg-red-500"></span>
                        <span class="h-3 w-3 rounded-full bg-yellow-500"></span>
                        <span class="h-3 w-3 rounded-full bg-brand-green"></span>
                    </div>

                    <span class="ml-5 font-mono text-sm text-gray-400">
                        portfolio.blade.php
                    </span>

                </div>


                <div class="overflow-x-auto p-6 font-mono text-sm leading-7">

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">01</span>
                        <span>
                            <span class="text-purple-400">const</span>
                            <span class="text-white"> developer </span>
                            <span class="text-pink-400">=</span>
                            <span class="text-yellow-300"> {</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">02</span>
                        <span class="pl-2">
                            <span class="text-blue-300">nama</span>
                            <span class="text-gray-400">:</span>
                            <span class="text-green-300"> "Ardhiansyah"</span>
                            <span class="text-gray-400">,</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">03</span>
                        <span class="pl-2">
                            <span class="text-blue-300">role</span>
                            <span class="text-gray-400">:</span>
                            <span class="text-green-300">
                                "Junior Web Developer"
                            </span>
                            <span class="text-gray-400">,</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">04</span>
                        <span class="pl-2">
                            <span class="text-blue-300">stack</span>
                            <span class="text-gray-400">:</span>
                            <span class="text-yellow-300"> [</span>
                            <span class="text-green-300">"Laravel"</span>
                            <span class="text-gray-400">,</span>
                            <span class="text-green-300"> "Tailwind"</span>
                            <span class="text-gray-400">,</span>
                            <span class="text-green-300"> "MySQL"</span>
                            <span class="text-yellow-300">]</span>
                            <span class="text-gray-400">,</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">05</span>
                        <span class="pl-2">
                            <span class="text-blue-300">lokasi</span>
                            <span class="text-gray-400">:</span>
                            <span class="text-green-300"> "Indonesia"</span>
                            <span class="text-gray-400">,</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">06</span>
                        <span class="text-yellow-300">};</span>
                    </div>

                    <div class="h-4"></div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">08</span>
                        <span>
                            <span class="text-purple-400">function</span>
                            <span class="text-blue-300"> buildWebsite</span>
                            <span class="text-gray-300">()</span>
                            <span class="text-yellow-300"> {</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">09</span>
                        <span class="pl-2">
                            <span class="text-purple-400">return</span>
                            <span class="text-green-300">
                                "Membuat pengalaman web yang menarik"
                            </span>
                            <span class="text-gray-400">;</span>
                        </span>
                    </div>

                    <div class="flex">
                        <span class="mr-5 select-none text-gray-600">10</span>
                        <span class="text-yellow-300">}</span>
                    </div>

                </div>

            </div>


            {{-- RIGHT : LIVE PREVIEW --}}
            <div class="bg-gray-100">

                <div class="flex h-14 items-center border-b border-gray-250 bg-white/90 px-5">

                    <div class="flex w-full items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-4 py-2">

                        <svg
                            class="h-4 w-4 text-brand-green"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 12h14M12 5l7 7-7 7"
                            />
                        </svg>

                        <span class="font-mono text-xs text-gray-500">
                            preview — portfolio.local
                        </span>

                    </div>

                </div>


                <div class="flex min-h-[340px] items-center px-8 py-10">

                    <div>

                        <div class="mb-5 flex h-20 w-20 items-center justify-center rounded-2xl bg-brand-light-green">

                            @if ($profilePhoto)

                                <div class="avatar">

                                    <div class="w-16 rounded-2xl">

                                        <img
                                            src="{{ $profilePhoto }}"
                                            alt="Foto profil Chols"
                                        >

                                    </div>

                                </div>

                            @endif

                        </div>


                        <h3 class="text-3xl font-serif text-gray-900">

                            Halo, saya

                            <span class="font-semibold text-brand-green">
                                Developer
                            </span>

                        </h3>


                        <p class="mt-4 max-w-md text-sm leading-6 text-gray-500">
                            Membuat website yang modern, responsif,
                            dan nyaman digunakan.
                        </p>


                        <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-brand-green bg-brand-light-green px-4 py-2 text-sm text-brand-green">

                            
                            <span class="h-2 w-2 rounded-full bg-brand-green"></span>
                            Tersedia untuk proyek baru

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================
     ABOUT
========================================== --}}
<section id="about" class="reveal scroll-mt-16 bg-gray-50 py-24">

    <div class="mx-auto max-w-6xl px-6">

        <div class="mb-6">

            <span class="font-mono text-sm font-medium text-brand-green">
                // tentang
            </span>

        </div>


        <div class="max-w-4xl">

            <h2 class="text-3xl font-bold leading-tight tracking-tight text-gray-950 md:text-5xl">
                Berfokus pada Pengembangan Website
                yang Fungsional dan Responsif
            </h2>

        </div>


        <div class="mt-12 grid gap-12 lg:grid-cols-[1.4fr_0.6fr]">

            <div>

                <p class="max-w-3xl text-lg leading-8 text-gray-600">
                    Saya Ardhiansyah, seorang Fresh Graduate S1 Teknik Informatika
                    yang memiliki ketertarikan pada pengembangan aplikasi web,
                    UI/UX Design, dan Machine Learning.
                </p>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-gray-600">
                    Saya terbiasa menggunakan Laravel, PHP, React, JavaScript,
                    Tailwind CSS, dan MySQL dalam membangun serta mengembangkan
                    aplikasi web. Saya juga memiliki pengalaman mengerjakan
                    project berbasis Machine Learning menggunakan Python,
                    TensorFlow, dan Flask.
                </p>

            </div>


            <div class="lg:border-l lg:border-gray-200 lg:pl-10">

                <div class="space-y-7">

                    <div>

                        <p class="text-sm text-gray-400">
                            Fokus
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900">
                            Junior Web Developer
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-400">
                            Pendidikan
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900">
                            S1 Teknik Informatika
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-400">
                            Ketersediaan
                        </p>

                        <p class="mt-1 text-lg font-semibold text-gray-900">
                            Kerja & Freelance
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================
     EDUCATION
========================================== --}}
<section id="education" class="scroll-mt-16 bg-white py-24">

    <div class="mx-auto max-w-4xl px-6">

        <div class="reveal mb-16 text-center">

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-brand-green">
                Pendidikan
            </p>

            <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-900 md:text-4xl">
                Riwayat Pendidikan
            </h2>

        </div>


        <div class="relative">

            <div class="absolute left-24 top-0 hidden h-full w-px bg-gray-200 md:block"></div>


            {{-- S1 --}}
            <div class="stagger-item relative flex gap-8 pb-14">

                <div class="w-20 shrink-0 text-right">

                    <p class="text-sm font-semibold text-brand-green">
                        2022
                    </p>

                    <p class="text-xs text-gray-400">
                        2026
                    </p>

                </div>


                <div class="relative z-10 mt-1.5 hidden h-2.5 w-2.5 shrink-0 rounded-full bg-brand-green ring-4 ring-white md:block"></div>


                <div class="flex-1">

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-400">
                        Perguruan Tinggi
                    </p>

                    <h3 class="mt-2 text-xl font-bold text-gray-900">
                        Universitas Teknologi AKBA Makassar
                    </h3>

                    <p class="mt-1 font-medium text-brand-green">
                        S1 - Teknik Informatika
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        Fresh Graduate
                    </p>

                </div>

            </div>


            {{-- SMA --}}
            <div class="stagger-item relative flex gap-8 pb-14">

                <div class="w-20 shrink-0 text-right">

                    <p class="text-sm font-semibold text-brand-green">
                        2019
                    </p>

                    <p class="text-xs text-gray-400">
                        2022
                    </p>

                </div>


                <div class="relative z-10 mt-1.5 hidden h-2.5 w-2.5 shrink-0 rounded-full bg-gray-300 ring-4 ring-white md:block"></div>


                <div class="flex-1">

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-400">
                        Sekolah Menengah Kejuruan
                    </p>

                    <h3 class="mt-2 text-xl font-bold text-gray-900">
                        SMK Mutiara Ilmu
                    </h3>

                </div>

            </div>


            {{-- SMP --}}
            <div class="stagger-item relative flex gap-8 pb-14">

                <div class="w-20 shrink-0 text-right">

                    <p class="text-sm font-semibold text-brand-green">
                        2016
                    </p>

                    <p class="text-xs text-gray-400">
                        2019
                    </p>

                </div>


                <div class="relative z-10 mt-1.5 hidden h-2.5 w-2.5 shrink-0 rounded-full bg-gray-300 ring-4 ring-white md:block"></div>


                <div class="flex-1">

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-400">
                        Sekolah Menengah Pertama
                    </p>

                    <h3 class="mt-2 text-xl font-bold text-gray-900">
                        SMPN 6 Moncongloe
                    </h3>

                </div>

            </div>


            {{-- SD --}}
            <div class="stagger-item relative flex gap-8">

                <div class="w-20 shrink-0 text-right">

                    <p class="text-sm font-semibold text-brand-green">
                        2010
                    </p>

                    <p class="text-xs text-gray-400">
                        2016
                    </p>

                </div>


                <div class="relative z-10 mt-1.5 hidden h-2.5 w-2.5 shrink-0 rounded-full bg-gray-300 ring-4 ring-white md:block"></div>


                <div class="flex-1">

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-400">
                        Sekolah Dasar
                    </p>

                    <h3 class="mt-2 text-xl font-bold text-gray-900">
                        SDN 70 Manjalling
                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================
     EXPERIENCE
========================================== --}}
<section id="experience" class="scroll-mt-16 bg-gray-50 py-24">

    <div class="mx-auto max-w-6xl px-6">

        <div class="reveal mx-auto mb-16 max-w-2xl text-center">

            <span class="text-sm font-semibold uppercase tracking-[0.2em] text-brand-green">
                Experience
            </span>

            <h2 class="mt-3 text-3xl font-bold text-gray-900 md:text-4xl">
                Pengalaman & Pencapaian
            </h2>

            <p class="mt-4 leading-relaxed text-gray-600">
                Berbagai pengalaman organisasi, pelatihan, dan pencapaian
                yang menjadi bagian dari perjalanan pengembangan diri saya.
            </p>

        </div>


        @if ($experiences->count())

            <div class="relative">

                <div class="absolute left-4 top-0 hidden h-full w-px bg-gray-200 md:left-1/2 md:block"></div>

                <div class="space-y-12">

                    @foreach ($experiences as $experience)

                        <div class="stagger-item relative md:grid md:grid-cols-2 md:gap-16">

                            {{-- Timeline Dot --}}
                            <div class="absolute left-1/2 top-8 z-10 hidden h-4 w-4
                                -translate-x-1/2 rounded-full border-4 border-gray-50
                                bg-primary shadow md:block">
                            </div>


                            {{-- Spacer --}}
                            @if ($loop->iteration % 2 === 0)
                                <div class="hidden md:block"></div>
                            @endif


                            {{-- Card --}}
                            <div
                                class="group rounded-2xl border border-gray-200 bg-white p-6
                                shadow-sm transition-all duration-300
                                hover:-translate-y-1 hover:shadow-xl
                                {{ $loop->iteration % 2 === 0
                                    ? ''
                                    : 'md:col-start-1 md:row-start-1' }}"
                            >

                                <div class="flex flex-wrap items-start justify-between gap-4">

                                    <div class="flex min-w-0 items-start gap-3">

                                        {{-- Organisasi --}}
                                        @if ($experience->type === 'organisasi')

                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.8">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />

                                                </svg>

                                            </div>


                                            <div class="min-w-0">

                                                <span class="text-xs font-semibold uppercase tracking-wider text-primary">
                                                    Organisasi
                                                </span>

                                                <h3 class="mt-1 break-words text-xl font-bold text-gray-900 transition-colors group-hover:text-primary">
                                                    {{ $experience->judul }}
                                                </h3>

                                            </div>


                                        {{-- Pelatihan --}}
                                        @elseif ($experience->type === 'pelatihan')

                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-secondary/10 text-secondary">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.8">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M12 14l9-5-9-5-9 5 9 5z" />

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M5 12v4.5c0 1.5 3.134 3.5 7 3.5s7-2 7-3.5V12" />

                                                </svg>

                                            </div>


                                            <div class="min-w-0">

                                                <span class="text-xs font-semibold uppercase tracking-wider text-secondary">
                                                    Pelatihan
                                                </span>

                                                <h3 class="mt-1 break-words text-xl font-bold text-gray-900 transition-colors group-hover:text-secondary">
                                                    {{ $experience->judul }}
                                                </h3>

                                            </div>


                                        {{-- Pencapaian --}}
                                        @else

                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-accent/10 text-accent">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.8">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M9 12l2 2 4-4" />

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M12 3l2.09 2.26L17 5.18l.91 2.91L21 9l-.91 3.09L21 15l-3.09.91L17 19l-2.91-.91L12 21l-2.09-2.91L7 19l-.91-3.09L3 15l.91-2.91L3 9l3.09-.91L7 5.18l2.91.08L12 3z" />

                                                </svg>

                                            </div>


                                            <div class="min-w-0">

                                                <span class="text-xs font-semibold uppercase tracking-wider text-accent">
                                                    Pencapaian
                                                </span>

                                                <h3 class="mt-1 break-words text-xl font-bold text-gray-900 transition-colors group-hover:text-accent">
                                                    {{ $experience->judul }}
                                                </h3>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- Tanggal --}}
                                    @if ($experience->tanggal_mulai || $experience->tanggal_selesai)

                                        <div class="shrink-0 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-500">

                                            @if ($experience->tanggal_mulai)
                                                {{ $experience->tanggal_mulai->format('M Y') }}
                                            @endif

                                            @if ($experience->tanggal_mulai && $experience->tanggal_selesai)
                                                -
                                            @endif

                                            @if ($experience->tanggal_selesai)
                                                {{ $experience->tanggal_selesai->format('M Y') }}
                                            @endif

                                        </div>

                                    @endif

                                </div>


                                {{-- Institution --}}
                                @if ($experience->institusi)

                                    <p class="mt-4 text-sm font-medium text-gray-500">
                                        {{ $experience->institusi }}
                                    </p>

                                @endif


                                {{-- Description --}}
                                @if ($experience->deskripsi)

                                    <p class="mt-4 leading-relaxed text-gray-600">
                                        {{ $experience->deskripsi }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


        @else

            <div class="reveal rounded-2xl border border-dashed border-gray-300 bg-white p-10 text-center">

                <p class="text-gray-500">
                    Belum ada pengalaman yang ditambahkan.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================
     SKILLS
========================================== --}}
<section id="skills" class="scroll-mt-16 border-t border-gray-100 bg-white py-24">

    <div class="mx-auto max-w-6xl px-6">

        {{-- Section Header --}}
        <div class="reveal mb-12 max-w-2xl">

            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-brand-green bg-brand-light-green px-4 py-1 text-sm font-medium text-brand-green">

                <span class="h-2 w-2 rounded-full bg-brand-green"></span>

                <span class="font-mono">
                    // tools & stack
                </span>

            </div>

            <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-950 md:text-5xl">
                Tools yang saya pakai setiap hari
            </h2>

        </div>


        {{-- Skills Grid --}}
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6">


            {{-- Laravel --}}
            <div class="skill-card skill-delay-1 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/laravel/FF2D20"
                        alt="Laravel"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Laravel
                </span>

            </div>


            {{-- TypeScript --}}
            <div class="skill-card skill-delay-2 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/TypeScript/3776AB"
                        alt="TypeScript"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    TypeScript
                </span>

            </div>


            {{-- PHP --}}
            <div class="skill-card skill-delay-3 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/php/777BB4"
                        alt="PHP"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    PHP
                </span>

            </div>


            {{-- React --}}
            <div class="skill-card skill-delay-4 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/react/61DAFB"
                        alt="React"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    React
                </span>

            </div>


            {{-- JavaScript --}}
            <div class="skill-card skill-delay-5 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-yellow-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/javascript/F7DF1E"
                        alt="JavaScript"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    JavaScript
                </span>

            </div>


            {{-- Tailwind CSS --}}
            <div class="skill-card skill-delay-6 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-cyan-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/tailwindcss/06B6D4"
                        alt="Tailwind CSS"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Tailwind CSS
                </span>

            </div>


            {{-- Vite --}}
            <div class="skill-card skill-delay-7 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/vite/646CFF"
                        alt="Vite"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Vite
                </span>

            </div>


            {{-- MySQL --}}
            <div class="skill-card skill-delay-8 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/mysql/4479A1"
                        alt="MySQL"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    MySQL
                </span>

            </div>


            {{-- Git --}}
            <div class="skill-card skill-delay-9 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-orange-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/git/F05032"
                        alt="Git"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Git
                </span>

            </div>


            {{-- GitHub --}}
            <div class="skill-card skill-delay-10 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/github/181717"
                        alt="GitHub"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    GitHub
                </span>

            </div>


            {{-- Figma --}}
            <div class="skill-card skill-delay-11 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-pink-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/figma/F24E1E"
                        alt="Figma"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Figma
                </span>

            </div>


            {{-- Python --}}
            <div class="skill-card skill-delay-12 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-yellow-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/python/3776AB"
                        alt="Python"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Python
                </span>

            </div>


            {{-- TensorFlow --}}
            <div class="skill-card skill-delay-13 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-orange-50 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/tensorflow/FF6F00"
                        alt="TensorFlow"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    TensorFlow
                </span>

            </div>


            {{-- Flask --}}
            <div class="skill-card skill-delay-14 group flex items-center gap-3 rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-100 shadow-sm">
                    <img
                        src="https://cdn.simpleicons.org/flask/000000"
                        alt="Flask"
                        class="h-5 w-5"
                    >
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Flask
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================================
     PROJECTS
========================================== --}}
<section id="project" class="bg-gray-50 py-24">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="reveal mb-12 max-w-2xl">

            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-brand-green bg-brand-light-green px-4 py-1 text-sm font-medium text-brand-green">

                <span class="h-2 w-2 rounded-full bg-brand-green"></span>

                <span class="font-mono">
                    // Project
                </span>

            </div>

            <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-950 md:text-5xl">
                Beberapa yang sudah saya kerjakan
            </h2>

        </div>


        {{-- Filter Kategori --}}
        <div class="reveal mb-10 flex flex-wrap justify-center gap-3">

            <a
                href="{{ route('home') }}"
                class="rounded-full px-5 py-2.5 text-sm font-semibold transition
                {{ !$categorySlug
                    ? 'bg-gray-900 text-white'
                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                }}"
            >
                Semua
            </a>


            @foreach($categories as $category)

                <a
                    href="{{ route('home', ['category' => $category->slug]) }}"
                    class="rounded-full px-5 py-2.5 text-sm font-semibold transition
                    {{ $categorySlug === $category->slug
                        ? 'bg-gray-900 text-white'
                        : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                    }}"
                >
                    {{ $category->nama }}
                </a>

            @endforeach

        </div>


        {{-- Project List --}}
        @if ($projects->count())

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($projects as $project)

                <article
                    class="stagger-item group overflow-hidden rounded-2xl border border-gray-200 bg-white transition-all duration-500 hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg"
                >

                    {{-- =========================
                        PROJECT IMAGE
                    ========================== --}}
                    <div class="relative overflow-hidden bg-gray-100">

                        @if ($project->gambar)

                            <img
                                src="{{ asset('storage/' . $project->gambar) }}"
                                alt="{{ $project->judul }}"
                                class="h-56 w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]"
                            >

                        @else

                            <div class="flex h-56 items-center justify-center">
                                <span class="text-sm text-gray-400">
                                    No Image
                                </span>
                            </div>

                        @endif


                        {{-- Category --}}
                        <div class="absolute left-4 top-4">

                            <span
                                class="inline-flex items-center rounded-full border border-white/70 bg-white/90 px-3 py-1 text-xs font-semibold text-brand-green shadow-sm backdrop-blur-sm"
                            >
                                {{ $project->category->nama ?? 'Project' }}
                            </span>

                        </div>

                    </div>


                    {{-- =========================
                        PROJECT CONTENT
                    ========================== --}}
                    <div class="p-6">

                        {{-- Title --}}
                        <h3
                            class="text-xl font-bold tracking-tight text-gray-950 transition-colors duration-300 group-hover:text-brand-green"
                        >
                            {{ $project->judul }}
                        </h3>


                        {{-- Description --}}
                        @if ($project->deskripsi)

                            <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-500">
                                {{ $project->deskripsi }}
                            </p>

                        @endif


                        {{-- Technologies --}}
                        @if ($project->teknologi)

                            <div class="mt-5 flex flex-wrap gap-2">

                                @foreach (explode(',', $project->teknologi) as $tech)

                                    <span
                                        class="rounded-md bg-gray-50 px-2.5 py-1 text-xs font-medium text-gray-500 ring-1 ring-inset ring-gray-200"
                                    >
                                        {{ trim($tech) }}
                                    </span>

                                @endforeach

                            </div>

                        @endif


                        {{-- Divider --}}
                        <div class="my-5 border-t border-gray-100"></div>


                        {{-- =========================
                            ACTIONS
                        ========================== --}}
                        <div class="flex items-center justify-between">

                            {{-- View Project --}}
                            <a
                                href="{{ route('projects.show', $project->slug) }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-gray-900 transition-colors duration-300 hover:text-brand-green"
                            >
                                View Project

                                <span
                                    class="transition-transform duration-300 group-hover:translate-x-1"
                                >
                                    →
                                </span>
                            </a>


                            {{-- External Links --}}
                            <div class="flex items-center gap-2">

                                @if ($project->github_url)

                                    <a
                                        href="{{ $project->github_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="GitHub {{ $project->judul }}"
                                        class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 text-gray-500 transition-all duration-300 hover:border-gray-900 hover:bg-gray-900 hover:text-white"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path d="M12 2C6.48 2 2 6.58 2 12.26c0 4.53 2.87 8.37 6.84 9.72.5.1.68-.22.68-.49v-1.7c-2.78.62-3.37-1.38-3.37-1.38-.45-1.2-1.11-1.52-1.11-1.52-.91-.64.07-.63.07-.63 1 .07 1.53 1.06 1.53 1.06.9 1.58 2.34 1.12 2.91.86.09-.67.35-1.12.63-1.38-2.22-.26-4.55-1.14-4.55-5.07 0-1.12.39-2.03 1.03-2.75-.1-.26-.45-1.3.1-2.71 0 0 .84-.28 2.75 1.05A9.2 9.2 0 0 1 12 6.84c.85 0 1.7.12 2.5.36 1.9-1.33 2.74-1.05 2.74-1.05.56 1.41.21 2.45.11 2.71.64.72 1.03 1.63 1.03 2.75 0 3.94-2.34 4.81-4.57 5.06.36.32.68.95.68 1.91v2.83c0 .27.18.59.69.49A10.27 10.27 0 0 0 22 12.26C22 6.58 17.52 2 12 2Z"/>
                                        </svg>
                                    </a>

                                @endif


                                @if ($project->demo_url)

                                    <a
                                        href="{{ $project->demo_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="rounded-lg bg-gray-900 px-3 py-2 text-xs font-semibold text-white transition-colors duration-300 hover:bg-brand-green"
                                    >
                                        Live Demo
                                    </a>

                                @endif

                            </div>

                        </div>

                    </div>

                </article>

            @endforeach



            </div>


        @else

            <div class="reveal mt-12 rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-2xl">
                    💻
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Belum Ada Project
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm text-gray-500">
                    Project yang ditambahkan melalui halaman admin
                    akan ditampilkan di sini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================
     CONTACT
========================================== --}}
<section id="contact" class="reveal scroll-mt-16 bg-white py-24">

    <div class="mx-auto max-w-4xl px-6 text-center">

        <p class="font-semibold text-brand-green">
            Get In Touch
        </p>

        <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-950 md:text-4xl">
            Mari Terhubung
        </h2>

        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-gray-600">
            Saya terbuka terhadap kesempatan kerja,
            project, dan kolaborasi di bidang teknologi.
        </p>

        <div class="mt-8 flex flex-wrap justify-center gap-4">

            <a
                href="mailto:email@example.com"
                class="rounded-lg bg-gray-900 px-6 py-3 font-semibold text-white transition hover:bg-blue-600"
            >
                Email Saya
            </a>

            <a
                href="#"
                class="rounded-lg border border-gray-300 px-6 py-3 font-semibold text-gray-700 transition hover:border-gray-900 hover:text-gray-900"
            >
                LinkedIn
            </a>

        </div>

    </div>

</section>

@endsection
