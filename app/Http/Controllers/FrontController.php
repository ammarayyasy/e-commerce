<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Rekening;
use App\Models\Review;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $barangs = Barang::latest()->where('stok', '>', 0);

        if(request('search')) {
            $barangs = $barangs->where('name', 'like', '%' . request('search') . '%');
        }

        $barangs = $barangs->get();

        return view('index', compact('kategoris', 'barangs'));
    }


    public function kategori(Kategori $kategori)
    {
        $kategoris = Kategori::all();
        $barangs = $kategori->barangs;
        return view('index', compact('kategoris', 'barangs'));
    }

    public function detail(Barang $barang)
    {
        $reviews = Review::where('id_barang', $barang->id)->get();

        $reviews->each(function ($review) {
            $review->createdFormatted = Carbon::parse($review->created_at)->diffForHumans();
        });

        return view('detail-barang', compact('barang', 'reviews'));
    }

    public function pesanan(Pelanggan $pelanggan)
    {
        $transaksis = Transaksi::where('id_pelanggan', $pelanggan->id)->get();
        $rekening = Rekening::where('id_pelanggan', $pelanggan->id)->first();

        foreach ($transaksis as $transaksi) {
            $transaksi->total = $transaksi->jumlah_barang * $transaksi->barang->harga;
        }

        return view('pesanan', compact('transaksis', 'rekening'));
    }

    public function bayar(Request $request, Pelanggan $pelanggan)
    {
        $rekening = Rekening::where('id_pelanggan', $pelanggan->id)->first();

        if (!$rekening) {
            return back()->with('error', 'Anda tidak punya rekening, silahkan hubungi admin');
        }

        if ($rekening->saldo < $request->total) {
            return back()->with('error', 'Saldo anda kurang');
        }

        if ($request->pin != $rekening->pin) {
            return back()->with('error', 'PIN anda salah');
        }

        $rekening->saldo -= $request->total;
        $rekening->save();

        $transaksi = Transaksi::find($request->transaksi_id);
        if ($transaksi) {
            $transaksi->status = 2;
            $transaksi->save();
        }

        return back()->with('success', 'Pembayaran anda berhasil');
    }

    public function terima(Transaksi $transaksi)
    {
        $transaksi->status = 3;
        $transaksi->save();

        return back()->with('success', 'Transaksi telah diterima');
    }

    public function review(Request $request, Transaksi $transaksi)
    {
        $validateData = $request->validate([
            'id_pelanggan' => 'required',
            'id_barang' => 'required',
            'review' => 'required',
        ]);

        $transaksi->status = 4;
        $transaksi->save();

        Review::create($validateData);

        return back()->with('success', 'Review berhasil ditambahkan!');
    }

    public function hapus(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);

        return back()->with('success', 'Data transaksi berhasil di hapus!');
    }

}
