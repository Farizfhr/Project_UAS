@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Tambah Data Mahasiswa</h1>
                    <a href="{{ route('mahasiswa.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda:
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mahasiswa.store') }}" method="POST" id="mahasiswaForm" enctype="multipart/form-data">
                     @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NIM -->
                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">
                                NIM <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nim" 
                                   id="nim" 
                                   value="{{ old('nim') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('nim') border-red-500 @enderror"
                                   placeholder="Contoh: TI2023001"
                                   required>
                            @error('nim')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   value="{{ old('nama') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('nama') border-red-500 @enderror"
                                   placeholder="Contoh: Budi Santoso"
                                   required>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   value="{{ old('email') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                   placeholder="Contoh: budi@email.com"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">
                                Jurusan <span class="text-red-500">*</span>
                            </label>
                            <select name="jurusan" 
                                    id="jurusan" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('jurusan') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih Jurusan</option>
                                <option value="Teknik Informatika" {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                <option value="Sistem Informasi" {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                <option value="Teknik Komputer" {{ old('jurusan') == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
                                <option value="Manajemen Informatika" {{ old('jurusan') == 'Manajemen Informatika' ? 'selected' : '' }}>Manajemen Informatika</option>
                                <option value="Teknik Elektro" {{ old('jurusan') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                                <option value="Akuntansi" {{ old('jurusan') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                            </select>
                            @error('jurusan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Semester -->
                        <div>
                            <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">
                                Semester <span class="text-red-500">*</span>
                            </label>
                            <select name="semester" 
                                    id="semester" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('semester') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih Semester</option>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                @endfor
                            </select>
                            @error('semester')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No HP -->
                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">
                                No. HP
                            </label>
                            <input type="text" 
                                   name="no_hp" 
                                   id="no_hp" 
                                   value="{{ old('no_hp') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('no_hp') border-red-500 @enderror"
                                   placeholder="Contoh: 08123456789">
                            @error('no_hp')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Upload Foto -->
                    <div class="mt-6">
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                            Upload Foto Dosen
                        </label>
                        <input type="file" 
                            name="foto" 
                            id="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('foto') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Hanya file gambar (.jpg, .jpeg, .png, .webp) maks 2MB.</p>
                        @error('foto')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mt-6">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat
                        </label>
                        <textarea name="alamat" 
                                  id="alamat" 
                                  rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('alamat') border-red-500 @enderror"
                                  placeholder="Contoh: Jl. Merdeka No. 123, Semarang">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-600">
                            <span class="text-red-500">*</span> Field wajib diisi
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('mahasiswa.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" 
                                    name="save_and_add"
                                    value="1"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Simpan & Tambah Lagi
                            </button>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan & Selesai
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Tips -->
                <div class="mt-8 p-4 bg-gray-100 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Tips Menambah Data:</h3>
                    <ul class="text-sm text-gray-600 list-disc list-inside">
                        <li>NIM boleh mengandung huruf dan angka, dan harus unik</li>
                        <li>Email harus valid dan unik</li>
                        <li>Setelah menyimpan, Anda bisa langsung menambah data lagi</li>
                        <li>Data dapat diedit kapan saja setelah disimpan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
// Hapus spasi di NIM
document.getElementById('nim').addEventListener('input', function(e) {
    this.value = this.value.replace(/\s/g, '');
});

// Format nomor HP hanya angka dan plus
document.getElementById('no_hp').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9+]/g, '');
});

// Capitalize nama
document.getElementById('nama').addEventListener('input', function(e) {
    this.value = this.value.replace(/\b\w/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
});
</script>
@endsection
