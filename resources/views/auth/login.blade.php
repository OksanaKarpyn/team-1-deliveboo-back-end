@extends('layouts.app')

@section('content')
<div class="container mt-5 col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="row justify-content-center align-items-center">
        <div>
            <div class="card rounded-5">
                <div class="mt-5 text-center fs-5">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row justify-content-center">
                            <label for="email"></i></label>

                            <div class="col-md-8">
                                <input id="email" placeholder="👤 Username.." type="email" class="form-control rounded-5 fs-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row justify-content-center">
                            <label for="password"></label>

                            <div class="col-md-8">
                                <input id="password" placeholder="🔑 Password.." type="password" class="form-control rounded-5 fs-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row fs-s-7 justify-content-center">
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>    
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-4">
                            <div>
                                <button type="submit" class="btn btn-primary rounded-5 justify-content-center">
                                    {{ __('Accedi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
