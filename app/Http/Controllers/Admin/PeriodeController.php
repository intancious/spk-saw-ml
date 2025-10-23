<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::orderBy('tanggal_mulai', 'desc')->get(); // ambil fresh
        return view('Admin.pages.periode.index', compact('periodes'));
    }

    public function create()
    {
        return view('Admin.pages.periode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Periode::create($request->all());

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $periode = Periode::findOrFail($id);
        return view('Admin.pages.periode.edit', compact('periode'));
    }

    public function update(Request $request, $id)
    {
        $periode = Periode::findOrFail($id);

        $request->validate([
            'nama_periode' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $periode->update($request->all());

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $periode = Periode::findOrFail($id);
        $periode->delete();

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil dihapus!');
    }

    // Aktifkan satu periode (dan nonaktifkan lainnya)
    public function activate($id)
    {
        DB::transaction(function () use ($id) {
            Periode::where('aktif', true)->update(['aktif' => false]);

            $periode = Periode::findOrFail($id);
            $periode->update(['aktif' => true]);
        });

        return redirect()->route('periode.index')->with('success', 'Periode berhasil diaktifkan!');
    }
}
