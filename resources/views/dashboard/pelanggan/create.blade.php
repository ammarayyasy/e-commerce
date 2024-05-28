@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Tambah Pelanggan</h3>
                <div class="box">
                    <form action="/dashboard/pelanggan" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Nama Pelanggan" class="input-control" required>
                        <input type="email" name="email" placeholder="Email Pelanggan" class="input-control" required>
                        <input type="text" name="username" placeholder="Username Pelanggan" class="input-control" required>
                        <input type="text" name="password" placeholder="Password Pelanggan" class="input-control" required>
                        <select name="role" class="input-control" required>
                            <option value="">Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                        <button type="submit" class="btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection