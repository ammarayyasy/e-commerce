@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div class="container">
                <h3>Edit Pelanggan</h3>
                <div class="box">
                    <form action="/dashboard/pelanggan/{{ $pelanggan->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="text" name="name" placeholder="Nama Pelanggan" class="input-control" value="{{ old('name', $pelanggan->name) }}" required>
                        <input type="email" name="email" placeholder="Email Pelanggan" class="input-control" value="{{ old('email', $pelanggan->email) }}" required>
                        <input type="text" name="username" placeholder="Username Pelanggan" class="input-control" value="{{ old('username', $pelanggan->username) }}" required>
                        <input type="text" name="password" placeholder="Password Pelanggan" class="input-control" value="{{ old('password', $pelanggan->password) }}" required>
                        <select name="role" class="input-control" required>
                            <option value="">Pilih Role</option>
                            <option value="1" {{ $pelanggan->role == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $pelanggan->role == 2 ? 'selected' : '' }}>User</option>
                        </select>
                        <button type="submit" class="btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection