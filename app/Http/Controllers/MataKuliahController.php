<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $matakuliahs = Matakuliah::latest()->paginate(10);
        return view('matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_mk' => 'required|string|max:10|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|string|max:10',
            'jenis' => 'required|string|in:Wajib,Pilihan',
            'jurusan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'dosen_pengampu' => 'nullable|string|max:255',
            'ruang_kelas' => 'nullable|string|max:50',
            'hari' => 'nullable|string|max:20',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = $request->all();

    // ✅ Upload foto jika ada
    if ($request->hasFile('foto_dosen')) {
        $path = $request->file('foto_dosen')->store('matakuliah_foto', 'public');
        $validated['foto_dosen'] = $path;
    }

    $matakuliah = Matakuliah::create($data);

    return redirect()->route('matakuliah.index')
        ->with('success', 'Mata kuliah "' . $matakuliah->nama_mk . '" berhasil ditambahkan!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah): View
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah): View
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah): RedirectResponse
    {
        $request->validate([
            'kode_mk' => 'required|string|max:10|unique:matakuliahs,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|string|max:10',
            'jenis' => 'required|string|in:Wajib,Pilihan',
            'jurusan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'dosen_pengampu' => 'nullable|string|max:255',
            'ruang_kelas' => 'nullable|string|max:50',
            'hari' => 'nullable|string|max:20',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

    // ✅ Tambahkan penanganan upload foto
     if ($request->hasFile('foto_dosen')) {
        $path = $request->file('foto_dosen')->store('matakuliah_foto', 'public');
        $validated['foto_dosen'] = $path;
    }

    $matakuliah->update($data);

    return redirect()->route('matakuliah.index')
        ->with('success', 'Mata kuliah "' . $matakuliah->nama_mk . '" berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah): RedirectResponse
    {
        $nama_mk = $matakuliah->nama_mk;
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata kuliah "' . $nama_mk . '" berhasil dihapus!');
    }
}