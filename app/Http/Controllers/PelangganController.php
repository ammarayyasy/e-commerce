<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('dashboard.pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('dashboard.pelanggan.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'username' => 'required|string|max:255|unique:pelanggans,username',
            'password' => 'required|string',
            'role' => 'required|in:1,2'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        Pelanggan::create($validateData);

        return redirect('/dashboard/pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,'.$pelanggan->id,
            'username' => 'required|string|max:255|unique:pelanggans,username,'.$pelanggan->id,
            'role' => 'required|in:1,2'
        ]);

        if ($request->filled('password')) {
            $validateData['password'] = Hash::make($request->password);
        }

        $pelanggan->update($validateData);

        return redirect('/dashboard/pelanggan')->with('success', 'Data pelanggan berhasil diedit!');
    }


    public function destroy(Pelanggan $pelanggan)
    {
        $rekening = Rekening::where('id_pelanggan', $pelanggan->id)->first();

        if ($rekening) {
            $rekening->delete();
        }

        $pelanggan->delete();

        return redirect('/dashboard/pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }

}
