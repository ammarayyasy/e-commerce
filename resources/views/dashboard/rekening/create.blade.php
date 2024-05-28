@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Tambah Rekening</h3>
                <div class="box">
                    <form action="/dashboard/rekening" method="POST">
                        @csrf
                        <select name="id_pelanggan" class="input-control" required>
                            <option value="">Pilih User</option>
                            @foreach ($pelangganWithoutRekening as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="no_rekening" placeholder="Nomor Rekening" class="input-control" required>
                        <input type="number" name="saldo" placeholder="Saldo Rekening" class="input-control" required>
                        <input type="number" name="pin" placeholder="Pin Rekening" class="input-control" required>
                        <button type="submit" class="btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection