@extends('layouts.app')

@section('title', 'Adat Szerkesztése')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">
    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
                <header class="major">
                    <h1>Adat szerkesztése</h1>
                </header>

                <form action="{{ route('lelekszam.update', $lelekszam) }}" method="POST" class="alt">
                    @csrf @method('PUT')
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label>Város ID</label>
                            <input type="number" name="varosid" value="{{ $lelekszam->varosid }}" required>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label>Év</label>
                            <input type="number" name="ev" value="{{ $lelekszam->ev }}" required>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label>Nők száma</label>
                            <input type="number" name="no" value="{{ $lelekszam->no }}" required min="0">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label>Összes lakos</label>
                            <input type="number" name="osszesen" value="{{ $lelekszam->osszesen }}" required min="0">
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Frissítés" class="primary"></li>
                                <li><a href="{{ route('lelekszam.index') }}" class="button">Vissza</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection