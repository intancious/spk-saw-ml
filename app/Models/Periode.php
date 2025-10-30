<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periodes';
    protected $primaryKey = 'id_periode';
    protected $casts = ['aktif' => 'boolean'];


    protected $fillable = [
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'aktif',
    ];

    // Relasi: satu periode punya banyak penilaian
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_periode', 'id_periode');
    }

    // 🔹 Relasi: satu periode punya banyak hasil
    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_periode', 'id_periode');
    }

    // Scope untuk ambil periode aktif
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}
