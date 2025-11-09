@extends('layouts.app')

@section('title', 'Városok Adatbázisa')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">
    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
                <header class="major">
                    <h1>Magyarországi Városok</h1>
                    <p>Válassz megyét a városok és népességadatok megtekintéséhez</p>
                </header>

               
                <form method="GET" action="{{ route('adatbazis') }}">
                    <div class="row gtr-50">
                        <div class="col-9 col-12-xsmall">
                            <select name="megyeid" id="megyeid" onchange="this.form.submit()">
                                <option value="">-- Válassz megyét --</option>
                                @foreach($megyek as $megye)
                                    <option value="{{ $megye->id }}"
                                        {{ $kivalasztottMegye?->id == $megye->id ? 'selected' : '' }}>
                                        {{ $megye->nev }} ({{ $megye->varosok_count }} település)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 col-12-xsmall">
                            <input type="submit" value="MUTASD" class="primary fit">
                        </div>
                    </div>
                </form>

               
                <div style="margin-top: 2rem;"></div>

                
                @if($kivalasztottMegye)
                    <div style="text-align: center; margin-top: 1rem;">
                        <h2 class="major" style="margin-bottom: 1.5rem;">
                            {{ strtoupper($kivalasztottMegye->nev) }} MEGYE VÁROSAI
                        </h2>
                    </div>

                    @if($varosok->count() > 0)
                        <div class="table-wrapper">
                            <table class="alt">
                                <thead>
                                    <tr>
                                        <th>VÁROS</th>
                                        <th>TÍPUS</th>
                                        <th>LEGUTÓBBI NÉPESSÉG</th>
                                        <th>ÉV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($varosok as $varos)
                                        <tr>
                                            
                                            <td><strong>{{ $varos->nev }}</strong></td>

                                            
                                            <td>
                                                @if($varos->megyeijogu == 1 && $varos->megyeszekhely == 1)
                                                    Megyei jogú székhely
                                                @elseif($varos->megyeszekhely == 1)
                                                    Megyeszékhely
                                                @elseif($varos->megyeijogu == 1)
                                                    Megyei jogú város
                                                @else
                                                    Város
                                                @endif
                                            </td>

                                            
                                            <td>
                                                @if($varos->legutolsoLelekszam)
                                                    <strong>{{ number_format($varos->legutolsoLelekszam->osszesen) }}</strong> fő
                                                @else
                                                    <em>Nincs adat</em>
                                                @endif
                                            </td>

                                         
                                            <td>{{ $varos->legutolsoLelekszam?->ev ?? '–' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">Nincs település ebben a megyében.</p>
                    @endif
                @endif

                <!-- Footer hely -->
                <div style="height: 120px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
