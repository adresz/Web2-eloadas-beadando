@extends('layouts.app')

@section('title', 'Beérkezett üzenetek')
@section('body-class', 'left-sidebar is-preload')

@push('styles')
    <link href="{{ asset('css/uzenetek.css') }}" rel="stylesheet">
@endpush

@section('content')
<div id="main-wrapper">
    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
                <h1 class="mb-4">Beérkezett üzenetek</h1>
                <p>Összes üzenet száma: {{ $uzenetek->total() }}, a teljes üzenet megtekintéséhez kattints az üzenethez tartozó <b>NÉV</b> mezőre</p>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($uzenetek->count() > 0)
                    <!-- RESZPONZÍV GÖRGETHETŐ TÁBLÁZAT -->
                    <div class="table-container">
                        <table class="table table-bordered table-messages">
                            <thead>
                                <tr>
                                    <th>Név</th>
                                    <th>Email</th>
                                    <th>Város</th>
                                    <th>Kor</th>
                                    <th>Üzenet</th>
                                    <th>Küldve</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uzenetek as $uzenet)
                                    <tr class="message-row">
                                        <td class="clickable-name"><strong>{{ $uzenet->nev }}</strong></td>
                                        <td>{{ $uzenet->email }}</td>
                                        <td>
                                            @switch($uzenet->varos)
                                                @case('1') Budapest @break
                                                @case('2') Kecskemét @break
                                                @case('3') Pécs @break
                                                @case('4') Debrecen @break
                                                @default Egyéb
                                            @endswitch
                                        </td>
                                        <td>{{ $uzenet->kor }}</td>
                                        <td class="uzenet-cell">{{ Str::limit($uzenet->uzenet, 60) }}</td>
                                        <td>{{ $uzenet->created_at->format('Y.m.d H:i') }}</td>
                                    </tr>

                                    <tr class="expanded-message">
                                    <td colspan="6">
                                        <div class="full-message">
                                            <h5 class="mb-3 text-primary">Teljes üzenet részletei</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-sm table-borderless detail-table">
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Név:</td>
                                                            <td>{{ $uzenet->nev }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Email:</td>
                                                            <td><a href="mailto:{{ $uzenet->email }}">{{ $uzenet->email }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Város:</td>
                                                            <td>
                                                                @switch($uzenet->varos)
                                                                    @case('1') Budapest @break
                                                                    @case('2') Kecskemét @break
                                                                    @case('3') Pécs @break
                                                                    @case('4') Debrecen @break
                                                                    @default Egyéb
                                                                @endswitch
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Kor:</td>
                                                            <td>{{ $uzenet->kor }} év</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Küldve:</td>
                                                            <td>{{ $uzenet->created_at->format('Y. m. d. H:i:s') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <div class="message-box p-3 bg-white rounded border">
                                                        <strong class="d-block mb-2">Üzenet:</strong>
                                                        <div class="message-content">
                                                            {!! nl2br(e($uzenet->uzenet)) !!}
                                                        </div>

                                                        <!-- Válasz gomb – jobb felső sarokban -->
                                                        <div class="reply-btn-wrapper">
                                                            <a href="mailto:{{ $uzenet->email }}?subject=Válasz%20az%20üzenetedre" class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-reply"></i> Válasz
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $uzenetek->links() }}
                    </div>
                @else
                    <div class="alert alert-info">Még nincs egyetlen üzenet sem.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.clickable-name').forEach(function(el) {
        el.addEventListener('click', function () {
            const row = this.closest('tr');
            const nextRow = row.nextElementSibling;
            if(nextRow && nextRow.classList.contains('expanded-message')) {
                const isVisible = nextRow.style.display === 'table-row';
                nextRow.style.display = isVisible ? 'none' : 'table-row';
                row.classList.toggle('expanded', !isVisible);
            }
        });
    });
});
</script>
@endpush
