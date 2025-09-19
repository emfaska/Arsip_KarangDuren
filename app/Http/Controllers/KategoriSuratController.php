<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurat;

class KategoriSuratController extends Controller
{
    /**
     * Tampilkan semua kategori
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kategori = KategoriSurat::when($search, function ($query, $search) {
            return $query->where('nama_kategori', 'like', "%{$search}%");
        })->get();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.form'); // form tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'judul' => 'nullable|string',
        ]);

        KategoriSurat::create($request->only(['nama_kategori','judul']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        return view('kategori.form', compact('kategori')); // form edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'judul' => 'nullable|string',
        ]);

        $kategori = KategoriSurat::findOrFail($id);
        $kategori->update($request->only(['nama_kategori','judul']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}