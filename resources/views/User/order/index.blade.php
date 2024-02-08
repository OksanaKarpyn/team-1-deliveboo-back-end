@extends('layouts.personal.app')
@section('Page-name')
    Ordini
@endsection

@section('content')
    <div class="container mt-3">
        <div class="card p-3">
            @if (count($allOrders) > 0)
            @dd($allOrders)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Prezzo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allOrders as $index => $order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->surname }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->status == 1 ? 'Consegnato' : 'In Consegna' }}</td>
                                <td>{{ $order->tot_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-danger fs-3 fw-bold text-center card">
                    Nessun ordine ricevuto
                </div>
            @endif
        </div>

    </div>
@endsection
