@extends('layouts.app')

@section('title', 'Admin - Felhasználók')
@section('body-class', 'left-sidebar is-preload')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<div id="main-wrapper">
    <div class="main-content" id="mainContent">
        <div class="wrapper style2">
            <div class="inner">
                <div class="container">

                    <h1 class="mb-4">Felhasználók listája</h1>

                    {{-- === AZ EGYSZERŰ, DE MŰKÖDŐ WRAPPER === --}}
                    <div class="table-wrapper">
                        <table class="user-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Név</th>
                                    <th>Email</th>
                                    <th>Szerep</th>
                                    <th>Regisztrált</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            <span class="role-badge role-{{ strtolower($u->role) }}">
                                                {{ $u->role === 'admin' ? 'Admin' : 'Felhasználó' }}
                                            </span>
                                        </td>
                                        <td class="registered-cell">
                                            <span class="registered-date">
                                                {{ $u->created_at->format('Y.m.d') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- === END table-wrapper === --}}

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection