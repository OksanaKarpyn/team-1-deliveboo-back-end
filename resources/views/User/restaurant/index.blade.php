@extends('layouts.app')
@section('content')
    <section class="container">
        {{-- {{ $restaurant->name }} --}}
        {{-- <a class="btn btn-success" href="{{ route('user.dish.create') }}">Crea Nuovo Piatto</a> --}}
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.index') }}">lista piatti</a>
    </section>
@endsection
