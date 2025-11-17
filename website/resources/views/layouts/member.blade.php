<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex">

        <aside
            class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between fixed h-full transition-all duration-300">
            <div>
                <div class="flex items-center justify-center py-6 border-b border-gray-100">
                    <h1 class="text-xl font-bold text-blue-600 tracking-wide flex items-center gap-2">
                        <i class="ri-store-2-line text-2xl"></i> Member Panel
                    </h1>
                </div>
                <nav class="mt-6 px-4 space-y-1">
                    <a href="{{ route('member.dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition">
                        <i class="ri-dashboard-line text-xl"></i> Dashboard
                    </a>
                    <a href="{{ route('member.products.index') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition">
                        <i class="ri-shopping-bag-3-line text-xl"></i> Produk Saya
                    </a>
                    <a href="{{ route('member.transactions') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition">
                        <i class="ri-file-list-3-line text-xl"></i> Transaksi
                    </a>
                </nav>
            </div>
            <div class="px-4 py-4 border-t border-gray-100">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-red-50 text-red-600 hover:text-red-700 transition">
                        <i class="ri-logout-box-line text-xl"></i> Logout
                    </button>
                </form>
            </div>
        </aside>
        <main class="flex-1 ml-64 p-8">
            @yield('content')
        </main>

    </div>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>
