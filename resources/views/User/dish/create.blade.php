@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-5 m-auto">
            <h1>Crea in nuovo piatto </h1>
            <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.index') }}">&larr; torna
                indietro</a>
            <form action="{{ route('user.dish.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 row">
                    <label for="name" class="form-label">Nome Piatto</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3 row">
                    <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto</label>
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="file" name="photo" id="photo" class="form-control px-0"
                        accept=".png, .jpg, .jpeg, .gif">
                    <div class="invalid-feedback" id="photo-feedback"></div>
                </div>
                <div class="mb-4 row">
                    <label for="ingredients" class="form label">Ingredienti</label>
                    <input type="text" name="ingredients" id="ingredients"
                        class="form-control @error('ingredients') is-invalid @enderror">
                    @error('ingredients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4 row">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        rows="5" maxlength="1000"></textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4 row">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-secondary
                ">Crea piatto</button>
            </form>
        </div>

    </div>
@endsection
