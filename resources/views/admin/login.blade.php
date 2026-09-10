
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - Chols</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-gray-50 px-6">

    <div class="w-full max-w-md">

        <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

            <div class="text-center">

                <h1 class="text-2xl font-bold text-gray-900">
                    Chols<span class="text-blue-600">.</span>
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Admin Login
                </p>

            </div>


            {{-- Success Message --}}
            @if (session('success'))
                <div class="mt-6 rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Error Message --}}
            @if (session('error'))
                <div class="mt-6 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif


            <form
                action="{{ route('admin.login.submit') }}"
                method="POST"
                class="mt-8 space-y-5"
            >

                @csrf


                {{-- Email --}}
                <div>

                    <label
                        for="email"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Email
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                        placeholder="admin@example.com"
                    >

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Password --}}
                <div>

                    <label
                        for="password"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                        placeholder="••••••••"
                    >

                </div>


                {{-- Login Button --}}
                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700"
                >
                    Login
                </button>

            </form>

        </div>

        <p class="mt-6 text-center text-xs text-gray-400">
            © {{ date('Y') }} Chols
        </p>

    </div>

</body>
</html>

