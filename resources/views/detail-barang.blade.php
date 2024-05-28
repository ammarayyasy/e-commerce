@extends('layouts.main')

@section('main')

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="{{ route('home') }}">
                <input type="text" name="search" placeholder="Cari Barang" value="{{ request('search') }}">
                <button type="submit">Cari</button>
            </form>
        </div>
    </div>

    <!-- produk detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Buku</h3>
            <div class="box">
                <div class="col-2">
                    @if ($barang->image)
                        <img src="{{ asset('storage/' . $barang->image) }}" style="width: 100%;" alt="">
                    @else
                        <img src="{{ asset('image/shopping.png') }}" style="width: 100%;" alt="">
                    @endif
                </div>
                <div class="col-2">
                    <h3>{{ $barang->name }}</h3>
                    <h4>Rp.  {{ $barang->harga }}</h4>
                    <p>Deskripsi : <br>
                        {{ $barang->deskripsi }}
                    </p>
                    <button class="btn btn-success">beli</button>
                </div>
            </div>
        </div>
    </div>
@endsection