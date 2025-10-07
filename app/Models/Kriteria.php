<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;


    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'kode_kriteria',
        'nama',
        'type',
        'bobot',
        'ada_pilihan',
    ];


    /**
     * Relasi: satu Kriteria memiliki banyak SubKriteria
     * foreign key di tabel sub_kriteria = kriteria_id
     * local key di tabel kriteria = id_kriteria
     */
    public function subKriteria()
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id', 'id_kriteria');
    }

    /**
     * Relasi: satu Kriteria memiliki banyak Penilaian
     */
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'kriteria_id', 'id_kriteria');
    }
}
