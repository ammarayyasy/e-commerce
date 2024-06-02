@extends('dashboard.layouts.main')
@section('main')
<div class="section">
    <div class="container">
        <!-- konten  -->
        <div class="section">
            <div id="wrapper" class="container">
                <h3>Detail Pelanggan</h3>
                <div class="box">
                        <input type="text" name="name" placeholder="Nama Pelanggan" class="input-control" value="{{ $pelanggan->name }}" disabled>
                        <input type="email" name="email" placeholder="Email Pelanggan" class="input-control" value="{{ $pelanggan->email }}" disabled>
                        <input type="text" name="username" placeholder="Username Pelanggan" class="input-control" value="{{  $pelanggan->username }}" disabled>
                        <input type="text" name="password" placeholder="Password Pelanggan" class="input-control" value="{{  $pelanggan->password }}" disabled>
                        <select name="role" class="input-control" disabled>
                            <option value="">Pilih Role</option>
                            <option value="1" {{ $pelanggan->role == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $pelanggan->role == 2 ? 'selected' : '' }}>User</option>
                        </select>
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
                filename: 'detail_pelanggan.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(wrapper).set(opt).save();
        });
    });
</script>
@endsection
