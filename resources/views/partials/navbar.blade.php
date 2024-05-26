<!-- header -->
<header>
    <div class="container">
        <h1><a href="{{ route('home') }}">Warungonline</a></h1>
        <ul>
            @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button style="padding: 2px 8px" type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endauth
            
        </ul>
    </div>
</header>