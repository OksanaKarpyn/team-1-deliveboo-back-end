@extends('layouts.app')

@section('content')
 <section class="container"> 
    <h1 class="mt-3">Modifica - {{ $restaurant->name }}</h1>
    <form class="card d-block p-2" action="{{ route('user.restaurant.update', $restaurant)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="my-3">
            <label for="name" class="form-label fw-bold">Nome</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $restaurant->name)}}">
        </div>
        <div class="my-3">
            <label for="address" class="form-label fw-bold">Indirizzo</label>
            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $restaurant->address)}}">
        </div>
        <div class="my-3">
            <label for="phone" class="form-label fw-bold">Telefono</label>
            <input class="form-control" type="tel" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{7}" value="{{ old('phone', $restaurant->phone)}}">
        </div>
        <div class="my-3">
            <label for="description" class="form-label fw-bold">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description', $restaurant->description ) }}</textarea>
        </div>
        <div class="my-3">
            <label for="photo" class="form-label fw-bold">Foto</label>
            <input class="form-control" type="file" name="photo" id="photo">
        </div>
        <button type="submit" class="btn btn-success">Conferma</button>
    </form>
 </section>

@endsection

