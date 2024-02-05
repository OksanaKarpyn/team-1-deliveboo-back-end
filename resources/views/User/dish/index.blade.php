@extends('layouts.personal.app')
@section('Page-name')
    Lista dei Piatti
@endsection
@section('content')
    <div class="m-4">
        <div class="d-flex justify-content-between align-items-center my-3">
            <a class="my-btn bg-danger text-white" href="{{ route('user.restaurant.index') }}">&larr; Home
                Page</a>
            <a class="my-btn bg-yellow text-yellow" href="{{ route('user.dish.create') }}">Crea Nuovo
                Piatto</a>
        </div>
        @if ($dishes->count() === 0)
            <h2 class="col-5 m-auto my-3"><em>Non ci sono ancora piatti creati</em></h2>
        @else
            <div class="row row-cols-5 overflow-y-scroll">
                @foreach ($dishes as $index => $dish)
                    <div class="card p-3 flex-column align-items-center">

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
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center gap-3">
                                {{-- <a class="btn btn-success" href="{{ route('user.dish.show', $dish) }}">show</a> --}}
                                <a class="btn btn-warning" href="{{ route('user.dish.edit', $dish) }}">Edit</a>
                                <form action="{{ route('user.dish.destroy', $dish->id) }}" class="d-inline-block "
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ">Elimina</button>
                                </form>
                            </div>
                    </div>
                @endforeach
            </div>
        @endif


    </div>
@endsection
