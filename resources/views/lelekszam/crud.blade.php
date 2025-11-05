{{-- resources/views/lelekszam/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Lélekszám Kezelő')
@section('body-class', 'left-sidebar is-preload')

{{-- CSS – CSAK ERRE AZ OLDALRA --}}
@push('styles')
    <link href="{{ asset('css/crud.css') }}" rel="stylesheet">
@endpush

{{-- JS – Rendezés + Alert eltűnés --}}
@push('scripts')
<script>
    function sortTable(column) {
        const url = new URL(window.location);
        const currentSort = url.searchParams.get('sort');
        const currentDir = url.searchParams.get('dir');

        let dir = 'asc';
        if (currentSort === column && currentDir === 'asc') {
            dir = 'desc';
        }

        url.searchParams.set('sort', column);
        url.searchParams.set('dir', dir);
        window.location = url.href;
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Alert automatikus eltűnése
        const alert = document.querySelector('.crud-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.6s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 600);
            }, 3000);
        }

        // TH hover effektus
        document.querySelectorAll('th[onclick]').forEach(th => {
            th.addEventListener('mouseenter', () => {
                if (!th.dataset.originalBg) {
                    th.dataset.originalBg = th.style.backgroundColor || '';
                    th.style.backgroundColor = '#e9ecef';
                }
            });
            th.addEventListener('mouseleave', () => {
                if (th.dataset.originalBg !== undefined) {
                    th.style.backgroundColor = th.dataset.originalBg;
                    delete th.dataset.originalBg;
                }
            });
        });
    });
</script>
@endpush

@section('content')
<div id="main-wrapper">
    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
                <header class="major">
                    <h1>Lélekszám Adatok</h1>
                    <p>Városok népessége év és nem szerint</p>
                </header>

                {{-- SIKER ÜZENET --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show crud-alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- ÚJ ADAT GOMB --}}
                <div class="text-end mb-4">
                    <a href="{{ route('lelekszam.create') }}" class="crud-add-btn">
                        ÚJ ADAT
                    </a>
                </div>

                {{-- TÁBLÁZAT KONTÉNER --}}
                <div class="crud-table-container">
                    <table class="crud-table">
                        <thead>
                            <tr>
                                <th onclick="sortTable('varosid')" style="cursor: pointer;">
                                    Város ID
                                    @if(request('sort') === 'varosid')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('ev')" style="cursor: pointer;">
                                    Év
                                    @if(request('sort') === 'ev')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('no')" style="cursor: pointer;">
                                    Nők
                                    @if(request('sort') === 'no')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('ferfi')" style="cursor: pointer;">
                                    Férfiak
                                    @if(request('sort') === 'ferfi')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('osszesen')" style="cursor: pointer;">
                                    Összesen
                                    @if(request('sort') === 'osszesen')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($adatok as $adat)
                                <tr>
                                    <td><strong>{{ $adat->varosid }}</strong></td>
                                    <td>{{ $adat->ev }}</td>
                                    <td>{{ number_format($adat->no) }}</td>
                                    <td>{{ number_format($adat->ferfi) }}</td>
                                    <td><strong>{{ number_format($adat->osszesen) }}</strong></td>
                                    <td>
                                        <a href="{{ route('lelekszam.edit', $adat) }}" 
                                           class="crud-action-btn edit">
                                            SZERKESZT
                                        </a>

                                        <form action="{{ route('lelekszam.destroy', $adat) }}" 
                                              method="POST" 
                                              style="display:inline;"
                                              onsubmit="return confirm('Biztosan törlöd ezt az adatot?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="crud-action-btn">
                                                TÖRÖL
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="crud-empty">
                                        Nincs rögzítve lélekszám adat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- LAPOZÁS --}}
                <div class="crud-pagination">
                    {{ $adatok->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection