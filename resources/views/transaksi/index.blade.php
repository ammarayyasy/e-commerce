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
            <h3>Form Beli</h3>
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
                    <h4 style="color: black;" class="mb-5"><span class="badge text-bg-secondary">Stok: {{ $barang->stok }}</span></h4>

                    <form action="{{ route('beli.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_barang" value="{{ $barang->id }}">
                        <input type="hidden" name="id_pelanggan" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="status" value="1">
                        <input type="number" name="jumlah_barang" placeholder="Jumlah Barang" class="input-control" required>

                        <textarea class="input-control" placeholder="Alamat" name="alamat" id="" cols="30" rows="2" required></textarea>

                        <label for="provinsi">Provinsi:</label>
                        <select name="provinsi" id="provinsi" class="input-control" required>
                            <option value="">Pilih</option>
                        </select>

                        <label for="kota">Kab/Kota:</label>
                        <select name="kota" id="kota" class="input-control" required>
                            <option value="">Pilih</option>
                        </select>

                        <label for="kecamatan">Kecamatan:</label>
                        <select name="kecamatan" id="kecamatan" class="input-control" required>
                            <option value="">Pilih</option>
                        </select>

                        <label for="kelurahan">Kelurahan:</label>
                        <select name="kelurahan" id="kelurahan" class="input-control" required>
                            <option value="">Pilih</option>
                        </select>
    
                        <button type="submit" class="btn btn-success">beli</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => {
            var data = provinces;
            var tampung = '<option>Pilih</option>';
            data.forEach(element => {
                tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`
            });
            document.getElementById('provinsi').innerHTML = tampung;
        });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then(response => response.json())
            .then(regencies => {
                var data = regencies;
                var tampung = '<option>Pilih</option>';
                document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                data.forEach(element => {
                    tampung += `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`
                });
                document.getElementById('kota').innerHTML = tampung;
            });
        });

        const selectKota = document.getElementById('kota');
        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.dist;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
            .then(response => response.json())
            .then(districts => {
                var data = districts;
                var tampung = '<option>Pilih</option>';
                document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                data.forEach(element => {
                    tampung += `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`
                });
                document.getElementById('kecamatan').innerHTML = tampung;
            });
        });

        const selectKecamatan = document.getElementById('kecamatan');
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.vill;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
            .then(response => response.json())
            .then(villages => {
                var data = villages;
                var tampung = '<option>Pilih</option>';
                document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                data.forEach(element => {
                    tampung += `<option value="${element.name}">${element.name}</option>`
                });
                document.getElementById('kelurahan').innerHTML = tampung;
            });
        });
    </script>
@endsection