@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Detail Mata Kuliah</h1>
                    <div class="flex space-x-2">
                        <a href="{{ route('matakuliah.edit', $matakuliah) }}" 
                           class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Edit Data
                        </a>
                        <a href="{{ route('matakuliah.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kode MK -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Kode Mata Kuliah</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $matakuliah->kode_mk }}</p>
                        </div>

                        <!-- Nama MK -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Mata Kuliah</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $matakuliah->nama_mk }}</p>
                        </div>

                        <!-- SKS -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah SKS</label>
                            <p class="text-lg text-gray-900">{{ $matakuliah->sks }} SKS</p>
                        </div>

                        <!-- Semester -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Semester</label>
                            <p class="text-lg text-gray-900">Semester {{ $matakuliah->semester }}</p>
                        </div>

                        <!-- Dosen Pengampu -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Dosen Pengampu</label>
                            <p class="text-lg text-gray-900">{{ $matakuliah->dosen_pengampu ?: '-' }}</p>
                        </div>
                    </div>

                    <!-- Foto Dosen -->
                    @if ($matakuliah->foto)
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Foto Dosen Pengampu</label>
                        <img src="{{ asset('storage/' . $matakuliah->foto) }}" 
                             alt="Foto Dosen" 
                             class="w-32 h-32 object-cover rounded-lg shadow">
                    </div>
                    @endif

                    <!-- Deskripsi -->
                    @if ($matakuliah->deskripsi)
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Deskripsi</label>
                        <p class="text-lg text-gray-900 whitespace-pre-line">{{ $matakuliah->deskripsi }}</p>
                    </div>
                    @endif

                    <!-- Timestamps -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Dibuat</label>
                                <p class="text-sm text-gray-900">{{ $matakuliah->created_at->format('d F Y, H:i') }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Terakhir Diupdate</label>
                                <p class="text-sm text-gray-900">{{ $matakuliah->updated_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-between items-center">
                    <form action="{{ route('matakuliah.destroy', $matakuliah) }}" 
                          method="POST" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mata kuliah {{ $matakuliah->nama_mk }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Hapus Data
                        </button>
                    </form>

                    <div class="flex space-x-2">
                        <a href="{{ route('matakuliah.edit', $matakuliah) }}" 
                           class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Edit Data
                        </a>
                        <a href="{{ route('matakuliah.index') }}" 
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
