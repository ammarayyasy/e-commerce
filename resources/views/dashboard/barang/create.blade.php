@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Tambah Barang</h3>
                <div class="box">
                    <form action="/dashboard/barang" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Nama Barang" class="input-control" required>

                        <select name="id_kategori" class="input-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Barang</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
                            <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>

                        <input type="number" name="harga" placeholder="Harga Barang" class="input-control" required>

                        <input type="number" name="stok" placeholder="Stok Barang" class="input-control" required>
                        
                        <textarea class="input-control" placeholder="Deskripsi" name="deskripsi" id="" cols="30" rows="10"></textarea>

                        <button type="submit" class="btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection