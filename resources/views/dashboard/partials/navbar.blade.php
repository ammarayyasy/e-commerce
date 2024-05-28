<header>
    <div class="container">
    <h1><a href="{{ route('home') }}">Warungbuku</a></h1>
    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @if (auth()->user()->role == 1)
            <li><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
            <li><a href="{{ route('rekening.index') }}">Rekening</a></li>
            <li><a href="{{ route('kategori.index') }}">Kategori</a></li>
            <li><a href="{{ route('barang.index') }}">Barang</a></li>
        @endif
        <li>
            <a href="">
            <form action="/logout" method="post">
                @csrf
                <button style="padding: 2px 8px" type="submit">Logout</button>
            </form>
            </a>
        </li>
    </ul>
    </div>
</header>