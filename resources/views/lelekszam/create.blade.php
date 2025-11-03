@extends('layouts.app')

@section('title', 'Új Lélekszám Adat')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">
  <div class="wrapper style2">
    <div class="inner">
      <div class="container">
        <header class="major">
          <h1>Új lélekszám adat</h1>
        </header>

        <form action="{{ route('lelekszam.store') }}" method="POST" class="alt">
          @csrf
          <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
              <label>Város ID</label>
              <input type="number" name="varosid" required min="1" class="form-control">
            </div>
            <div class="col-6 col-12-xsmall">
              <label>Év</label>
              <input type="number" name="ev" required min="1900" max="2100" value="{{ date('Y') }}">
            </div>
            <div class="col-6 col-12-xsmall">
              <label>Nők száma</label>
              <input type="number" name="no" required min="0">
            </div>
            <div class="col-6 col-12-xsmall">
              <label>Összes lakos</label>
              <input type="number" name="osszesen" required min="0">
            </div>
            <div class="col-12">
              <ul class="actions">
                <li><input type="submit" value="Mentés" class="primary"></li>
                <li><a href="{{ route('lelekszam.index') }}" class="button">Mégse</a></li>
              </ul>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
