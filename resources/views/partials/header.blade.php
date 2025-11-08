<header id="header">
    <div class="inner">
        <h1><a href="{{ url('/') }}" id="logo">Városok</a></h1>

        <nav id="nav">
            <ul>
                <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Főoldal</a></li>
                <li class="{{ Route::is('adatbazis') ? 'active' : '' }}"><a href="{{ route('adatbazis') }}">Adatbázis</a></li>
                <li class="{{ Route::is('kapcsolat') ? 'active' : '' }}"><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>

                @auth
                    <li class="{{ Route::is('uzenetek') ? 'active' : '' }}"><a href="{{ route('uzenetek') }}">Üzenetek</a></li>
                @endauth

                <li class="{{ Route::is('diagram') ? 'active' : '' }}"><a href="{{ route('diagram') }}">Diagram</a></li>
                <li class="{{ Route::is('lelekszam.index') ? 'active' : '' }}"><a href="{{ route('lelekszam.index') }}">CRUD</a></li>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="{{ Route::is('admin') ? 'active' : '' }}"><a href="{{ route('admin') }}">Admin</a></li>
                    @endif
                @endauth

                @auth
                <li class="logout-item">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Kijelentkezés
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
                @endauth


                @guest
                    <li class="{{ Route::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Bejelentkezés</a></li>
                @endguest
            </ul>
        </nav>
    </div>
</header>