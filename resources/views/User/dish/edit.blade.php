@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('user.dish.index') }}">&larr; torna indietro</a>

        <div class="col-5 m-auto">
            <h1>Modifica piatto </h1>
            <form action="{{ route('user.dish.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4 row">
                    <label for="name" class="form-label">Nome Piatto</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ $dish->name }}">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-group mb-4 row">
                    <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto</label>
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="file" name="photo" id="photo" class="form-control px-0"
                        accept=".png, .jpg, .jpeg, .gif">
                    <div class="invalid-feedback" id="photo-feedback"></div>

                    @if ($dish->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $dish->photo) }}" alt="Current Photo" style="max-width: 100px;"
                                class="rounded-circle">
                        </div>
                    @endif
                </div>


                {{-- <div class="form-group mb-3">
                    <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto</label>
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="file" name="photo" id="photo" class="form-control"
                        accept=".png, .jpg, .jpeg, .gif">
                    <div class="invalid-feedback" id="photo-feedback"></div>

                    @if ($dish->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $dish->photo) }}" alt="Current Photo" style="max-width: 200px;">
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="delete_photo" id="delete_photo">
                            <label class="form-check-label" for="delete_photo">Cancella la foto</label>
                        </div>
                    @endif
                </div> --}}







                <div class="mb-4 row">
                    <label for="ingredients" class="form-label">Ingredienti</label>
                    <input type="text" name="ingredients" id="ingredients"
                        class="form-control @error('ingredients') is-invalid @enderror" value="{{ $dish->ingredients }}">

                    @error('ingredients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4 row">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        rows="5" maxlength="1000">{{ $dish->description }}"</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4 row">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="{{ $dish->price }}">

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 row">
                    <label>
                        <input type="radio" name="avaible" value="1"
                            {{ old('avaible', $dish->avaible) == 1 ? 'checked' : '' }}>
                        Disponibile
                    </label>
                    <label>
                        <input type="radio" name="avaible" value="0"
                            {{ old('avaible', $dish->avaible) == 0 ? 'checked' : '' }}> Non
                        disponibile
                    </label>
                </div>

                <button type="submit" class="btn btn-secondary
                ">Salva piatto</button>
            </form>
        </div>

    </div>
@endsection
@section('script')
    <script>
        function toggleInputImg() {
            let imgInput = document.getElementById("photo");
            let deleteImgCheckbox = document.getElementById("delete_photo");

            if (deleteImgCheckbox.checked) {
                imgInput.setAttribute("readonly", "readonly");
                imgInput.value = null; // Imposta il valore su null quando la foto viene cancellata
            } else {
                imgInput.removeAttribute("readonly");
            }
        }
    </script>
@endsection
