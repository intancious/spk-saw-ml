<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;


class KriteriaController extends Controller
{
    /**
     * Tampilkan semua data kriteria
     */
    public function index()
    {
        $kriteria = Kriteria::orderBy('created_at', 'asc')->get();
        return view('Admin.pages.kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        // Ambil kode terakhir
        $lastKode = Kriteria::max('kode_kriteria');

        if ($lastKode) {
            $urutan = (int) substr($lastKode, 1) + 1;
        } else {
            $urutan = 1;
        }

        $kodeBaru = 'C' . $urutan;

        return view('Admin.pages.kriteria.create', compact('kodeBaru'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'type' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:0',
            'ada_pilihan' => 'required|boolean',
        ]);

        // Generate kode otomatis
        $lastKode = Kriteria::max('kode_kriteria');
        $urutan = $lastKode ? (int) substr($lastKode, 1) + 1 : 1;
        $validated['kode_kriteria'] = 'C' . $urutan;
        $validated['ada_pilihan'] = $request->ada_pilihan ?? 0;

        Kriteria::create($validated);

        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('Admin.pages.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'type' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:0',
            'ada_pilihan' => 'required|boolean',
        ]);

        $validated['ada_pilihan'] = $request->ada_pilihan ?? 0;

        $kriteria->update($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
