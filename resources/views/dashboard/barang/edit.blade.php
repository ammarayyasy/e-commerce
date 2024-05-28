@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Edit Barang</h3>
                <div class="box">
                    <form action="/dashboard/barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nama Barang" class="input-control" value="{{ $barang->name }}" required>

                        <select name="id_kategori" class="input-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $barang->id_kategori ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Barang</label>
                            <input type="hidden" name="oldImage" id="oldImage" value="{{ $barang->image }}">
                            @if ($barang->image)
                                <img src="{{ asset('storage/' . $barang->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" src="" alt="">
                            @else
                                <img class="d-block" src="https://picsum.photos/300/300" alt="">
                            @endif
                            <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
                            <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>

                        <input type="number" name="harga" placeholder="Harga Barang" class="input-control" value="{{ $barang->harga }}" required>

                        <input type="number" name="stok" placeholder="Stok Barang" class="input-control" value="{{ $barang->stok }}" required>
                        
                        <textarea class="input-control" placeholder="Deskripsi" name="deskripsi" id="" cols="30" rows="10">{{ $barang->deskripsi}}</textarea>

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