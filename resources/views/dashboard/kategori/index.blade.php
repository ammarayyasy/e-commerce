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
        <h3>Kategori</h3>
        <div class="box">
            <a href="{{ route('kategori.create') }}" class="btn mb-3">Tambah Kategori</a>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Nama</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($kategoris)
                        @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route('kategori.edit', $kategori->id) }}" style="background-color: aqua" class="btn me-2" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/dashboard/kategori/{{ $kategori->id }}" method="POST">
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