@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Tambah Kategori</h3>
                <div class="box">
                    <form action="/dashboard/kategori" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Nama Kategori" class="input-control" required>
                        <button type="submit" class="btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection