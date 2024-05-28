@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Edit Kategori</h3>
                <div class="box">
                    <form action="/dashboard/kategori/{{ $kategori->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="text" name="name" placeholder="Nama Kategori" class="input-control" value="{{ old('name', $kategori->name) }}" required>
                        <button type="submit" class="btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection