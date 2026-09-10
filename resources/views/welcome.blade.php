<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio - Chols</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- NAVBAR --}}
    <nav class="fixed inset-x-0 top-0 z-50 border-b border-gray-200 bg-white/90 backdrop-blur-md">

        <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-6">

            {{-- Logo --}}
            <a
                href="#home"
                class="shrink-0 text-xl font-bold tracking-tight text-gray-900"
            >
                Chols<span class="text-blue-600">.</span>
            </a>


            {{-- Desktop Menu --}}
            <div class="hidden items-center gap-8 md:flex">

                <a
                    href="#home"
                    class="text-gray-900 transition hover:text-blue-600"
                >
                    Home
                </a>

                <a
                    href="#about"
                    class="text-gray-700 transition hover:text-blue-600"
                >
                    About
                </a>

                <a
                    href="#skills"
                    class="text-gray-700 transition hover:text-blue-600"
                >
                    Skills
                </a>

                <a
                    href="#projects"
                    class="text-gray-700 transition hover:text-blue-600"
                >
                    Projects
                </a>

            </div>


            {{-- Desktop Contact --}}
            <a
                href="#contact"
                class="hidden rounded-full bg-blue-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-700 md:block"
            >
                Let's Talk
            </a>


            {{-- Mobile Menu --}}
            <div class="md:hidden">

                <details class="relative">

                    <summary
                        class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-lg text-gray-700 transition hover:bg-gray-100"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>

                    </summary>


                    {{-- Mobile Dropdown --}}
                    <div
                        class="absolute right-0 mt-3 w-52 rounded-2xl border border-gray-200 bg-white p-2 shadow-xl"
                    >

                        <a
                            href="#home"
                            class="block rounded-lg px-4 py-3 text-gray-700 transition hover:bg-gray-50 hover:text-blue-600"
                        >
                            Home
                        </a>

                        <a
                            href="#about"
                            class="block rounded-lg px-4 py-3 text-gray-700 transition hover:bg-gray-50 hover:text-blue-600"
                        >
                            About
                        </a>

                        <a
                            href="#skills"
                            class="block rounded-lg px-4 py-3 text-gray-700 transition hover:bg-gray-50 hover:text-blue-600"
                        >
                            Skills
                        </a>

                        <a
                            href="#projects"
                            class="block rounded-lg px-4 py-3 text-gray-700 transition hover:bg-gray-50 hover:text-blue-600"
                        >
                            Projects
                        </a>

                        <div class="my-2 border-t border-gray-100"></div>

                        <a
                            href="#contact"
                            class="block rounded-lg bg-blue-600 px-4 py-3 text-center font-semibold text-white transition hover:bg-blue-700"
                        >
                            Let's Talk
                        </a>

                    </div>

                </details>

            </div>

        </div>

    </nav>




    {{-- HERO --}}
    <section id="home" class="min-h-screen flex items-center justify-center px-6 pt-16">

        <div class="max-w-4xl text-center">

            <p class="text-blue-600 font-semibold mb-3">
                Hello, I'm
            </p>

            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Chols
            </h1>

            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 mb-6">
                Fresh Graduate S1 Teknik Informatika
            </h2>

            <p class="max-w-2xl mx-auto text-gray-600 text-lg leading-relaxed mb-8">
                Saya memiliki ketertarikan pada Web Development,
                UI/UX Design, dan Machine Learning.
                Saat ini saya sedang mengembangkan kemampuan
                dalam membangun aplikasi web menggunakan Laravel.
            </p>

            <div class="flex justify-center gap-4">

                <a href="#projects"
                   class="px-6 py-3 bg-blue-600 text-white rounded-lg
                          font-semibold hover:bg-blue-700 transition">
                    Lihat Project
                </a>

                <a href="#contact"
                   class="px-6 py-3 border border-gray-300 rounded-lg
                          font-semibold hover:bg-gray-100 transition">
                    Hubungi Saya
                </a>

            </div>

        </div>

    </section>


    {{-- ABOUT --}}
    <section id="about" class="py-24 px-6 bg-white">

        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-12">

                <p class="text-blue-600 font-semibold mb-2">
                    About Me
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Tentang Saya
                </h2>

            </div>

            <div class="max-w-3xl mx-auto text-center">

                <p class="text-gray-600 leading-relaxed text-lg">
                    Saya merupakan fresh graduate S1 Teknik Informatika
                    yang memiliki minat dalam pengembangan website,
                    UI/UX Design, dan teknologi Machine Learning.
                </p>

                <p class="text-gray-600 leading-relaxed text-lg mt-5">
                    Selama perkuliahan, saya mengembangkan beberapa
                    project seperti aplikasi kasir berbasis Laravel,
                    website profil sekolah, serta penelitian klasifikasi
                    penyakit pada buah kakao menggunakan Convolutional
                    Neural Network.
                </p>

            </div>

        </div>

    </section>


    {{-- SKILLS --}}
    <section id="skills" class="py-24 px-6 bg-gray-50">

        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-12">

                <p class="text-blue-600 font-semibold mb-2">
                    My Skills
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Skills
                </h2>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <h3 class="font-semibold text-gray-900">
                        Laravel
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Web Development
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <h3 class="font-semibold text-gray-900">
                        PHP
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Backend Development
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <h3 class="font-semibold text-gray-900">
                        Tailwind CSS
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Frontend
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <h3 class="font-semibold text-gray-900">
                        UI/UX Design
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Figma
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- PROJECTS --}}
    <section id="projects" class="py-24 px-6 bg-white">

        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-12">

                <p class="text-blue-600 font-semibold mb-2">
                    My Work
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Projects
                </h2>

            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="border border-gray-200 rounded-xl p-6">

                    <h3 class="text-xl font-bold text-gray-900">
                        Website Kasir
                    </h3>

                    <p class="text-gray-600 mt-3">
                        Aplikasi kasir berbasis Laravel dengan fitur
                        transaksi, keranjang, stok barang, dan laporan.
                    </p>

                    <div class="mt-5 text-sm text-blue-600 font-semibold">
                        Laravel • PHP • Tailwind CSS
                    </div>

                </div>


                <div class="border border-gray-200 rounded-xl p-6">

                    <h3 class="text-xl font-bold text-gray-900">
                        Website Profil Sekolah
                    </h3>

                    <p class="text-gray-600 mt-3">
                        Website profil sekolah yang dibuat sebagai
                        project pada mata kuliah Pemrograman Web.
                    </p>

                    <div class="mt-5 text-sm text-blue-600 font-semibold">
                        Web Development
                    </div>

                </div>


                <div class="border border-gray-200 rounded-xl p-6">

                    <h3 class="text-xl font-bold text-gray-900">
                        Klasifikasi Penyakit Buah Kakao
                    </h3>

                    <p class="text-gray-600 mt-3">
                        Project penelitian menggunakan CNN untuk
                        melakukan klasifikasi penyakit pada buah kakao.
                    </p>

                    <div class="mt-5 text-sm text-blue-600 font-semibold">
                        Python • CNN • Machine Learning
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- CONTACT --}}
    <section id="contact" class="py-24 px-6 bg-gray-50">

        <div class="max-w-4xl mx-auto text-center">

            <p class="text-blue-600 font-semibold mb-2">
                Get In Touch
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                Mari Terhubung
            </h2>

            <p class="text-gray-600 mt-5">
                Saya terbuka untuk kesempatan kerja,
                project, maupun kolaborasi di bidang teknologi.
            </p>

            <a href="mailto:email@example.com"
               class="inline-block mt-8 px-6 py-3 bg-blue-600
                      text-white rounded-lg font-semibold
                      hover:bg-blue-700 transition">
                Hubungi Saya
            </a>

        </div>

    </section>


    {{-- FOOTER --}}
    <footer class="py-6 bg-gray-900 text-gray-400 text-center">

        <p>
            © 2026 Chols. All rights reserved.
        </p>

    </footer>

</body>
</html>