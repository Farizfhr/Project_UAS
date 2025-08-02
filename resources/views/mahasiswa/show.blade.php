@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Detail Data Mahasiswa</h1>
                    <div class="flex space-x-2">
                        <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" 
                           class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Edit Data
                        </a>
                        <a href="{{ route('mahasiswa.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NIM -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">NIM</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $mahasiswa->nim }}</p>
                        </div>

                        <!-- Nama -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $mahasiswa->nama }}</p>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                            <p class="text-lg text-gray-900">{{ $mahasiswa->email }}</p>
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                            <p class="text-lg text-gray-900">{{ $mahasiswa->jurusan }}</p>
                        </div>

                        <!-- Semester -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Semester</label>
                            <p class="text-lg text-gray-900">Semester {{ $mahasiswa->semester }}</p>
                        </div>

                        <!-- No HP -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">No. HP</label>
                            <p class="text-lg text-gray-900">{{ $mahasiswa->no_hp ?: '-' }}</p>
                        </div>
                    </div>

                    <!-- Foto Mahasiswa -->
                    @if ($mahasiswa->foto)
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Foto Mahasiswa</label>
                        <img src="{{ asset('storage/' . $mahasiswa->foto) }}" 
                            alt="Foto {{ $mahasiswa->nama }}" 
                            class="w-32 h-32 object-cover rounded-lg shadow">
                    </div>
                    @endif

                    <!-- Alamat -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Alamat</label>
                        <p class="text-lg text-gray-900">{{ $mahasiswa->alamat ?: '-' }}</p>
                    </div>

                    <!-- Timestamps -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Dibuat</label>
                                <p class="text-sm text-gray-900">{{ $mahasiswa->created_at->format('d F Y, H:i') }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Terakhir Diupdate</label>
                                <p class="text-sm text-gray-900">{{ $mahasiswa->updated_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-between items-center">
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" 
                          method="POST" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa {{ $mahasiswa->nama }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Hapus Data
                        </button>
                    </form>

                    <div class="flex space-x-2">
                        <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" 
                           class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Edit Data
                        </a>
                        <a href="{{ route('mahasiswa.index') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection