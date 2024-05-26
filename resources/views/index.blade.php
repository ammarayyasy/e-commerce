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
    
    <!-- kategori -->
    <div class="section">
        <div class="container">
            <h3>kategori</h3>
            <div class="box">
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('kategori', $kategori) }}">
                        <div class="col-5">
                            <img src="{{ asset('image/icon-category.png') }}" width="50px" style="margin-bottom:5px;">
                            <p>{{ $kategori->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- new produk -->
    <div class="section">
        <div class="container">
            <h3>Buku Terbaru</h3>
            <div class="box">
                @foreach ($barangs as $barang)
                    <a href="#">
                        <div class="col-4">
                            <img src="https://picsum.photos/300/300" alt="">
                            <p class="nama">{{ $barang->name }}</p>
                            <p class="harga">Rp. {{ $barang->harga }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


@endsection