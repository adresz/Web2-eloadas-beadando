<header id="header">
    

    <div class="inner">

    
        <!-- Logo -->
        <h1><a href="{{ url('/') }}" id="logo">Városok</a></h1>

        <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="{{ route('home') }}">Főoldal</a></li>
            <li><a href="{{ route('adatbazis') }}">Adatbázis</a></li>
            <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>

        @auth
            <li><a href="{{ route('uzenetek') }}">Üzenetek</a></li>
        @endauth

            <li><a href="{{ route('diagram') }}">Diagram</a></li>
            <li><a href="{{ route('crud') }}">CRUD</a></li>

        @auth
            @if(auth()->user()->role === 'admin')
                <li><a href="{{ route('admin') }}">admin</a></li>
            @endif
        @endauth

        @auth
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="button alt">
                        Kijelentkezés
                    </button>
                </form>
            </li>
        @endauth

        @guest
            <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
        @endguest
        </ul>
    </nav>
    </div>
</header>
