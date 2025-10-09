<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::orderBy('created_at', 'desc')->get();
        return view('Admin.pages.alternatif.index', compact('alternatifs'));
    }

    public function create()
    {
        return view('Admin.pages.alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/alternatif');
            $image->move($destinationPath, $imageName);
        }

        $alternatif = Alternatif::create([
            'nama' => $request->nama,
            'foto' => $imageName,
        ]);

        // dd($alternatif);
        if ($alternatif) {
            //redirect dengan pesan sukses
            return redirect()->route('alternatif.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('alternatif.create')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('Admin.alternatif.pages.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        // Validasi form input
        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Cek apakah ada file gambar baru diunggah
        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            $oldImagePath = 'alternatif/' . $alternatif->foto;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            // Unggah gambar baru dan perbarui path gambar di dalam array data
            $image = $request->file('foto');
            $imageName = $image->hashName(); // Mendapatkan nama file yang di-hash
            $image->move(public_path('alternatif'), $imageName); // Pindahkan gambar ke direktori public/alternatif
            $alternatif->foto = $imageName;
        }

        // Update data di database
        $alternatif->update([
            'nama' => $request->nama,
            'foto' => $alternatif->foto ?? $alternatif->foto, // Pastikan kolom foto juga diupdate jika perlu,
        ]);

        if ($alternatif) {
            // Redirect dengan pesan sukses
            return redirect()->route('alternatif.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            // Redirect dengan pesan error
            return redirect()->route('alternatif.edit', $id)->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        // Cari alternatif berdasarkan id
        $alternatif = Alternatif::findOrFail($id);

        // Periksa apakah ada gambar terkait dengan alternatif
        if ($alternatif->foto) {
            // Hapus gambar dari direktori public/alternatif
            $imagePath = 'alternatif/' . $alternatif->foto;

            // Menggunakan disk public untuk menghapus file
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }
        // Hapus record alternatif dari database
        $alternatif->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('alternatif.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
