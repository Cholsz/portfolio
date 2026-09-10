
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengalaman - Admin</title>

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

                <a href="{{ route('admin.experiences.index') }}"
                    class="text-sm font-medium text-gray-600 hover:text-blue-600">
                    Experiences
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
    <main class="mx-auto max-w-3xl px-6 py-10">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.experiences.index') }}"
                class="text-sm font-medium text-blue-600 hover:text-blue-700">
                ← Kembali ke Experiences
            </a>

            <h1 class="mt-4 text-3xl font-bold text-gray-900">
                Tambah Pengalaman
            </h1>

            <p class="mt-2 text-gray-500">
                Tambahkan organisasi, pelatihan, atau pencapaian.
            </p>

        </div>


        {{-- Validation Error --}}
        @if($errors->any())

            <div class="mb-6 rounded-xl bg-red-50 px-5 py-4 text-sm text-red-700">

                <p class="font-semibold">
                    Terdapat kesalahan:
                </p>

                <ul class="mt-2 list-disc space-y-1 pl-5">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ route('admin.experiences.store') }}"
            method="POST"
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            @csrf


            {{-- Type --}}
            <div class="mb-5">

                <label
                    for="type"
                    class="mb-2 block text-sm font-semibold text-gray-700">
                    Jenis Pengalaman
                </label>

                <select
                    id="type"
                    name="type"
                    required
                    class="select select-bordered w-full">

                    <option value="" disabled {{ old('type') ? '' : 'selected' }}>
                        Pilih jenis pengalaman
                    </option>

                    <option
                        value="organisasi"
                        {{ old('type') === 'organisasi' ? 'selected' : '' }}>
                        Organisasi
                    </option>

                    <option
                        value="pelatihan"
                        {{ old('type') === 'pelatihan' ? 'selected' : '' }}>
                        Pelatihan
                    </option>

                    <option
                        value="pencapaian"
                        {{ old('type') === 'pencapaian' ? 'selected' : '' }}>
                        Pencapaian
                    </option>

                </select>

            </div>


            {{-- Judul --}}
            <div class="mb-5">

                <label
                    for="judul"
                    class="mb-2 block text-sm font-semibold text-gray-700">
                    Judul
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Anggota Himpunan Mahasiswa Informatika"
                    required
                    class="input input-bordered w-full">

            </div>


            {{-- Institusi --}}
            <div class="mb-5">

                <label
                    for="institusi"
                    class="mb-2 block text-sm font-semibold text-gray-700">
                    Institusi / Organisasi
                </label>

                <input
                    type="text"
                    id="institusi"
                    name="institusi"
                    value="{{ old('institusi') }}"
                    placeholder="Contoh: Universitas ..."
                    class="input input-bordered w-full">

            </div>


            {{-- Deskripsi --}}
            <div class="mb-5">

                <label
                    for="deskripsi"
                    class="mb-2 block text-sm font-semibold text-gray-700">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="5"
                    placeholder="Jelaskan pengalaman atau kegiatan..."
                    class="textarea textarea-bordered w-full">{{ old('deskripsi') }}</textarea>

            </div>


            {{-- Dates --}}
            <div class="mb-5 grid gap-5 sm:grid-cols-2">

                <div>

                    <label
                        for="tanggal_mulai"
                        class="mb-2 block text-sm font-semibold text-gray-700">
                        Tanggal Mulai
                    </label>

                    <input
                        type="date"
                        id="tanggal_mulai"
                        name="tanggal_mulai"
                        value="{{ old('tanggal_mulai') }}"
                        class="input input-bordered w-full">

                </div>


                <div>

                    <label
                        for="tanggal_selesai"
                        class="mb-2 block text-sm font-semibold text-gray-700">
                        Tanggal Selesai
                    </label>

                    <input
                        type="date"
                        id="tanggal_selesai"
                        name="tanggal_selesai"
                        value="{{ old('tanggal_selesai') }}"
                        class="input input-bordered w-full">

                </div>

            </div>


            {{-- Gambar --}}
            <div class="mb-5">

                <label
                    for="gambar"
                    class="mb-2 block text-sm font-semibold text-gray-700">
                    Gambar
                </label>

                <input
                    type="text"
                    id="gambar"
                    name="gambar"
                    value="{{ old('gambar') }}"
                    placeholder="Contoh: organisasi.jpg"
                    class="input input-bordered w-full">

                <p class="mt-2 text-xs text-gray-400">
                    Untuk sementara masukkan nama/path gambar. Upload gambar kita kerjakan setelah fungsi dasar berhasil.
                </p>

            </div>


            {{-- Urutan --}}
            <div class="mb-5">

                <label
                    for="urutan"
                    class="mb-2 block text-sm font-semibold text-gray-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="urutan"
                    name="urutan"
                    value="{{ old('urutan', 0) }}"
                    min="0"
                    class="input input-bordered w-full">

                <p class="mt-2 text-xs text-gray-400">
                    Semakin kecil angka, semakin awal ditampilkan.
                </p>

            </div>


            {{-- Status --}}
            <div class="mb-8">

                <label class="flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        class="checkbox checkbox-primary"
                        {{ old('status', true) ? 'checked' : '' }}>

                    <span class="text-sm font-medium text-gray-700">
                        Tampilkan di portfolio
                    </span>

                </label>

            </div>


            {{-- Buttons --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('admin.experiences.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-3 text-center text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                    Simpan Pengalaman
                </button>

            </div>

        </form>

    </main>

</body>
</html>

