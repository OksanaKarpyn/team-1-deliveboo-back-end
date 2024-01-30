@extends('layouts.app')
@section('content')
    <section class="container">
        {{ $restaurant->name }}
        <a class="btn btn-success" href="{{ route('user.dish.create') }}">Crea Nuovo Piatto</a>
    </section>
@endsection
