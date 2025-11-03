@extends('layouts.app')

@section('title', 'Lélekszám Kezelő')
@section('body-class', 'left-sidebar is-preload')

@push('styles')
<style>
    /* Nincs szükség – minden a crud.css-ben van */
</style>
@endpush

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
        const alert = document.querySelector('.crud-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 3000);
        }

        document.querySelectorAll('th[onclick]').forEach(th => {
            th.style.transition = 'background 0.2s';
            th.addEventListener('mouseenter', () => {
                if (!th.style.backgroundColor) th.style.backgroundColor = '#f8f9fa';
            });
            th.addEventListener('mouseleave', () => {
                if (th.style.backgroundColor === '#f8f9fa') th.style.backgroundColor = '';
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

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show crud-alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="text-end mb-3">
                    <a href="{{ route('lelekszam.create') }}" class="button primary crud-add-btn">
                        Új adat
                    </a>
                </div>

                <div class="crud-table-container">
                    <table class="crud-table">
                        <thead>
                            <tr>
                                <th onclick="sortTable('varosid')" style="cursor: pointer; user-select: none;">
                                    Város ID
                                    @if(request('sort') === 'varosid')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('ev')" style="cursor: pointer; user-select: none;">
                                    Év
                                    @if(request('sort') === 'ev')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('no')" style="cursor: pointer; user-select: none;">
                                    Nők
                                    @if(request('sort') === 'no')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('ferfi')" style="cursor: pointer; user-select: none;">
                                    Férfiak
                                    @if(request('sort') === 'ferfi')
                                        <small>{!! request('dir') === 'asc' ? '↑' : '↓' !!}</small>
                                    @endif
                                </th>
                                <th onclick="sortTable('osszesen')" style="cursor: pointer; user-select: none;">
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
                                    <a href="{{ route('lelekszam.edit', $adat) }}" class="button small crud-action-btn">
                                        Szerkeszt
                                    </a>
                                    <form action="{{ route('lelekszam.destroy', $adat) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="button small alt crud-action-btn"
                                                onclick="return confirm('Biztosan törlöd?')">
                                            Töröl
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="crud-empty">Nincs rögzítve lélekszám adat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="crud-pagination">
                    {{ $adatok->links('pagination::simple-bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection