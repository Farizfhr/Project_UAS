@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <!-- Floating Particles Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-4 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute -top-4 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-8xl mx-auto relative z-10">
        <!-- Hero Header Section -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 p-8 mb-8 shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 backdrop-blur-sm"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-10 left-10 w-20 h-20 border border-white/20 rounded-full animate-pulse"></div>
                <div class="absolute top-20 right-20 w-16 h-16 border border-white/10 rounded-full animate-pulse animation-delay-1000"></div>
                <div class="absolute bottom-10 left-1/3 w-12 h-12 border border-white/15 rounded-full animate-pulse animation-delay-2000"></div>
            </div>
            
            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                    <div class="flex items-center gap-6">
                        <!-- Elegant Dashboard Button -->
                        <a href="{{ route('dashboard') }}" 
                           class="group relative overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/20 transition-all duration-500 hover:scale-105 hover:shadow-2xl">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-white/10 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                            <div class="relative flex items-center gap-3">
                                <div class="p-2 bg-gradient-to-br from-blue-400 to-purple-500 rounded-xl shadow-lg group-hover:shadow-blue-500/25 transition-all duration-300">
                                    <i class="fas fa-home text-white text-lg transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                                </div>
                                <div class="hidden sm:block">
                                    <span class="text-white font-semibold text-sm">Kembali ke</span>
                                    <div class="text-white/90 text-xs">Dashboard</div>
                                </div>
                            </div>
                        </a>
                        
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <div class="p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-xl">
                                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                                </div>
                                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tight">
                                    Data Mata Kuliah
                                </h1>
                            </div>
                            <p class="text-blue-100 text-lg font-medium ml-16">Kelola kurikulum akademik dengan elegan</p>
                        </div>
                    </div>
                    
                    <!-- Premium Add Button -->
                    <a href="{{ route('matakuliah.create') }}" 
                       class="group relative overflow-hidden bg-gradient-to-r from-emerald-400 via-blue-500 to-purple-600 p-[2px] rounded-2xl hover:shadow-2xl hover:shadow-blue-500/25 transition-all duration-500">
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 via-blue-500 to-purple-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                        <div class="relative bg-gray-900 rounded-2xl px-8 py-4 transition duration-200 group-hover:bg-transparent">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white/10 rounded-xl group-hover:bg-white/20 transition-all duration-300">
                                    <i class="fas fa-plus text-white text-lg transform group-hover:rotate-90 transition-transform duration-300"></i>
                                </div>
                                <span class="text-white font-bold text-lg">Tambah Mata Kuliah</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="mb-8 relative overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-50 via-green-50 to-teal-50 border border-emerald-200/50 shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-100/50 to-green-100/50 animate-pulse"></div>
                <div class="relative p-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-gradient-to-br from-emerald-400 to-green-500 rounded-2xl shadow-lg">
                            <i class="fas fa-check-circle text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-emerald-800 font-bold text-lg">Berhasil!</h3>
                            <p class="text-emerald-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($matakuliahs->count() > 0)
            <!-- Premium Stats Dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Courses -->
                <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-6 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 border border-blue-100/50">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-4 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl group-hover:shadow-blue-500/25 transition-all duration-300">
                                <i class="fas fa-book-open text-white text-2xl"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-black text-blue-600 group-hover:scale-110 transition-transform duration-300">{{ $matakuliahs->total() }}</div>
                                <div class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Total</div>
                            </div>
                        </div>
                        <div class="text-blue-700 font-bold">Total Mata Kuliah</div>
                        <div class="text-blue-600 text-sm">Seluruh kurikulum aktif</div>
                    </div>
                </div>

                <!-- Mandatory Courses -->
                <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 p-6 hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-500 border border-red-100/50">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-red-500/10 to-pink-500/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-4 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-xl group-hover:shadow-red-500/25 transition-all duration-300">
                                <i class="fas fa-exclamation-circle text-white text-2xl"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-black text-red-600 group-hover:scale-110 transition-transform duration-300">{{ $matakuliahs->where('jenis', 'Wajib')->count() }}</div>
                                <div class="text-red-500 font-semibold text-sm uppercase tracking-wider">Wajib</div>
                            </div>
                        </div>
                        <div class="text-red-700 font-bold">Mata Kuliah Wajib</div>
                        <div class="text-red-600 text-sm">Kurikulum fundamental</div>
                    </div>
                </div>

                <!-- Elective Courses -->
                <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 p-6 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500 border border-emerald-100/50">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-emerald-500/10 to-green-500/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-4 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl shadow-xl group-hover:shadow-emerald-500/25 transition-all duration-300">
                                <i class="fas fa-star text-white text-2xl"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-black text-emerald-600 group-hover:scale-110 transition-transform duration-300">{{ $matakuliahs->where('jenis', 'Pilihan')->count() }}</div>
                                <div class="text-emerald-500 font-semibold text-sm uppercase tracking-wider">Pilihan</div>
                            </div>
                        </div>
                        <div class="text-emerald-700 font-bold">Mata Kuliah Pilihan</div>
                        <div class="text-emerald-600 text-sm">Kurikulum fleksibel</div>
                    </div>
                </div>

                <!-- Total Credits -->
                <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-50 p-6 hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-500 border border-amber-100/50">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-amber-500/10 to-orange-500/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-4 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl shadow-xl group-hover:shadow-amber-500/25 transition-all duration-300">
                                <i class="fas fa-calculator text-white text-2xl"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-black text-amber-600 group-hover:scale-110 transition-transform duration-300">{{ $matakuliahs->sum('sks') }}</div>
                                <div class="text-amber-500 font-semibold text-sm uppercase tracking-wider">SKS</div>
                            </div>
                        </div>
                        <div class="text-amber-700 font-bold">Total SKS</div>
                        <div class="text-amber-600 text-sm">Beban studi keseluruhan</div>
                    </div>
                </div>
            </div>

            <!-- Premium Data Table -->
            <div class="relative overflow-hidden rounded-3xl bg-white/70 backdrop-blur-xl border border-white/20 shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-white/40 via-white/20 to-white/10"></div>
                <div class="relative">
                    <!-- Table Header -->
                    <div class="px-8 py-6 bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 rounded-t-3xl">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <div class="p-2 bg-white/20 rounded-xl">
                                <i class="fas fa-table text-white"></i>
                            </div>
                            Daftar Mata Kuliah
                        </h2>
                        <p class="text-blue-100 mt-1">Kelola seluruh data mata kuliah dengan mudah</p>
                    </div>

                    <!-- Table Content -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200/50">
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-hashtag text-blue-500"></i>
                                            No
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-barcode text-indigo-500"></i>
                                            Kode MK
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-book text-purple-500"></i>
                                            Mata Kuliah
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-calculator text-green-500"></i>
                                            SKS
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-calendar-alt text-blue-500"></i>
                                            Semester
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-tags text-red-500"></i>
                                            Jenis
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-university text-indigo-500"></i>
                                            Jurusan
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-chalkboard-teacher text-orange-500"></i>
                                            Dosen
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-clock text-teal-500"></i>
                                            Jadwal
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-center">
                                        <div class="flex items-center justify-center gap-2 text-xs font-black text-gray-700 uppercase tracking-wider">
                                            <i class="fas fa-cogs text-gray-500"></i>
                                            Aksi
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/50">
                                @foreach($matakuliahs as $index => $matakuliah)
                                <tr class="group hover:bg-gradient-to-r hover:from-blue-50/50 hover:via-indigo-50/30 hover:to-purple-50/50 transition-all duration-300">
                                    <!-- Number -->
                                    <td class="px-6 py-6">
                                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-lg group-hover:shadow-blue-500/25 transition-all duration-300">
                                            <span class="text-white font-black text-sm">{{ $matakuliahs->firstItem() + $index }}</span>
                                        </div>
                                    </td>

                                    <!-- Course Code -->
                                    <td class="px-6 py-6">
                                        <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl border border-gray-300/50 shadow-sm">
                                            <span class="text-gray-800 font-mono font-bold text-sm">{{ $matakuliah->kode_mk }}</span>
                                        </div>
                                    </td>

                                    <!-- Course Name -->
                                    <td class="px-6 py-6">
                                        <div class="max-w-xs">
                                            <h3 class="text-gray-900 font-bold text-sm leading-tight mb-1">{{ $matakuliah->nama_mk }}</h3>
                                            <p class="text-gray-500 text-xs">Mata Kuliah {{ $matakuliah->jenis }}</p>
                                        </div>
                                    </td>

                                    <!-- SKS -->
                                    <td class="px-6 py-6">
                                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-xl border border-blue-200/50 shadow-sm">
                                            <i class="fas fa-calculator text-blue-600 text-xs"></i>
                                            <span class="text-blue-800 font-black text-sm">{{ $matakuliah->sks }}</span>
                                            <span class="text-blue-600 font-medium text-xs">SKS</span>
                                        </div>
                                    </td>

                                    <!-- Semester -->
                                    <td class="px-6 py-6">
                                        <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-xl border border-indigo-200/50 shadow-sm">
                                            <span class="text-indigo-800 font-black text-sm">{{ $matakuliah->semester }}</span>
                                        </div>
                                    </td>

                                    <!-- Type -->
                                    <td class="px-6 py-6">
                                        @if($matakuliah->jenis == 'Wajib')
                                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-red-100 to-pink-100 rounded-xl border border-red-200/50 shadow-sm">
                                                <i class="fas fa-exclamation-circle text-red-600 text-xs"></i>
                                                <span class="text-red-800 font-bold text-sm">Wajib</span>
                                            </div>
                                        @else
                                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-100 to-green-100 rounded-xl border border-emerald-200/50 shadow-sm">
                                                <i class="fas fa-star text-emerald-600 text-xs"></i>
                                                <span class="text-emerald-800 font-bold text-sm">Pilihan</span>
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Department -->
                                    <td class="px-6 py-6">
                                        <span class="text-gray-700 font-medium text-sm">{{ $matakuliah->jurusan }}</span>
                                    </td>

                                    <!-- Instructor -->
                                    <td class="px-6 py-6">
                                        @if($matakuliah->dosen_pengampu)
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                                    <span class="text-white font-bold text-sm">{{ strtoupper(substr($matakuliah->dosen_pengampu, 0, 1)) }}</span>
                                                </div>
                                                <div>
                                                    <div class="text-gray-900 font-semibold text-sm">{{ $matakuliah->dosen_pengampu }}</div>
                                                    <div class="text-gray-500 text-xs">Dosen Pengampu</div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-gray-400 italic text-sm">Belum ditentukan</div>
                                        @endif
                                    </td>

                                    <!-- Schedule -->
                                    <td class="px-6 py-6">
                                        @if($matakuliah->hari)
                                            <div class="space-y-2">
                                                <div class="flex items-center gap-2 text-sm">
                                                    <i class="fas fa-calendar-day text-blue-500 text-xs"></i>
                                                    <span class="text-gray-900 font-semibold">{{ $matakuliah->hari }}</span>
                                                </div>
                                                @if($matakuliah->jam_mulai && $matakuliah->jam_selesai)
                                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                                        <i class="fas fa-clock text-green-500"></i>
                                                        <span>{{ date('H:i', strtotime($matakuliah->jam_mulai)) }} - {{ date('H:i', strtotime($matakuliah->jam_selesai)) }}</span>
                                                    </div>
                                                @endif
                                                @if($matakuliah->ruang_kelas)
                                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                                        <i class="fas fa-map-marker-alt text-red-500"></i>
                                                        <span>{{ $matakuliah->ruang_kelas }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <div class="text-gray-400 italic text-sm">Belum dijadwalkan</div>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- View Button -->
                                            <a href="{{ route('matakuliah.show', $matakuliah) }}" 
                                               class="group relative overflow-hidden p-3 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl shadow-lg hover:shadow-emerald-500/25 transition-all duration-300 hover:scale-110">
                                                <i class="fas fa-eye text-white text-sm group-hover:scale-110 transition-transform duration-300"></i>
                                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('matakuliah.edit', $matakuliah) }}" 
                                               class="group relative overflow-hidden p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg hover:shadow-blue-500/25 transition-all duration-300 hover:scale-110">
                                                <i class="fas fa-edit text-white text-sm group-hover:scale-110 transition-transform duration-300"></i>
                                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('matakuliah.destroy', $matakuliah) }}" 
                                                  method="POST" 
                                                  class="inline"
                                                  onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus mata kuliah {{ $matakuliah->nama_mk }}?\n\n🔥 Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait!')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="group relative overflow-hidden p-3 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl shadow-lg hover:shadow-red-500/25 transition-all duration-300 hover:scale-110">
                                                    <i class="fas fa-trash text-white text-sm group-hover:scale-110 transition-transform duration-300"></i>
                                                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Premium Pagination -->
                    <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-blue-50 rounded-b-3xl border-t border-gray-200/50">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-info-circle text-blue-500"></i>
                                <span>Menampilkan <strong class="text-gray-900">{{ $matakuliahs->firstItem() }}</strong> sampai <strong class="text-gray-900">{{ $matakuliahs->lastItem() }}</strong> dari <strong class="text-gray-900">{{ $matakuliahs->total() }}</strong> mata kuliah</span>
                            </div>
                            <div class="flex items-center gap-2">
                                {{ $matakuliahs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Ultra Premium Empty State -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-16 text-center shadow-2xl border border-blue-100/50">
                <div class="absolute inset-0 bg-gradient-to-br from-white/40 via-white/20 to-white/10"></div>
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute top-10 left-10 w-20 h-20 border-2 border-blue-200 rounded-full animate-pulse"></div>
                    <div class="absolute top-20 right-20 w-16 h-16 border-2 border-purple-200 rounded-full animate-pulse animation-delay-1000"></div>
                    <div class="absolute bottom-10 left-1/3 w-12 h-12 border-2 border-pink-200 rounded-full animate-pulse animation-delay-2000"></div>
                </div>
                
                <div class="relative z-10">
                    <!-- Empty State Icon -->
                    <div class="mb-8">
                        <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-3xl shadow-2xl mb-6 animate-bounce">
                            <i class="fas fa-book-open text-white text-5xl"></i>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-4xl font-black text-gray-900 leading-tight">
                                Belum Ada Data<br>
                                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Mata Kuliah</span>
                            </h3>
                            <p class="text-xl text-gray-600 font-medium max-w-2xl mx-auto leading-relaxed">
                                Mulai membangun kurikulum akademik yang komprehensif dengan menambahkan mata kuliah pertama Anda. 
                                Kelola seluruh program studi dengan mudah dan efisien.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                        <!-- Primary CTA -->
                        <a href="{{ route('matakuliah.create') }}" 
                           class="group relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 p-[3px] rounded-2xl hover:shadow-2xl hover:shadow-blue-500/25 transition-all duration-500 transform hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                            <div class="relative bg-white rounded-2xl px-12 py-6 transition duration-200 group-hover:bg-transparent">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-xl group-hover:bg-white/20 transition-all duration-300">
                                        <i class="fas fa-plus text-white text-2xl transform group-hover:rotate-90 transition-transform duration-300"></i>
                                    </div>
                                    <div class="text-left">
                                        <div class="text-gray-900 group-hover:text-white font-black text-xl transition-colors duration-300">
                                            Tambah Mata Kuliah
                                        </div>
                                        <div class="text-gray-600 group-hover:text-white/80 text-sm font-medium transition-colors duration-300">
                                            Buat mata kuliah pertama
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Secondary CTA -->
                        <a href="{{ route('dashboard') }}" 
                           class="group relative overflow-hidden bg-white/80 backdrop-blur-md border-2 border-gray-200 rounded-2xl px-12 py-6 hover:bg-white hover:border-gray-300 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-gradient-to-br from-gray-500 to-gray-700 rounded-2xl shadow-lg group-hover:shadow-gray-500/25 transition-all duration-300">
                                    <i class="fas fa-arrow-left text-white text-xl transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-gray-900 font-black text-xl">Kembali ke Dashboard</div>
                                    <div class="text-gray-600 text-sm font-medium">Lihat menu utama</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/40 shadow-lg">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">
                                <i class="fas fa-graduation-cap text-white text-2xl"></i>
                            </div>
                            <h4 class="text-gray-900 font-bold text-lg mb-2">Kurikulum Terstruktur</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">Kelola mata kuliah wajib dan pilihan dengan sistem yang terorganisir</p>
                        </div>
                        
                        <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/40 shadow-lg">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">
                                <i class="fas fa-calendar-alt text-white text-2xl"></i>
                            </div>
                            <h4 class="text-gray-900 font-bold text-lg mb-2">Penjadwalan Mudah</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">Atur jadwal kuliah, ruangan, dan dosen pengampu dengan praktis</p>
                        </div>
                        
                        <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/40 shadow-lg">
                            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">
                                <i class="fas fa-chart-line text-white text-2xl"></i>
                            </div>
                            <h4 class="text-gray-900 font-bold text-lg mb-2">Laporan Lengkap</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">Dapatkan analisis dan statistik kurikulum secara real-time</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Enhanced Custom Styles for Ultra Premium Design */
.glass {
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}

/* Floating Animations */
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}

@keyframes tilt {
    0%, 50%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(1deg); }
    75% { transform: rotate(-1deg); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animate-tilt {
    animation: tilt 10s infinite linear;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.animation-delay-1000 {
    animation-delay: 1s;
}

/* Premium Hover Effects */
.hover\:scale-105:hover {
    transform: scale(1.05);
}

.hover\:scale-110:hover {
    transform: scale(1.10);
}

/* Enhanced Table Styling */
table tbody tr:nth-child(even) {
    background: linear-gradient(90deg, rgba(59, 130, 246, 0.02), rgba(139, 92, 246, 0.02));
}

table tbody tr:hover {
    background: linear-gradient(90deg, rgba(59, 130, 246, 0.08), rgba(139, 92, 246, 0.08));
}

/* Premium Pagination Styling */
.pagination {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.pagination a,
.pagination span {
    padding: 0.75rem 1rem;
    border-radius: 1rem;
    transition: all 0.3s ease;
    font-weight: 600;
    border: 2px solid transparent;
}

.pagination a {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    color: #475569;
    text-decoration: none;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.pagination a:hover {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
}

.pagination .active span {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
}

/* Smooth Transitions */
* {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Scroll Behavior */
html {
    scroll-behavior: smooth;
}

/* Loading States */
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(-25%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
    }
    50% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.animate-bounce {
    animation: bounce 1s infinite;
}

/* Enhanced Shadow Effects */
.shadow-glow {
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
}

.shadow-glow-purple {
    box-shadow: 0 0 20px rgba(139, 92, 246, 0.4);
}

.shadow-glow-green {
    box-shadow: 0 0 20px rgba(34, 197, 94, 0.4);
}

/* Responsive Design Enhancements */
@media (max-width: 768px) {
    .text-4xl {
        font-size: 2rem;
    }
    
    .text-5xl {
        font-size: 2.5rem;
    }
    
    .px-12 {
        padding-left: 2rem;
        padding-right: 2rem;
    }
    
    .py-6 {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
    .bg-white\/70 {
        background-color: rgba(17, 24, 39, 0.7);
    }
    
    .text-gray-900 {
        color: #f9fafb;
    }
    
    .text-gray-600 {
        color: #d1d5db;
    }
    
    .border-gray-200 {
        border-color: rgba(75, 85, 99, 0.3);
    }
}

/* Performance Optimizations */
.will-change-transform {
    will-change: transform;
}

.will-change-opacity {
    will-change: opacity;
}

/* Focus States for Accessibility */
button:focus,
a:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
}

/* Print Styles */
@media print {
    .no-print {
        display: none !important;
    }
    
    .print-friendly {
        background: white !important;
        color: black !important;
    }
}
</style>
@endsection