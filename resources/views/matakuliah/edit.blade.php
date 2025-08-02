@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Edit Data Mata Kuliah</h1>
                    <a href="{{ route('matakuliah.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>

                <!-- Show validation errors -->
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

                <form action="{{ route('matakuliah.update', $matakuliah) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kode MK -->
                        <div>
                            <label for="kode_mk" class="block text-sm font-medium text-gray-700 mb-2">
                                Kode Mata Kuliah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="kode_mk" 
                                   id="kode_mk" 
                                   value="{{ old('kode_mk', $matakuliah->kode_mk) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('kode_mk') border-red-500 @enderror"
                                   placeholder="Contoh: TI001"
                                   maxlength="10"
                                   required>
                            @error('kode_mk')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama MK -->
                        <div>
                            <label for="nama_mk" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Mata Kuliah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nama_mk" 
                                   id="nama_mk" 
                                   value="{{ old('nama_mk', $matakuliah->nama_mk) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('nama_mk') border-red-500 @enderror"
                                   placeholder="Contoh: Pemrograman Web"
                                   required>
                            @error('nama_mk')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKS -->
                        <div>
                            <label for="sks" class="block text-sm font-medium text-gray-700 mb-2">
                                SKS <span class="text-red-500">*</span>
                            </label>
                            <select name="sks" 
                                    id="sks" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('sks') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih SKS</option>
                                @for($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}" {{ old('sks', $matakuliah->sks) == $i ? 'selected' : '' }}>{{ $i }} SKS</option>
                                @endfor
                            </select>
                            @error('sks')
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
                                    <option value="{{ $i }}" {{ old('semester', $matakuliah->semester) == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                @endfor
                            </select>
                            @error('semester')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jenis -->
                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Mata Kuliah <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis" 
                                    id="jenis" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('jenis') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih Jenis</option>
                                <option value="Wajib" {{ old('jenis', $matakuliah->jenis) == 'Wajib' ? 'selected' : '' }}>Mata Kuliah Wajib</option>
                                <option value="Pilihan" {{ old('jenis', $matakuliah->jenis) == 'Pilihan' ? 'selected' : '' }}>Mata Kuliah Pilihan</option>
                            </select>
                            @error('jenis')
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
                                <option value="Teknik Informatika" {{ old('jurusan', $matakuliah->jurusan) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                <option value="Sistem Informasi" {{ old('jurusan', $matakuliah->jurusan) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                <option value="Teknik Komputer" {{ old('jurusan', $matakuliah->jurusan) == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
                                <option value="Manajemen Informatika" {{ old('jurusan', $matakuliah->jurusan) == 'Manajemen Informatika' ? 'selected' : '' }}>Manajemen Informatika</option>
                                <option value="Teknik Elektro" {{ old('jurusan', $matakuliah->jurusan) == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                                <option value="Akuntansi" {{ old('jurusan', $matakuliah->jurusan) == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                            </select>
                            @error('jurusan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dosen Pengampu -->
                        <div>
                            <label for="dosen_pengampu" class="block text-sm font-medium text-gray-700 mb-2">
                                Dosen Pengampu
                            </label>
                            <input type="text" 
                                   name="dosen_pengampu" 
                                   id="dosen_pengampu" 
                                   value="{{ old('dosen_pengampu', $matakuliah->dosen_pengampu) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('dosen_pengampu') border-red-500 @enderror"
                                   placeholder="Contoh: Dr. Budi Santoso, M.Kom">
                            @error('dosen_pengampu')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ruang Kelas -->
                        <div>
                            <label for="ruang_kelas" class="block text-sm font-medium text-gray-700 mb-2">
                                Ruang Kelas
                            </label>
                            <input type="text" 
                                   name="ruang_kelas" 
                                   id="ruang_kelas" 
                                   value="{{ old('ruang_kelas', $matakuliah->ruang_kelas) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('ruang_kelas') border-red-500 @enderror"
                                   placeholder="Contoh: Lab Komputer 1">
                            @error('ruang_kelas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Hari -->
                        <div>
                            <label for="hari" class="block text-sm font-medium text-gray-700 mb-2">
                                Hari
                            </label>
                            <select name="hari" 
                                    id="hari" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('hari') border-red-500 @enderror">
                                <option value="">Pilih Hari</option>
                                <option value="Senin" {{ old('hari', $matakuliah->hari) == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ old('hari', $matakuliah->hari) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ old('hari', $matakuliah->hari) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ old('hari', $matakuliah->hari) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ old('hari', $matakuliah->hari) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ old('hari', $matakuliah->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            </select>
                            @error('hari')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jam Mulai -->
                        <div>
                            <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                                Jam Mulai
                            </label>
                            <input type="time" 
                                   name="jam_mulai" 
                                   id="jam_mulai" 
                                   value="{{ old('jam_mulai', $matakuliah->jam_mulai ? date('H:i', strtotime($matakuliah->jam_mulai)) : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('jam_mulai') border-red-500 @enderror">
                            @error('jam_mulai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jam Selesai -->
                        <div>
                            <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                                Jam Selesai
                            </label>
                            <input type="time" 
                                   name="jam_selesai" 
                                   id="jam_selesai" 
                                   value="{{ old('jam_selesai', $matakuliah->jam_selesai ? date('H:i', strtotime($matakuliah->jam_selesai)) : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('jam_selesai') border-red-500 @enderror">
                            @error('jam_selesai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-6">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Mata Kuliah
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('deskripsi') border-red-500 @enderror"
                                  placeholder="Contoh: Mata kuliah ini membahas tentang konsep dasar pemrograman web, HTML, CSS, JavaScript, dan framework web modern...">{{ old('deskripsi', $matakuliah->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Dosen -->
                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Dosen Pengampu
                        </label>
                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        @if ($matakuliah->foto)
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Saat Ini:</label>
                                <img src="{{ asset('storage/' . $matakuliah->foto) }}" alt="Foto Dosen" class="max-w-xs rounded shadow border">
                            </div>
                        @endif
                    </div>



                    {{-- <!-- Tampilkan dokumen sebelumnya -->
                    @if($matakuliah->dokumen)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dokumen Saat Ini</label>
                            <a href="{{ asset('storage/' . $matakuliah->dokumen) }}" target="_blank" class="text-blue-600 underline">
                                Lihat / Unduh Dokumen Lama
                            </a>
                        </div>
                    @endif --}}


                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-6 space-x-3">
                        <a href="{{ route('matakuliah.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection