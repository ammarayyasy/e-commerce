<!-- header -->
<header>
    <div class="container">
        <h1><a href="{{ route('home') }}">Warungonline</a></h1>
        <ul>
            @auth
                @if (auth()->user()->role == 1)
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li> 
                @endif
                <li><a href="{{ route('pesanan', auth()->user()->id) }}">Pesanan</a></li>
                <li>
                    <a href="">
                    <form action="/logout" method="post">
                        @csrf
                        <button style="padding: 2px 8px" type="submit">Logout</button>
                    </form>
                    </a>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endauth
            
        </ul>
    </div>
</header>