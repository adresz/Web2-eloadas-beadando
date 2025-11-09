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

                                        <!-- KIBONTHATÓ TELJES ÜZENET -->
                                        <tr class="expanded-message" style="display: none;">
                                            <td colspan="6" class="p-4 bg-light">
                                                <div class="full-message">
                                                    <strong>Teljes üzenet:</strong><br>
                                                    {!! nl2br(e($uzenet->uzenet)) !!}
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