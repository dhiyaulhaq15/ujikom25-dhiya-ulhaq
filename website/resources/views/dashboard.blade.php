<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col items-center justify-center">
  <div class="bg-white shadow-lg rounded-xl p-8 text-center">
    <h2 class="text-2xl font-bold mb-4">Selamat datang, {{ auth()->user()->name }}!</h2>
    <p class="text-gray-600 mb-6">Role: <span class="font-semibold">{{ auth()->user()->role }}</span></p>

    <form method="POST" action="/logout">
      @csrf
      <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Logout</button>
    </form>
  </div>
</body>
</html>
