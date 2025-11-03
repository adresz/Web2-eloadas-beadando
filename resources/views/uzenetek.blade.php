@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">

    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
                <h1 class="mb-4">Beérkezett üzenetek</h1>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($uzenetek->count() > 0)
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
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
                                        <td>{{ $uzenet->varos }}</td>
                                        <td>{{ $uzenet->kor }}</td>
                                        <td style="max-width: 300px;">{{ $uzenet->uzenet }}</td>
                                        <td>{{ $uzenet->created_at->format('Y.m.d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Lapozás --}}
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
