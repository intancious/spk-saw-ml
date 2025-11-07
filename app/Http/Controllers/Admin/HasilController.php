<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Hasil;
use App\Models\Periode;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        // Ambil semua periode untuk tombol pilihan
        $periodes = Periode::orderBy('tanggal_mulai', 'desc')->get();

        return view('Admin.pages.hasil.index', compact('periodes'));
    }

    // public function show($id)
    // {
    //     $periodes = Periode::orderBy('tanggal_mulai', 'desc')->get();
    //     $periodeAktif = Periode::findOrFail($id);

    //     // Ambil hasil sesuai periode
    //     $hasil = Hasil::where('id_periode', $id)
    //         ->with('alternatif')
    //         ->orderByDesc('nilai')
    //         ->get();

    //     return view('Admin.pages.hasil.index', compact('periodes', 'periodeAktif', 'hasil'));
    // }

    public function show($id, Request $request)
    {
        $periodes = Periode::orderBy('tanggal_mulai', 'desc')->get();
        $periodeAktif = Periode::findOrFail($id);

        $hasil = Hasil::where('id_periode', $id)
            ->with('alternatif')
            ->orderByDesc('nilai')
            ->get();

        // Jika ada parameter cetak=1, buat PDF
        if ($request->has('cetak')) {
            $pdf = Pdf::loadView('Admin.pages.hasil.cetak', [
                'periodeAktif' => $periodeAktif,
                'hasil' => $hasil,
            ])->setPaper('a4', 'portrait');

            // Tampilkan preview di browser (stream)
            return $pdf->stream('Hasil-Akhir-' . $periodeAktif->nama_periode . '.pdf');
        }

        // Jika tidak ada parameter cetak, tampilkan halaman biasa
        return view('Admin.pages.hasil.index', compact('periodes', 'periodeAktif', 'hasil'));
    }
}
