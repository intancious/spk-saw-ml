<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';

    protected $fillable = [
        'nama',
        'foto',
    ];

    // Relasi ke hasil (1 alternatif = 1 hasil)
    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'id_alternatif', 'id_alternatif');
    }

    // Relasi ke penilaian (1 alternatif = banyak penilaian)
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_alternatif', 'id_alternatif');
    }
}
