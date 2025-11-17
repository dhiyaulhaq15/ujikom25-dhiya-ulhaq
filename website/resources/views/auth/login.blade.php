<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen font-sans">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm p-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Login</h2>

        @if ($errors->has('email'))
            <div class="mb-6 flex items-center gap-3 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 flex-shrink-0" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm font-medium">{{ $errors->first('email') }}</p>
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>
            <button
                class="w-full px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                       text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                Login
            </button>
        </form>

        <p class="text-center mt-6 text-sm text-gray-600">
            Belum punya akun?
            <a href="/register" class="text-blue-600 hover:text-blue-800 transition-colors">Daftar</a>
        </p>
    </div>
</body>

</html>
