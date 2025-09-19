<?php

namespace App\Http\Controllers;

use App\Models\ArsipSurat;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class ArsipSuratController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $arsipSurats = ArsipSurat::when($search, function ($q, $s) {
                return $q->where('judul', 'like', "%$s%");
            })
            ->orderBy('waktu_pengarsipan', 'desc')
            ->get();

        return view('arsip.index', compact('arsipSurats', 'search'));
    }

    public function create()
    {
        // ✅ ambil semua kategori dari tabel kategori_surats
        $kategori = KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori_id' => 'required|exists:kategori_surats,id',
            'judul' => 'required',
            'file_surat' => 'required|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file_surat')->store('arsip', 'public');

        ArsipSurat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id, // relasi ke kategori_surats
            'judul' => $request->judul,
            'waktu_pengarsipan' => now(),
            'file_surat' => $filePath,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        // hapus file fisik juga
        if ($arsip->file_surat && \Storage::disk('public')->exists($arsip->file_surat)) {
            \Storage::disk('public')->delete($arsip->file_surat);
        }

        // hapus data dari database
        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Data surat berhasil dihapus');
    }
    public function lihat($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        return view('arsip.lihat', compact('arsip'));
    }

    public function download($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsip->file_surat);

        if (file_exists($filePath)) {
            return response()->download($filePath, $arsip->judul . '.pdf');
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }
    
    public function edit($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        $kategori = KategoriSurat::all(); // ✅ ambil kategori untuk dropdown
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_surats,id',
            'judul' => 'required|string|max:255',
            'file_surat' => 'nullable|mimes:pdf|max:2048',
        ]);

        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;

        if ($request->hasFile('file_surat')) {
            // hapus file lama
            if ($arsip->file_surat && \Storage::disk('public')->exists($arsip->file_surat)) {
                \Storage::disk('public')->delete($arsip->file_surat);
            }
            // upload baru
            $filePath = $request->file('file_surat')->store('arsip', 'public');
            $arsip->file_surat = $filePath;
        }

        $arsip->save();

        return redirect()->route('arsip.index')->with('success', 'Surat berhasil diperbarui!');
    }



    
}
