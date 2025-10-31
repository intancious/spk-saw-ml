<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Periode;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index(Request $request)
    {
        // ambil semua periode untuk tombol pilih periode
        $periodes = Periode::orderByDesc('tanggal_mulai')->get();

        // periode yang dipilih lewat query param 'periode' atau fallback ke periode aktif
        $periodeId = $request->query('periode')
            ?? Periode::where('aktif', true)->value('id_periode');

        if (! $periodeId) {
            // tampilkan halaman pilih periode (view akan menampilkan tombol periode)
            return view('Admin.pages.perhitungan.index', compact('periodes'))
                ->with('message', 'Pilih periode dulu untuk melihat perhitungan.');
        }

        // ambil data master
        // $alternatifs = Alternatif::orderBy('nama')->get();          // koleksi Alternatif
        $alternatifs = Alternatif::orderBy('created_at', 'asc')->get();          // koleksi Alternatif
        $kriterias   = Kriteria::orderBy('kode_kriteria')->get();   // koleksi Kriteria

        // ambil semua penilaian untuk periode ini
        $penilaianAll = Penilaian::where('id_periode', $periodeId)->get();

        // 1) Bobot (W)
        $bobot = $kriterias->pluck('bobot', 'id_kriteria'); // [id_kriteria => bobot]

        // 2) Matrix X (raw nilai): buat array matrixX[altId][kritId] = nilai atau null
        $matrixX = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $krit) {
                $p = $penilaianAll
                    ->firstWhere('id_alternatif', $alt->id_alternatif)
                    ?->where('id_kriteria', $krit->id_kriteria)
                    // Since firstWhere returns the first match for one condition only,
                    // better filter collection:
                ;
                // safer: filter collection:
                $p = $penilaianAll->where('id_alternatif', $alt->id_alternatif)
                    ->where('id_kriteria', $krit->id_kriteria)
                    ->first();
                $matrixX[$alt->id_alternatif][$krit->id_kriteria] = $p ? (float) $p->nilai : null;
            }
        }

        // 3) Untuk normalisasi (R) kita butuh max/min per kriteria dari penilaianAll
        $minMax = [];
        foreach ($kriterias as $krit) {
            $values = $penilaianAll->where('id_kriteria', $krit->id_kriteria)->pluck('nilai')->map(fn($v) => (float)$v)->filter();
            $max = $values->max() ?? 0;
            $min = $values->min() ?? 0;
            $minMax[$krit->id_kriteria] = ['max' => $max, 'min' => $min];
        }

        // 4) Matriks R dan perhitungan V
        $matrixR = [];
        $hasilAkhir = []; // [altId => nilaiV]
        foreach ($alternatifs as $alt) {
            $nilaiV = 0.0;
            foreach ($kriterias as $krit) {
                $x = $matrixX[$alt->id_alternatif][$krit->id_kriteria] ?? null; // nilai mentah
                $max = $minMax[$krit->id_kriteria]['max'];
                $min = $minMax[$krit->id_kriteria]['min'];

                // jika tidak ada data, r = 0
                if ($x === null || $max == 0 || $min == 0) {
                    $r = 0.0;
                } else {
                    if ($krit->type === 'Benefit') {
                        $r = round($x / $max, 4);
                    } else { // Cost
                        // hindari pembagian 0
                        $r = $x == 0 ? 0.0 : round($min / $x, 4);
                    }
                }

                $matrixR[$alt->id_alternatif][$krit->id_kriteria] = $r;
                $nilaiV += $r * (float)$krit->bobot;
            }

            $hasilAkhir[$alt->id_alternatif] = round($nilaiV, 6);

            // simpan/update hasil per periode
            Hasil::updateOrCreate(
                ['id_alternatif' => $alt->id_alternatif, 'id_periode' => $periodeId],
                ['nilai' => $nilaiV]
            );
        }

        // kirim data ke view
        return view('Admin.pages.perhitungan.index', compact(
            'periodes',
            'periodeId',
            'alternatifs',
            'kriterias',
            'matrixX',
            'matrixR',
            'minMax',
            'bobot',
            'hasilAkhir'
        ));
    }
}
