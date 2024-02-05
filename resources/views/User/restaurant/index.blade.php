@extends('layouts/personal.app')
@section('Page-name')
    Dashboard Management
@endsection
@section('content')
    <section class="p-3 h-100">
        <div class="row h-100">
            <div class="col-8">
                <div class="h-50 pb-3">
                    <div class="card h-100 p-3 overflow-hidden">
                        @if (count($restaurant->dishes) > 0)
                            <div class="row justify-content-between align-items-center mb-3">
                                <h3 class="col-10">Piatti</h3>
                                <a href="{{ route('user.dish.create') }}"
                                    class="text-decoration-none my-btn bg-yellow col-2">Aggiungi
                                    piatto</a>
                            </div>
                            <div class="overflow-y-scroll">
                                <table class="table align-middle text-center">
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
                                        @foreach ($restaurant->dishes as $index => $dish)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><img src="{{ asset('storage/' . $dish?->photo) }}" alt=""
                                                        style="width: 50px; height: 50px;" class="rounded-circle"></td>
                                                <td>{{ $dish->name }}</td>
                                                <td>{{ $dish->avaible == 1 ? 'Si' : 'No' }}</td>
                                                <td>{{ $dish->price }}€</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="row align-items-center mt-4 mx-3">
                                <p class="text-danger fs-4 fw-bold col-8 mb-0">Nessun piatto, aggiungi un nuovo piatto</p>
                                <a href="{{ route('user.dish.create') }}"
                                    class="text-decoration-none my-btn bg-yellow col-4">Crea
                                    piatto</a>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="h-50 ">
                    <div class="card h-100 p-3 overflow-y-hidden">
                        @if (count($allOrders) > 0)
                            <h3>Ordini</h3>
                            <div class="overflow-y-scroll">
                                <table class="table align-middle text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Cognome</th>
                                            <th scope="col">Indirizzo</th>
                                            <th scope="col">Stato</th>
                                            <th scope="col">Tot Prezzo</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($allOrders as $index => $order)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->surname }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->status == 1 ? 'Consegnato' : 'In Consegna' }}</td>
                                                <td>{{ $order->tot_price }}€</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="card h-100 d-flex flex-column align-items-center p-3 rounded-5">
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
    </section>
@endsection
