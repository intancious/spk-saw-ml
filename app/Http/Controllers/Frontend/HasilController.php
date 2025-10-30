<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Filter waktu (default: 7 hari terakhir)
    //     $filter = $request->get('filter', '7');

    //     $periodeTerakhir = Periode::orderByDesc('tanggal_mulai')->first();

    //     // Ambil periode berdasarkan filter (jika ada)
    //     $periode = Periode::query()
    //         ->where('tanggal_mulai', '>=', Carbon::now()->subDays($filter))
    //         ->orWhere('id_periode', $periodeTerakhir->id_periode ?? null)
    //         ->latest('tanggal_mulai')
    //         ->first();

    //     if (!$periode) {
    //         return view('frontend.statistics', [
    //             'periode' => null,
    //             'hasil' => [],
    //             'alternatifs' => [],
    //             'kriterias' => [],
    //             'filter' => $filter,
    //         ]);
    //     }

    //     $hasil = Hasil::with('alternatif')
    //         ->where('id_periode', $periode->id_periode)
    //         ->orderByDesc('nilai')
    //         ->get();

    //     $alternatifs = Alternatif::whereIn('id_alternatif', $hasil->pluck('id_alternatif'))->get();
    //     $kriterias = Kriteria::all();

    //     // Ambil nilai mentah untuk tabel detail
    //     $penilaian = Penilaian::where('id_periode', $periode->id_periode)
    //         ->get()
    //         ->groupBy('id_alternatif');

    //     return view('Frontend.pages.statistics', compact('periode', 'hasil', 'alternatifs', 'kriterias', 'penilaian', 'filter'));
    // }

    public function index(Request $request)
    {
        $filter = $request->get('filter', '1');
        $startDate = $request->get('custom_start');
        $endDate = $request->get('custom_end');

        // Tentukan rentang tanggal berdasarkan filter
        if ($startDate && $endDate) {
            // Rentang manual
            $start = Carbon::parse($startDate)->startOfDay();
            $end = Carbon::parse($endDate)->endOfDay();
        } else {
            // Berdasarkan dropdown (1, 3, 7, 15, 30 hari)
            $end = Carbon::now()->endOfDay();
            $start = Carbon::now()->subDays($filter)->startOfDay();
        }

        // 🔹 Ambil periode yang tanggalnya berada dalam rentang ini
        $periode = Periode::whereBetween('tanggal_mulai', [$start, $end])
            ->orWhereBetween('tanggal_selesai', [$start, $end])
            ->orderByDesc('tanggal_mulai')
            ->first();

        if (! $periode) {
            return view('Frontend.pages.statistics', [
                'hasil' => collect(),
                'penilaian' => [],
                'kriterias' => Kriteria::all(),
                'periode' => null,
                'filter' => $filter,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        }

        // 🔹 Ambil data hasil SAW sesuai periode ini
        $hasil = Hasil::where('id_periode', $periode->id_periode)
            ->orderByDesc('nilai')
            ->with('alternatif')
            ->get();

        // 🔹 Ambil penilaian berdasarkan periode (bukan created_at!)
        $penilaian = Penilaian::where('id_periode', $periode->id_periode)
            ->get()
            ->groupBy('id_alternatif');

        $kriterias = Kriteria::all();

        return view('Frontend.pages.statistics', compact(
            'hasil',
            'penilaian',
            'kriterias',
            'periode',
            'filter',
            'startDate',
            'endDate'
        ));
    }
}
