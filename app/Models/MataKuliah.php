<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    // Eksplisit set nama tabel
    protected $table = 'matakuliahs';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'jenis',
        'jurusan',
        'deskripsi',
        'dosen_pengampu',
        'ruang_kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'foto_dosen',
    ];

    protected $casts = [
        'jam_mulai' => 'datetime:H:i',
        'jam_selesai' => 'datetime:H:i',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor untuk format waktu
    public function getJamKuliahAttribute()
    {
        if ($this->jam_mulai && $this->jam_selesai) {
            return date('H:i', strtotime($this->jam_mulai)) . ' - ' . date('H:i', strtotime($this->jam_selesai));
        }
        return '-';
    }

    // Accessor untuk jadwal lengkap
    public function getJadwalLengkapAttribute()
    {
        if ($this->hari && $this->jam_mulai && $this->jam_selesai) {
            return $this->hari . ', ' . $this->getJamKuliahAttribute();
        }
        return '-';
    }
}