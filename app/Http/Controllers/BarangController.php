<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return view('dashboard.barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('dashboard.barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'id_kategori' => 'required',
            'image' => 'image|file|max:1024',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Barang::create($validatedData);

        return redirect('/dashboard/barang')->with('success', 'Data barang berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('dashboard.barang.edit', compact('kategoris', 'barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'id_kategori' => 'required',
            'image' => 'image|file|max:1024',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $barang->update($validatedData);

        return redirect('/dashboard/barang')->with('success', 'Data barang berhasil diupdate!');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->image) {
            Storage::delete($barang->image);
        }
        Barang::destroy($barang->id);

        return redirect('/dashboard/barang')->with('success', 'Data barang berhasil dihapus!');
    }
}
