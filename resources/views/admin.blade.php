@extends('layouts.app')

@section('title', 'Admin - Felhasználók')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">
    <div class="main-content" id="mainContent">
        <div class="wrapper style2">
            <div class="inner">
                <div class="container">
                    <h1 class="mb-4">Felhasználók listája</h1>

                    <table class="user-table">
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
                                        <span class="role role-{{ strtolower($u->role) }}">
                                            {{ ucfirst($u->role) }}
                                        </span>
                                    </td>
                                    <td>{{ $u->created_at->format('Y.m.d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

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

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
