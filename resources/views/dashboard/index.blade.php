@extends('dashboard.layouts.main')
@section('main')
    <!-- konten  -->
   <div class="section">
    <div class="container">
        <h3>Dashboard</h3>
        <div class="box">
            <h4>Selamat Datang {{ auth()->user()->name }} di Warungonline kami</h4> 
        </div>
    </div>
   </div>
@endsection