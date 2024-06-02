@extends('layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div id="wrapper" class="container">
                <h3>Detail Pesanan</h3>
                <div class="box">
                        <label for="pelanggan">Pelanggan:</label>
                        <input class="input-control" type="text" name="pelanggan" value="{{ $transaksi->pelanggan->name }}" disabled>

                        <label for="barang">Barang:</label>
                        <input class="input-control" type="text" name="barang" value="{{ $transaksi->barang->name }}" disabled>

                        <label for="alamat">Alamat:</label>
                        <input class="input-control" type="text" name="alamat" value="{{ $transaksi->alamat }}" disabled>

                        <label for="kelurahan">Kelurahan:</label>
                        <input class="input-control" type="text" name="kelurahan" value="{{ $transaksi->kelurahan }}" disabled>

                        <label for="kecamatan">Kecamatan:</label>
                        <input class="input-control" type="text" name="kecamatan" value="{{ $transaksi->kecamatan }}" disabled>

                        <label for="kota">Kota/Kab:</label>
                        <input class="input-control" type="text" name="kota" value="{{ $transaksi->kota }}" disabled>

                        <label for="provinsi">Provinsi:</label>
                        <input class="input-control" type="text" name="provinsi" value="{{ $transaksi->provinsi }}" disabled>

                        <label for="status">Status:</label>
                        @if ($transaksi->status == 1)
                            <input class="input-control" type="text" name="status" value="Belum Dibayar" disabled>
                        @elseif ($transaksi->status == 2)
                            <input class="input-control" type="text" name="status" value="Dikirim" disabled>
                        @elseif ($transaksi->status == 3)
                            <input class="input-control" type="text" name="status" value="Sampai Tujuan" disabled>
                        @elseif ($transaksi->status == 4)
                            <input class="input-control" type="text" name="status" value="Selesai" disabled>
                        @endif

                        
                        
                        <button id="cetakBtn" class="btn">Cetak</button>                 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cetakBtn = document.getElementById('cetakBtn');
        const wrapper = document.getElementById('wrapper');

        cetakBtn.addEventListener('click', function () {
            var opt = {
                margin: 0,
                filename: 'detail_pesanan.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(wrapper).set(opt).save();
        });
    });
</script>
@endsection
