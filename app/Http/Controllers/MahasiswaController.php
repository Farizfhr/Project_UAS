<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nim' => 'required|string|max:20|unique:mahasiswas,nim',
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:mahasiswas,email',
        'jurusan' => 'required|string|max:100',
        'semester' => 'required|string|max:10',
        'alamat' => 'nullable|string',
        'no_hp' => 'nullable|string|max:15',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // ✅ validasi foto
    ]);

    $data = $request->all();

    // ✅ Simpan foto jika diupload
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('mahasiswa_foto', 'public');
    }

    $mahasiswa = Mahasiswa::create($data);

    // Jika pengguna ingin langsung tambah data lagi
    if ($request->has('save_and_add')) {
        return redirect()->route('mahasiswa.create')
            ->with('success', 'Data mahasiswa "' . $mahasiswa->nama . '" berhasil ditambahkan! Anda dapat menambah data lagi.');
    }

    return redirect()->route('mahasiswa.index')
        ->with('success', 'Data mahasiswa "' . $mahasiswa->nama . '" berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa): RedirectResponse
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mahasiswas,email,' . $mahasiswa->id,
            'jurusan' => 'required|string|max:100',
            'semester' => 'required|string|max:10',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);
         $data = $request->all();

        if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('mahasiswa_foto', 'public');
    }

        $mahasiswa->update($data); // ✅ ini benar

        return redirect()->route('mahasiswa.index')
        ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}