@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center mx-2">
            <div class="col-md-4 col-12 bg-white p-2 p-md-4 rounded-5">
                <div class="card-header text-center fs-2 fw-bold mb-4">{{ __('Registrati') }}</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- Sezione di registrazione dell'utente --}}
                    <h3 class="text-center">Utente</h3>
                    {{-- Nome Utente --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12  d-flex align-items-center gap-3">
                            <input id="name" type="text"
                                class="form-control fs-s-7 rounded-5 @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">
                            <span class="text-danger">*</span>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Cognome Utente --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input type="text"
                                class="form-control fs-s-7 rounded-5 @error('lastname') is-invalid @enderror"
                                name="lastname" id="lastname " name="lastname" value="{{ old('lastname') }}"
                                placeholder="Cognome" required>
                            <span class="text-danger">*</span>
                        </div>
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Email Utente --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="email" type="email"
                                class="form-control fs-s-7 rounded-5 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            <span class="text-danger">*</span>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Password  --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="password" type="password"
                                class="form-control fs-s-7 rounded-5 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" placeholder="Password">
                            <span class="text-danger">*</span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Conferma Password --}}
                    <div class="mb-4 row justify-content-center align-items-center">

                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="password-confirm" type="password" class="form-control fs-s-7 rounded-5"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Conferma Password">
                            <span class="text-danger">*</span>
                        </div>

                    </div>



                    {{-- Sezione registrazione Ristorante --}}
                    <h3 class="text-center">Ristorante</h3>

                    {{-- Nome ristorante --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="activity_name" type="text"
                                class="form-control fs-s-7 rounded-5 @error('activity_name') is-invalid @enderror"
                                name="activity_name" value="{{ old('activity_name') }}" autocomplete="activity_name"
                                oninput="validateActivityName()" placeholder="Nome Attività">
                            <span class="text-danger">*</span>
                        </div>
                        @error('activity_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Indirizzo Ristorante --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="address" type="text"
                                class="form-control fs-s-7 rounded-5 @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}" autocomplete="address" oninput="validateAddress()"
                                placeholder="Indirizzo">
                            <span class="text-danger">*</span>
                        </div>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="phone" type="text"
                                class="form-control fs-s-7 rounded-5 @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" autocomplete="phone" oninput="validateAddress()"
                                placeholder="Telefono">
                            <span class="text-danger">*</span>
                        </div>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Partita iva --}}
                    <div class="mb-4 row justify-content-center align-items-center">
                        <div class="col-12 d-flex align-items-center gap-3">
                            <input id="p_iva" type="text"
                                class="form-control fs-s-7 rounded-5 @error('p_iva') is-invalid @enderror" name="p_iva"
                                value="{{ old('p_iva') }}" autocomplete="p_iva" placeholder="Partita Iva">
                            <span class="text-danger">*</span>
                        </div>
                        @error('p_iva')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Tipologie --}}
                    <div class="mb-4 row justify-content-center">
                        @error('types')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <label for="types" class="form-label">Tipologia</label>
                            <span class="text-danger">*</span>
                        </div>
                        <div class="row row-cols-2 row-cols-md-3 gy-1">
                            @foreach ($types as $type)
                                <div class="form-check">
                                    <input class="form-check-input @error('types') is-invalid @enderror" type="checkbox"
                                        name="types[]" value="{{ $type->id }}"
                                        id="type-checkbox-{{ $type->id }}">

                                    <label class="form-check-label fs-s-6" for="type-checkbox-{{ $type->id }}">
                                        {{ $type->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Pulsante Conferma --}}
                    <div class="row align-items-center justify-content-center px-4">
                        <button type="submit" class="col-12 col-md-12 btn btn-primary rounded-5 p-2">
                            {{ __('Register') }}
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection
