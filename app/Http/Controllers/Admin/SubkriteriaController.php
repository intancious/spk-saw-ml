<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function index()
    {
        // Ambil semua kriteria yang punya pilihan (ada_pilihan = true)
        $kriteria = Kriteria::where('ada_pilihan', true)
            ->with('subKriteria')
            ->orderBy('kode_kriteria', 'asc')
            ->get();

        return view('Admin.pages.subkriteria.index', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id_kriteria',
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0',
        ]);

        SubKriteria::create($validated);

        return redirect()->back()->with('success', 'Sub Kriteria berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0',
        ]);

        $sub = SubKriteria::findOrFail($id);
        $sub->update($validated);

        return redirect()->back()->with('success', 'Sub Kriteria berhasil diperbarui!');
    }

    public function destroy($id)
    {
        SubKriteria::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Sub Kriteria berhasil dihapus!');
    }
}
