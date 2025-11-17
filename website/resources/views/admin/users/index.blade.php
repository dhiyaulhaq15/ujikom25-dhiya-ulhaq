@extends('layouts.admin')

@section('title', 'Kelola Pengguna')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-2 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                <i class="ri-checkbox-circle-line text-lg"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Daftar Pengguna</h3>
            <a href="{{ route('admin.users.create') }}"
                class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                      text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                <i class="ri-add-line text-lg"></i> Tambah User
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b font-medium text-center">#</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Nama</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Email</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Role</th>
                        <th class="py-3 px-4 border-b font-medium text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $user->name }}</td>
                            <td class="py-3 px-4">{{ $user->email }}</td>
                            <td class="py-3 px-4 capitalize">{{ $user->role }}</td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-blue-600 hover:text-blue-800 transition-colors" title="Edit">
                                        <i class="ri-edit-2-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus user ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors"
                                            title="Hapus">
                                            <i class="ri-delete-bin-6-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
@endsection
