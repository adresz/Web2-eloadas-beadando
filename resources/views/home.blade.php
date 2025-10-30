@extends('layouts.app')

@section('title', 'Kezdőlap')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 fw-bold text-primary">Üdvözöllek!</h1>
    <p class="lead text-muted">Fedezd fel a világ legszebb városait!</p>
</div>

<!-- Hero kép (Unsplash, ingyenes) -->
<div class="mt-5">
    <img src="https://images.unsplash.com/photo-1480714378408-4c7d8d6b6f0b?w=1200" class="img-fluid rounded shadow" alt="Városok">
</div>
@endsection