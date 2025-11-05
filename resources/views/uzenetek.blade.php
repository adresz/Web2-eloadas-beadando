{{-- resources/views/uzenetek/index.blade.php --}}

@extends('layouts.app')

{{-- TITLE & BODY CLASS --}}
@section('title', 'Beérkezett üzenetek')
@section('body-class', 'left-sidebar is-preload')

{{-- CSS CSAK ERRE AZ OLDALRA --}}
@push('styles')
    <link href="{{ asset('css/uzenetek.css') }}" rel="stylesheet">
@endpush

{{-- TARTALOM --}}
@section('content')
    <div id="main-wrapper">
        <div class="wrapper style2">
            <div class="inner">
                <div class="container">
                    <h1 class="mb-4">Beérkezett üzenetek</h1>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($uzenetek->count() > 0)
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
                                    <tr>
                                        <td>{{ $uzenet->nev }}</td>
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
                                        <td class="uzenet-cell" title="{{ $uzenet->uzenet }}">
                                            {{ Str::limit($uzenet->uzenet, 60) }}
                                        </td>
                                        <td>{{ $uzenet->created_at->format('Y.m.d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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