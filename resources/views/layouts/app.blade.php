<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Import Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <title>@yield('title', 'Portfolio - Chols')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white antialiased">

    {{-- Navbar --}}
    <header class="fixed inset-x-0 top-0 z-50">

        <nav class="navbar border-b border-brand-green bg-gray-100 backdrop-blur-md">

            <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-6">

                {{-- Logo --}}
                <div>
                    <a
                        href="{{ route('home') }}#home"
                        class="font-mono text-xl font-bold tracking-tight text-brand-green"
                    >
                        Chols<span class="text-gray-900">.</span>
                    </a>
                </div>


                {{-- Desktop Menu --}}
                <div class="hidden items-center gap-2 md:flex">

                    {{-- Home --}}
                    <a
                        href="{{ route('home') }}#home"
                        class="btn btn-ghost btn-sm text-gray-700 hover:text-brand-green"
                    >
                        Home
                    </a>

                    {{-- About --}}
                    <a
                        href="{{ route('home') }}#about"
                        class="btn btn-ghost btn-sm text-gray-700 hover:text-brand-green"
                    >
                        About
                    </a>

                    {{-- Pendidikan --}}
                    <a
                        href="{{ route('home') }}#education"
                        class="btn btn-ghost btn-sm text-gray-700 hover:text-brand-green"
                    >
                        Pendidikan
                    </a>

                    {{-- Experience --}}
                    <a
                        href="{{ route('home') }}#experience"
                        class="btn btn-ghost btn-sm text-gray-700 hover:text-brand-green"
                    >
                        Experience
                    </a>

                    {{-- Keahlian --}}
                    <a
                        href="{{ route('home') }}#skills"
                        class="btn btn-ghost btn-sm text-gray-700 hover:text-brand-green"
                    >
                        Keahlian
                    </a>

                    {{-- Projects --}}
                    <a
                        href="{{ route('home') }}#project"
                        class="btn btn-ghost btn-sm text-gray-700 hover:text-brand-green"
                    >
                        Projects
                    </a>

                </div>


                {{-- Desktop Contact --}}
                <div class="hidden md:block">

                    <a
                        href="{{ route('home') }}#contact"
                        class="btn btn-primary btn-sm rounded-full"
                    >
                        Let's Talk
                    </a>

                </div>


                {{-- Mobile Menu --}}
                <div class="md:hidden">

                    <details class="dropdown dropdown-end">

                        <summary class="btn btn-ghost btn-square !text-brand-green">

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
                        <ul
                            class="dropdown-content menu z-[1] mt-3 w-52 rounded-box border border-base-200 bg-brand-light-green p-2 shadow-xl"
                        >

                            {{-- Home --}}
                            <li>
                                <a
                                    href="{{ route('home') }}#home"
                                    class="!text-gray-700 hover:!text-brand-green"
                                >
                                    Home
                                </a>
                            </li>

                            {{-- About --}}
                            <li>
                                <a
                                    href="{{ route('home') }}#about"
                                    class="!text-gray-700 hover:!text-brand-green"
                                >
                                    About
                                </a>
                            </li>

                            {{-- Pendidikan --}}
                            <li>
                                <a
                                    href="{{ route('home') }}#education"
                                    class="!text-gray-700 hover:!text-brand-green"
                                >
                                    Pendidikan
                                </a>
                            </li>

                            {{-- Experience --}}
                            <li>
                                <a
                                    href="{{ route('home') }}#experience"
                                    class="!text-gray-700 hover:!text-brand-green"
                                >
                                    Experience
                                </a>
                            </li>

                            {{-- Keahlian --}}
                            <li>
                                <a
                                    href="{{ route('home') }}#skills"
                                    class="!text-gray-700 hover:!text-brand-green"
                                >
                                    Keahlian
                                </a>
                            </li>

                            {{-- Projects --}}
                            <li>
                                <a
                                    href="{{ route('home') }}#project"
                                    class="!text-gray-700 hover:!text-brand-green"
                                >
                                    Projects
                                </a>
                            </li>

                            {{-- Contact --}}
                            <li class="mt-2 border-t border-base-200 pt-2">
                                <a
                                    href="{{ route('home') }}#contact"
                                    class="bg-brand-green !text-gray-100 hover:bg-brand-light-green"
                                >
                                    Let's Talk
                                </a>
                            </li>

                        </ul>

                    </details>

                </div>

            </div>

        </nav>

    </header>


    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>


    {{-- Footer --}}
    <footer class="border-t border-gray-200 bg-gray-950">

        <div class="mx-auto max-w-6xl px-6 py-3">

            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">

                <p class="text-sm text-gray-400">
                    © {{ date('Y') }} Chols.
                </p>

                

            </div>

        </div>

    </footer>

</body>
</html>