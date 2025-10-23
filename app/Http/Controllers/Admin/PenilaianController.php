<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Periode;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $periodeAktif = Periode::where('aktif', true)->first();

        if (!$periodeAktif) {
            return redirect()->route('periode.index')
                ->with('error', 'Belum ada periode aktif. Silakan aktifkan periode terlebih dahulu.');
        }

        $alternatifs = Alternatif::orderBy('nama')->get();
        $kriterias = Kriteria::with('subKriteria')->orderBy('kode_kriteria')->get();

        return view('Admin.pages.penilaian.index', compact('alternatifs', 'kriterias', 'periodeAktif'));
    }


    // public function store(Request $request)
    // {
    //     $periodeAktif = Periode::where('aktif', true)->first();

    //     if (!$periodeAktif) {
    //         return response()->json(['error' => 'Tidak ada periode aktif.'], 500);
    //     }

    //     $request->validate([
    //         'id_alternatif' => 'required|exists:alternatif,id_alternatif',
    //         'nilai' => 'required|array',
    //     ]);

    //     foreach ($request->nilai as $id_kriteria => $value) {
    //         $kriteria = Kriteria::find($id_kriteria);
    //         if (!$kriteria) continue;

    //         if ($kriteria->ada_pilihan) {
    //             $sub = \App\Models\SubKriteria::find($value);
    //             $nilaiFinal = $sub ? $sub->nilai : 0;
    //         } else {
    //             $nilaiFinal = is_numeric($value) ? $value : 0;
    //         }

    //         Penilaian::updateOrCreate(
    //             [
    //                 'id_periode' => $periodeAktif->id_periode,
    //                 'id_alternatif' => $request->id_alternatif,
    //                 'id_kriteria' => $id_kriteria,
    //             ],
    //             ['nilai' => $nilaiFinal]
    //         );
    //     }

    //     if ($request->ajax()) {
    //         return response()->json(['success' => true]);
    //     }

    //     return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan.');
    // }

    public function store(Request $request)
    {
        $periodeAktif = Periode::where('aktif', true)->first();

        if (!$periodeAktif) {
            return response()->json(['success' => false, 'message' => 'Tidak ada periode aktif'], 400);
        }

        $request->validate([
            'id_alternatif' => 'required|exists:alternatif,id_alternatif',
            'nilai' => 'required|array',
        ]);

        foreach ($request->nilai as $id_kriteria => $value) {
            $kriteria = Kriteria::find($id_kriteria);

            if (!$kriteria) continue;

            // Jika kriteria pakai sub_kriteria
            if ($kriteria->ada_pilihan) {
                $sub = \App\Models\SubKriteria::find($value);
                $nilaiFinal = $sub ? $sub->nilai : 0;
            } else {
                $nilaiFinal = is_numeric($value) ? $value : 0;
            }

            Penilaian::updateOrCreate(
                [
                    'id_periode' => $periodeAktif->id_periode,
                    'id_alternatif' => $request->id_alternatif,
                    'id_kriteria' => $id_kriteria,
                ],
                ['nilai' => $nilaiFinal]
            );
        }

        return response()->json(['success' => true, 'message' => 'Penilaian berhasil disimpan.']);
    }
}
