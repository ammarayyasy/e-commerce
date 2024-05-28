<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        return view('dashboard.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Kategori::create($validateData);

        return redirect('/dashboard/kategori')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $kategori->update($validateData);

        return redirect('/dashboard/kategori')->with('success', 'Data kategori berhasil diedit!');
    }

    public function destroy(Kategori $kategori)
    {
        $barangs = Barang::where('id_kategori', $kategori->id)->get();

        foreach ($barangs as $barang) {

            if ($barang->image) {
                Storage::delete($barang->image);
            }

            $barang->delete();
        }

        Kategori::destroy($kategori->id);

        return redirect('/dashboard/kategori')->with('success', 'Data kategori berhasil dihapus beserta semua barang terkait!');
    }

}
