{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Regisztráció')
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
                                <h2>Regisztráció</h2>
                            </header>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row gtr-uniform">
                                    <div class="col-12">
                                        <label for="name">Név</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <p class="text-danger" color="red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="email">Email cím</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <p class="text-danger" color="red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="password">Jelszó</label>
                                        <input type="password" name="password" id="password" required>
                                        @error('password')
                                            <p class="text-danger" color="red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="password_confirmation">Jelszó újra</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                                    </div>

                                    <div class="col-12">
                                        <ul class="actions">
                                            <li>
                                                <input type="submit" value="Regisztráció" class="primary">
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-12">
                                        <p>Már van fiókod? <a href="{{ route('login') }}">Jelentkezz be!</a></p>
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