<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RekeningController extends Controller
{
    public function index()
    {
        $rekenings = Rekening::all();
        return view('dashboard.rekening.index', compact('rekenings'));
    }

    public function create()
    {
        $pelangganWithRekening = Rekening::pluck('id_pelanggan')->toArray();

        $pelangganWithoutRekening = Pelanggan::whereNotIn('id', $pelangganWithRekening)->get();

        // return dd($pelangganWithoutRekening);
        return view('dashboard.rekening.create', compact('pelangganWithoutRekening'));
    }


    public function store(Request $request)
    {
        {
            $validateData = $request->validate([
                'id_pelanggan' => 'required',
                'no_rekening' => 'required|unique:rekenings,no_rekening',
                'saldo' => 'required|numeric',
                'pin' => 'required',
            ]);
        
            Rekening::create($validateData);
        
            return redirect('/dashboard/rekening')->with('success', 'Data rekening berhasil ditambahkan!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Rekening $rekening)
    {
        $pelangganWithRekening = Rekening::pluck('id_pelanggan')->toArray();

        $pelangganWithoutRekening = Pelanggan::whereNotIn('id', $pelangganWithRekening)
            ->orWhere('id', $rekening->id_pelanggan)
            ->get();

        return view('dashboard.rekening.edit', compact('rekening', 'pelangganWithoutRekening'));
    }


    public function update(Request $request, Rekening $rekening)
    {
        {
            $validateData = $request->validate([
                'id_pelanggan' => 'required',
                'no_rekening' => 'required|unique:rekenings,no_rekening,'.$rekening->id,
                'saldo' => 'required|numeric',
                'pin' => 'required',
            ]);
        
            $rekening->update($validateData);
        
            return redirect('/dashboard/rekening')->with('success', 'Data rekening berhasil diedit!');
        }
    }

    public function destroy(Rekening $rekening)
    {
        Rekening::destroy($rekening->id);

        return redirect('/dashboard/rekening')->with('success', 'Data rekening berhasil hapus!');
    }
}
