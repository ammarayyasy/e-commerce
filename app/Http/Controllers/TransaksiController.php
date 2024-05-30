<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Barang $barang)
    {
        

        if ($barang->stok <= 0) {
            return back()->with('error', 'Barang habis.');
        }

        if (!auth()->check()) {
            return back()->with('error', 'Anda belum login.');
        }
        
        return view('transaksi.index', compact('barang'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required',
            'id_pelanggan' => 'required',
            'jumlah_barang' => 'required|integer|min:1',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'status' => 'required',
        ]);

        $barang = Barang::find($validatedData['id_barang']);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        if ($barang->stok < $validatedData['jumlah_barang']) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi');
        }

        $barang->stok -= $validatedData['jumlah_barang'];
        $barang->save();

        Transaksi::create($validatedData);

        return redirect('/')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
