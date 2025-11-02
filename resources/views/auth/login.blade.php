{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Bejelentkezés')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">
    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-12-medium">
                        <section class="box">
                            <header>
                                <h2>Bejelentkezés</h2>
                            </header>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row gtr-uniform">
                                    <div class="col-12">
                                        <label for="email">Email cím</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="password">Jelszó</label>
                                        <input type="password" name="password" id="password" required>
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <ul class="actions">
                                            <li>
                                                <input type="submit" value="Bejelentkezés" class="primary">
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-12">
                                        <p>Nem regisztrált még? <a href="{{ route('register') }}">Regisztrálj itt!</a></p>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection