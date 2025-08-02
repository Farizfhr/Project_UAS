<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $mata_kuliah = Matakuliah::all();

        return view('dashboard', compact('mahasiswa', 'mata_kuliah'));
    }
}

