@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class=" col-5 m-auto my-3"><em>Lista dei Piatti</em></h1>
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.restaurant.index') }}">&larr; Home Page</a>
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.create') }}">Crea Nuovo Piatto</a>
        <div class="row">
            @foreach ($dishes as $index => $dish)
                <div class="card" style="width: 18rem;">

                    @if ($dish->photo)
                        <a class="img-link d-flex justify-content-center align-items-center"
                            href="{{ asset('storage/' . $dish->photo) }}" data-lightbox="image-preview">
                            <img class="doctor-img rounded-circle col-6" src="{{ asset('storage/' . $dish->photo) }}"
                                alt="">
                        </a>
                    @else
                        <div class="img-link d-flex justify-content-center align-items-center">
                            <img class="doctor-img rounded-circle" src="https://picsum.photos/200/200" alt="">
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <a class="btn btn-success" href="{{ route('user.dish.show', $dish) }}">show</a>
                        <a class="btn btn-warning me-4 m-1" href="{{ route('user.dish.edit', $dish) }}">Edit</a>
                        <form action="{{ route('user.dish.destroy', $dish->id) }}" class="d-inline-block " method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Elimina</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
