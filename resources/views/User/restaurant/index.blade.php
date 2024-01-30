@extends('layouts.app')
@section('content')
<section class="container">
    <div class="mt-3 row justify-content-between gap-3 align-items-center">
        <div class="card p-3 fs-4 fw-bold col-8">{{ $restaurant->name }}</div>
        <a href="{{ route('user.restaurant.edit', $restaurant )}}" class="btn btn-primary col-3 p-3">Modifica</a>
    </div>
        
    </section>
@endsection