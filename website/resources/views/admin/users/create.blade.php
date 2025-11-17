@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-6">Tambah User Baru</h3>

        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                @error('email')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                @error('password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                    <option value="member" selected>Member</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="pt-4 flex items-center gap-3">
                <button
                    class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                           text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                    <i class="ri-save-2-line mr-1"></i> Simpan
                </button>
                <a href="{{ route('admin.users.index') }}"
                    class="text-gray-600 hover:text-gray-900 transition-colors">Batal</a>
            </div>
        </form>
    </div>
@endsection
