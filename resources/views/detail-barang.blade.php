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
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h3>Detail Barang</h3>
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
                    <a href="{{ route('beli.index', $barang) }}" class="btn btn-success">beli</a>
                </div>
            </div>

            

            <div class="box">
                <div class="row">
                    <h3>Review</h3>

                    @if ($reviews->count())
                        @foreach ($reviews as $review)
                        <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="fw-bold card-title" style="color: brown">
                                        <i class="fa-solid fa-user"></i> {{ $review->pelanggan->name }}
                                    </h5> 
                                    <p class="card-text">{{ $review->review }}</p>
                                    <p>{{ $review->createdFormatted }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-center">Tidak ada review</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection