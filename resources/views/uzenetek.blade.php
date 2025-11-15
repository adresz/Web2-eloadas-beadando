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
                        <!-- MŰKÖDŐ WRAPPER: .table-wrapper (mint a városoknál) -->
                        <div class="table-wrapper">
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
                                    <td class="clickable-name">
                                        <strong>{{ $uzenet->nev }}</strong>
                                    </td>
                                    <td>{{ $uzenet->email }}</td>
                                    <td>
                                        @switch($uzenet->varos)
                                            @case('1') <span class="varos">Budapest</span> @break
                                            @case('2') <span class="varos">Kecskemét</span> @break
                                            @case('3') <span class="varos">Pécs</span> @break
                                            @case('4') <span class="varos">Debrecen</span> @break
                                            @default   <span class="varos">Egyéb</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $uzenet->kor }}</td>
                                    <td class="uzenet-cell">
                                        {{ Str::limit($uzenet->uzenet, 60) }}
                                    </td>
                                    <td>{{ $uzenet->created_at->format('Y.m.d H:i') }}</td>
                                </tr>

                                <!-- KIBONTHATÓ TELJES ÜZENET + ÖSSZES ADAT -->
                                <tr class="expanded-message" style="display: none;">
                                    <td colspan="6" class="p-4 bg-light">
                                        <div class="full-message-container">
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
                                                <div class="col-md-6">
                                                    <div class="message-box p-3 bg-white rounded border">
                                                        <strong class="d-block mb-2">Üzenet:</strong>
                                                        <div class="message-content">
                                                            {!! nl2br(e($uzenet->uzenet)) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Válasz gomb (opcionális, ha szeretnél) -->
                                            <div class="mt-3 text-right">
                                                <a href="mailto:{{ $uzenet->email }}?subject=Válasz%20az%20üzenetedre" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-reply"></i> Válasz írása
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END: .table-wrapper -->

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
        el.style.cursor = 'pointer';
        el.addEventListener('click', function () {
            const row = this.closest('tr');
            const nextRow = row.nextElementSibling;

                if (nextRow && nextRow.classList.contains('expanded-message')) {
            const isVisible = nextRow.style.display === 'table-row';
            nextRow.style.display = isVisible ? 'none' : 'table-row';
            row.classList.toggle('expanded', !isVisible);
        }
        });
    });
});
</script>
@endpush