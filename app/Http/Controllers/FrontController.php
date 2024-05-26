<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $barangs = Barang::latest();

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

}
