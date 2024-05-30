@extends('layouts.main')

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
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3>Pesanan</h3>
        <div class="box">
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Alamat</th>
                        {{-- <th>Total</th> --}}
                        <th>Status</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transaksis->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->pelanggan->name }}</td>
                                <td>{{ $transaksi->barang->name }}</td>
                                <td>{{ $transaksi->jumlah_barang }}</td>
                                <td>{{ $transaksi->alamat }}</td>
                                <td>
                                    @if($transaksi->status == 1)
                                        Belum dibayar
                                    @elseif($transaksi->status == 2)
                                        Dikirim
                                    @elseif($transaksi->status == 3)
                                        Sampai tujuan
                                    @else
                                        Selesai
                                    @endif
                                </td>
                                <td class="d-flex">
                                    @if($transaksi->status == 1)
                                        <button type="button" style="background-color: #ffc107" class="btn" data-bs-toggle="modal" data-bs-target="#modalBayar{{ $transaksi->id }}">
                                            Bayar
                                        </button>
                                        <!-- Modal Bayar -->
                                        <div class="modal fade" id="modalBayar{{ $transaksi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $transaksi->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $transaksi->id }}">Rincian Pembayaran</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table border="1" cellspacing="0" class="table mb-3">
                                                            <thead>
                                                                <tr>
                                                                    <th>Barang</th>
                                                                    <th>Jumlah Beli</th>
                                                                    <th>Harga Satuan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $transaksi->barang->name }}</td>
                                                                    <td>{{ $transaksi->jumlah_barang }}</td>
                                                                    <td>Rp. {{ $transaksi->barang->harga }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color: rgba(245, 245, 245, 0.67)"><b>Total</b></td>
                                                                    <td style="background-color: rgba(245, 245, 245, 0.67)"></td>
                                                                    <td style="background-color: rgba(245, 245, 245, 0.67)">Rp. {{ $transaksi->total }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <label for="saldoView">Saldo anda:</label>
                                                        <input class="input-control" type="text" name="saldoView" id="saldoView" value="Rp. {{ $rekening ? $rekening->saldo : '0' }}" disabled>

                                                        <form action="{{ route('pesanan.bayar', ['pelanggan' => $transaksi->id_pelanggan]) }}" method="POST">
                                                            @csrf
                                                            <label for="pin">Masukkan PIN anda:</label>
                                                            <input class="input-control" type="number" name="pin" id="pin" required>
                                                        
                                                            <input type="hidden" name="transaksi_id" value="{{ $transaksi->id }}">
                                                            <input type="hidden" name="saldo" value="{{ $rekening ? $rekening->saldo : '0' }}">
                                                            <input type="hidden" name="total" value="{{ $transaksi->total }}">
                                                            
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Bayar</button>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    @elseif($transaksi->status == 2)
                                        <form action="{{ route('pesanan.terima', $transaksi->id) }}" method="post">
                                            @csrf
                                            <button type="submit" style="background-color: #20c997" class="btn">Terima</button>
                                        </form>
                                        
                                    @elseif($transaksi->status == 3)
                                        <button type="button" style="background-color: #0dcaf0" class="btn" data-bs-toggle="modal" data-bs-target="#modalReview{{ $transaksi->id }}">
                                            Review
                                        </button>
                                        <!-- Modal Review -->
                                        <div class="modal fade" id="modalReview{{ $transaksi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $transaksi->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $transaksi->id }}">Form Review</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('pesanan.review', $transaksi->id) }}" method="POST">
                                                            @csrf
                                                            <label for="review">Tulis review anda:</label>
                                                            <textarea class="input-control" name="review" id="" cols="30" rows="2" required></textarea>
                                                        
                                                            <input type="hidden" name="id_pelanggan" value="{{ $transaksi->id_pelanggan }}">
                                                            <input type="hidden" name="id_barang" value="{{ $transaksi->id_barang }}">
                                                            
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <form action="{{ route('pesanan.hapus', $transaksi->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?')" style="background-color: red" class="btn">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>


    </div>
   </div>
@endsection