<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Periode;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        // Ambil semua periode untuk tombol pilihan
        $periodes = Periode::orderBy('tanggal_mulai', 'desc')->get();

        return view('admin.pages.hasil.index', compact('periodes'));
    }

    public function show($id)
    {
        $periodes = Periode::orderBy('tanggal_mulai', 'desc')->get();
        $periodeAktif = Periode::findOrFail($id);

        // Ambil hasil sesuai periode
        $hasil = Hasil::where('id_periode', $id)
            ->with('alternatif')
            ->orderByDesc('nilai')
            ->get();

        return view('admin.pages.hasil.index', compact('periodes', 'periodeAktif', 'hasil'));
    }
}
