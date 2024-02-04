@extends('layouts/personal.app')
@section('Page-name')
    <div class="text-white fs-4">Dashboard Management</div>
@endsection
@section('content')
    <section class="m-3 content">
        <div class="row h-100">
            <div class="col-8">
                <div class="card h-75 mb-3 p-3">
                    <div class="row justify-content-between align-items-center mb-3">
                        <h3 class="col-10">Piatti</h3>
                        <a href="{{ route('user.dish.create') }}" class="text-decoration-none my-btn bg-yellow col-2">Aggiungi
                            piatto</a>
                    </div>

                    @if (count($restaurant->dishes) > 0)
                        <table class="table align-middle text-center h-100">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Visibile</th>
                                    <th scope="col">Prezzo</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($restaurant->dishes as $dish)
                                    <tr>
                                        <td>{{ $dish->id }}</td>
                                        <td>{{ $dish?->photo }}</td>
                                        <td>{{ $dish->name }}</td>
                                        <td>{{ $dish->avaible }}</td>
                                        <td>{{ $dish->price }}€</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="row align-items-center mt-4 mx-3">
                            <p class="text-danger fs-4 fw-bold col-8 mb-0">Nessun piatto, aggiungi un nuovo piatto</p>
                            <a href="{{ route('user.dish.create') }}"
                                class="text-decoration-none my-btn bg-yellow col-4">Crea
                                piatto</a>
                        </div>
                    @endif

                </div>
                <div class="card h-25">

                </div>
            </div>
            <div class="col-4">
                <div class="card h-100 d-flex flex-column align-items-center p-3">
                    <div class="row justify-content-between align-items-center w-100">
                        <p class="mb-0 fs-4 fw-bold col-9">{{ $restaurant->activity_name }}</p>
                        <a class="col-3 text-center text-decoration-none mb-0 d-block text-dark"><i
                                class="fa-solid fa-ellipsis fs-4 fw-bold"></i></a>
                    </div>
                    @if ($restaurant->photo)
                        <img src="{{ asset('storage/' . $restaurant->photo) }}" alt="" class="rounded-circle my-5"
                        style="width:200px; height:200px">
                    @else
                        <div class="rounded-circle my-5 bg-dark" style="width:200px; height:200px"> </div>
                    @endif


                    <div class="my-3 row align-items-start justify-content-between w-100">
                        <p class="mb-0 text-yellow fw-bold col-3">Indirizzo:</p>
                        <span class="col-9">{{ $restaurant->address }}</span>
                    </div>

                    <div class="my-3 row align-items-start justify-content-between w-100">
                        <p class="mb-0 text-yellow fw-bold col-3">Telefono:</p>
                        <span class="col-9">{{ $restaurant->phone }}</span>
                    </div>

                    <div class="my-3 row align-items-start justify-content-between w-100">
                        <p class="mb-0 text-yellow fw-bold col-3">Descrizione:</p>
                        <span class="col-9">{{ $restaurant->description }}</span>
                    </div>
                    <a href="{{ route('user.restaurant.edit', $restaurant) }}"
                        class="mt-auto my-btn text-decoration-none bg-yellow">Modifica</a>
                </div>
            </div>
        </div>
        {{-- <div class="card" style="width: 18rem;">
            {{-- @if ($restautant->photo)
                <a class="img-link d-flex justify-content-center align-items-center"
                    href="{{ asset('storage/' . $doctor->photo) }}" data-lightbox="image-preview">
                    <img class="doctor-img rounded-circle col-6" src="{{ asset('storage/' . $doctor->photo) }}" alt="">
                </a>
            @else
                <div class="img-link d-flex justify-content-center align-items-center">
                    <img class="doctor-img rounded-circle"
                        src="https://superawesomevectors.com/wp-content/uploads/2021/02/doctor-vector-icon.jpg"
                        alt="">
                </div>
            @endif 
            @if ($restaurant->photo)
                <a class="img-link d-flex justify-content-center align-items-center"
                    href="{{ asset('storage/' . $restaurant->photo) }}" data-lightbox="image-preview">
                    <img class="restaurant-img rounded-circle col-6" src="{{ asset('storage/' . $restaurant->photo) }}"
                        alt="">
                </a>
            @else
                <div class="img-link d-flex justify-content-center align-items-center">
                    {{-- Mostra le iniziali del nome come fallback 
                    <div class="restaurant-img rounded-circle"
                        style="width: 100px; height: 100px; background-color: #ccc; display: flex; justify-content: center; align-items: center;">
                        <span
                            style="font-size: 24px; color: #fff;">{{ strtoupper(substr($restaurant->activity_name, 0, 2)) }}</span>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $restaurant->activity_name }}</h5>
                <p class="card-text">{{ $restaurant->address }}.</p>
                <p class="card-text">
                    @if ($restaurant->types)
                        <div class="py-1">
                            <strong>Tipologie:</strong><br>
                            <ul>
                                @foreach ($restaurant->types as $elem)
                                    <li>
                                        {{ $elem->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        {{-- <a class="btn btn-success" href="{{ route('user.dish.create') }}">Crea Nuovo Piatto</a> --}}
        {{-- <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.index') }}">lista piatti</a>
<section class="container">
    <div class="mt-3 row justify-content-between gap-3 align-items-center">
        <div class="card p-3 fs-4 fw-bold col-8">{{ $restaurant->name }}</div>
        <a href="{{ route('user.restaurant.edit', $restaurant )}}" class="btn btn-primary col-3 p-3">Modifica</a>
    </div>
        @foreach ($restaurant->types as $type)
            <div>{{ $type->name }}</div>
        @endforeach --}}
    </section>
@endsection
