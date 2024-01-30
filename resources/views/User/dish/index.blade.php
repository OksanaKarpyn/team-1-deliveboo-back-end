@extends('layouts.app')
@section('content')
    <div class="container">
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
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
