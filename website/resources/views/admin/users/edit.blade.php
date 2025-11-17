@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-6">Edit Data User</h3>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password <span class="text-gray-500">(kosongkan
                        jika tidak diubah)</span></label>
                <input type="password" name="password"
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                    <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="pt-4 flex items-center gap-3">
                <button
                    class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                           text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                    <i class="ri-save-2-line mr-1"></i> Update
                </button>
                <a href="{{ route('admin.users.index') }}"
                    class="text-gray-600 hover:text-gray-900 transition-colors">Batal</a>
            </div>
        </form>
    </div>
@endsection
