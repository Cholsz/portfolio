<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Projects - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50">

    {{-- Navbar --}}
    <header class="border-b border-gray-200 bg-white">

        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">

            <a href="{{ route('admin.dashboard') }}"
                class="text-xl font-bold tracking-tight text-gray-900">
                Chols<span class="text-blue-600">.</span>
            </a>

            <div class="flex items-center gap-4">

                <a href="{{ route('admin.dashboard') }}"
                    class="text-sm font-medium text-gray-600 hover:text-blue-600">
                    Dashboard
                </a>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </header>


    {{-- Main --}}
    <main class="mx-auto max-w-6xl px-6 py-10">

        <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Projects
                </h1>

                <p class="mt-2 text-gray-500">
                    Kelola project yang tampil pada portfolio.
                </p>
            </div>

            <a href="{{ route('admin.projects.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                + Tambah Project
            </a>

        </div>


        {{-- Success --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif


        {{-- Project List --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            @if($projects->count())

                <div class="divide-y divide-gray-100">

                    @foreach($projects as $project)

                        <div class="flex flex-col gap-5 p-5 md:flex-row md:items-center md:justify-between">

                            <div class="min-w-0">

                                <div class="flex flex-wrap items-center gap-3">

                                    <h2 class="text-lg font-bold text-gray-900">
                                        {{ $project->judul }}
                                    </h2>

                                    @if($project->status)
                                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500">
                                            Nonaktif
                                        </span>
                                    @endif

                                </div>

                                <p class="mt-1 text-sm font-medium text-blue-600">
                                    {{ $project->kategori }}
                                </p>

                                <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500">
                                    {{ $project->deskripsi }}
                                </p>

                            </div>


                            <div class="flex shrink-0 flex-wrap gap-2">

                                {{-- Toggle --}}
                                <form
                                    action="{{ route('admin.projects.toggle-status', $project) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        {{ $project->status ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>

                                </form>


                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.projects.edit', $project) }}"
                                    class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                                    Edit
                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.projects.destroy', $project) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus project ini?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-red-200 px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="px-6 py-16 text-center">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Belum ada project
                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Tambahkan project pertama kamu.
                    </p>

                    <a
                        href="{{ route('admin.projects.create') }}"
                        class="mt-5 inline-flex rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                        + Tambah Project
                    </a>

                </div>

            @endif

        </div>

    </main>

</body>
</html>