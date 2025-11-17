<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
    <form method="POST" action="/register">
      @csrf
      <div class="mb-4">
        <label class="block mb-1 font-medium">Nama</label>
        <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
      </div>
      <div class="mb-4">
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
      </div>
      <div class="mb-4">
        <label class="block mb-1 font-medium">Password</label>
        <input type="password" name="password" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
      </div>
      <div class="mb-6">
        <label class="block mb-1 font-medium">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
      </div>
      <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Register</button>
    </form>
    <p class="text-center mt-4 text-sm text-gray-600">
      Sudah punya akun? <a href="/login" class="text-blue-600 hover:underline">Login</a>
    </p>
  </div>
</body>
</html>
