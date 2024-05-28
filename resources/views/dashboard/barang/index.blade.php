@extends('dashboard.layouts.main')
@section('main')
   <!-- konten  -->
   <div class="section">
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3>Barang</h3>
        <div class="box">
            <a href="{{ route('barang.create') }}" class="btn mb-3">Tambah Barang</a>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($barangs)
                        @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->name }}</td>
                            <td>
                                <div class="image-dashboard">
                                    @if ($barang->image)
                                        <img src="{{ asset('storage/' . $barang->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('image/shopping.png') }}" alt="">
                                    @endif
                                </div>
                            </td>
                            <td>{{ $barang->kategori->name }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td class="d-flex">
                                <a href="{{ route('barang.edit', $barang->id) }}" style="background-color: aqua" class="btn me-2" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/dashboard/barang/{{ $barang->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background-color: red" class="btn" onclick="return confirm('Apakah anda yakin?')"><i class="fa-solid fa-trash"></i></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
   </div>
@endsection