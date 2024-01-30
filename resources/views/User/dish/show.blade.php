@extends('layouts.app')
@section('content')
    <div class="container">

        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.index') }}">&larr; torna indietro</a>

        <div class="row">
            <div class="col-5 m-auto">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    @if ($singledish->photo)
                        <a class="img-link d-flex justify-content-center align-items-center"
                            href="{{ asset('storage/' . $singledish->photo) }}" data-lightbox="image-preview">
                            <img class="doctor-img rounded-circle col-6" src="{{ asset('storage/' . $singledish->photo) }}"
                                alt="">
                        </a>
                    @else
                        <div class="img-link d-flex justify-content-center align-items-center">
                            <img class="doctor-img rounded-circle" src="https://picsum.photos/200/200" alt="">
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $singledish->name }}</h5>
                        <p class="card-text">{{ $singledish->description }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
