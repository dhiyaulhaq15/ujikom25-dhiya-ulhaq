<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-50 flex h-screen text-gray-900 font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between fixed h-full shadow-sm">
        <div>
            <!-- Logo -->
            <div class="flex items-center justify-center py-6 border-b border-gray-100">
                <h1 class="text-lg font-semibold text-gray-900 tracking-tight flex items-center gap-2">
                    <i class="ri-store-2-line text-2xl text-gray-700"></i>
                    Admin Panel
                </h1>
            </div>

            <nav class="mt-6 px-4 space-y-1">
                <a href="/admin"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <i class="ri-dashboard-line text-lg"></i> Dashboard
                </a>
                <a href="/admin/users"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <i class="ri-user-settings-line text-lg"></i> Kelola Pengguna
                </a>
                <a href="/admin/stores"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <i class="ri-store-3-line text-lg"></i> Data Toko
                </a>
                <a href="/admin/categories"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <i class="ri-price-tag-3-line text-lg"></i> Kategori
                </a>
                <a href="/admin/products"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <i class="ri-shopping-bag-3-line text-lg"></i> Produk
                </a>
                <a href="/admin/transactions"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <i class="ri-file-list-3-line text-lg"></i> Transaksi
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <div class="px-4 py-4 border-t border-gray-100">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 w-full px-3 py-2 rounded-md text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                    <i class="ri-logout-box-line text-lg"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10 overflow-y-auto">
        <!-- Header -->
        <header class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-semibold text-gray-900">@yield('title', 'Dashboard')</h2>
            <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-full shadow-sm">
                <i class="ri-user-3-line text-lg text-gray-600"></i>
                <span class="font-medium text-gray-800">{{ Auth::user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        <!-- Content -->
        <section class="bg-white rounded-xl shadow-sm p-6">
            @yield('content')
        </section>
    </main>

</body>

</html>
