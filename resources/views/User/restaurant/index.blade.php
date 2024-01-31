@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="card" style="width: 18rem;">
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
            @endif --}}
            @if ($restaurant->photo)
                <a class="img-link d-flex justify-content-center align-items-center"
                    href="{{ asset('storage/' . $restaurant->photo) }}" data-lightbox="image-preview">
                    <img class="restaurant-img rounded-circle col-6" src="{{ asset('storage/' . $restaurant->photo) }}"
                        alt="">
                </a>
            @else
                <div class="img-link d-flex justify-content-center align-items-center">
                    {{-- Mostra le iniziali del nome come fallback --}}
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
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.index') }}">lista piatti</a>
    </section>
@endsection
