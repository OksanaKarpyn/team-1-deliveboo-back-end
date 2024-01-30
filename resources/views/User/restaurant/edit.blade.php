@extends('layouts.app')

@section('content')
    <section class="container">
        <h1 class="mt-3">Modifica - {{ $editRestaurant->name }}</h1>
        <form class="card d-block p-2" action="{{ route('user.restaurant.update', $editRestaurant) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="my-3">
                <label for="name" class="form-label fw-bold">Nome</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"
                    value="{{ old('name', $editRestaurant->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="my-3">
                <label for="address" class="form-label fw-bold">Indirizzo</label>
                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address"
                    value="{{ old('address', $editRestaurant->address) }}">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="my-3">
                <label for="phone" class="form-label fw-bold">Telefono</label>
                <input class="form-control" type="tel" name="phone" id="phone"
                    value="{{ old('phone', $editRestaurant->phone) }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="my-3">
                <label for="description" class="form-label fw-bold">Descrizione</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description', $editRestaurant->description) }}</textarea>
            </div>
            <div class="my-3">
                <label for="photo" class="form-label fw-bold">Foto</label>
                <input class="form-control" type="file" name="photo" id="photo">
            </div>
            <div class="my-3">
                @foreach ($typologies as $typo)
                    <span class="me-3">
                        <label for="{{ $typo->id }}" class="form-label">{{ $typo->name }}</label>
                        <input type="checkbox" class="form-check-input @error('types') is-invalid @enderror" name="types[]" id="{{ $typo->id }}"
                        @if ($errors->any()) {{ in_array($typo->id, old('types', [])) ? 'checked' : null }}
                        @else
                            {{ $editRestaurant->types->contains($typo->id) ? 'checked' : null }} @endif
                        autocomplete="off" value="{{ $typo->id }}" name="types[]">
                    </span>
                @endforeach 
                @error('types')
                    <span class="d-block invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror               
            </div>
            
            <button type="submit" class="btn btn-success">Conferma</button>
        </form>
    </section>
@endsection
