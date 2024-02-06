@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class=" debug row justify-content-center align-items-end">
            <form method="POST" action="{{ route('register') }}" class="width-100 " id="formRegister">
                @csrf
                <div class="row justify-content-between align-items-stretch row-cols-1 row-cols-md-2">
                    <div class="debug col">
                        <div class="card h-100 debug bg-white p-2 p-md-4 rounded-5 margin-xy">
                            <div class="card-header bg-yellow rounded-5 text-center fs-5 fw-bold mb-4 custom-title">
                                {{ __('Registrati') }}</div>
                            <h4 class="text-center fs-6">Utente</h4>
                            {{-- Nome Utente --}}
                            <div class="mb-4 row justify-content-center align-items-center">
                                <div class="col-12  d-flex align-items-center gap-3">
                                    <input id="name" type="text"
                                        class="form-control fs-s-7 rounded-5 @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="* Nome" oninput=" validateName()">
                                </div>
                                {{-- error -message --}}
                                <div id="name-error" class="text-danger fs-s-7"></div>
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
                                        name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="* Cognome"
                                        required oninput=" validateLastName()">
                                </div>
                                {{-- error -message --}}
                                <div id="lastname-error" class="text-danger fs-s-7"></div>
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
                                        class="form-control fs-s-7 rounded-5 @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="* Email" oninput="validateEmail()">
                                </div>
                                {{-- errore-message --}}
                                <div id="email-error" class="text-danger fs-s-7"></div>
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
                                        name="password" required autocomplete="new-password" placeholder="* Password"
                                        oninput="validatePassword()">
                                </div>
                                <div id="password-error" class="text-danger fs-s-7"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Conferma Password --}}
                            <div class="mb-4 row justify-content-center align-items-center">

                                <div class="col-12 d-flex align-items-center gap-3">
                                    <input id="password-confirm" type="password"
                                        class="form-control fs-s-7 rounded-5 @error('password-confirm') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="* Conferma Password" oninput="validateConfirmPassword()">
                                </div>
                                <div id="password-confirm-error" class="text-danger fs-s-7"></div>
                                @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center pb-2">
                                <h5>
                                    Ci Sei quasi..
                                    <br>
                                    <br class="br-none">
                                    <span class="none-two">Completa il riquadro accanto</span>
                                    <span class="none">➡️</span>
                                </h5>
                            </div>
                        </div>
                    </div>

                    {{-- Sezione registrazione Ristorante --}}
                    <div class="debug col">
                        <div class="card debug bg-white p-2 p-md-4 rounded-5 margin-xy">
                            <div class="card-header text-center bg-aqua rounded-5 fs-5 fw-bold mb-4 custom-title">
                                {{ __('Registra Attività') }}</div>
                            <h4 class="text-center fs-6">Ristorante</h4>
                            {{-- Nome ristorante --}}
                            <div class="mb-4 row justify-content-center align-items-center">
                                <div class="col-12 d-flex align-items-center gap-3">
                                    <input id="activity_name" type="text"
                                        class="form-control fs-s-7 rounded-5 @error('activity_name') is-invalid @enderror"
                                        name="activity_name" value="{{ old('activity_name') }}"
                                        autocomplete="activity_name" oninput="validateActivityName()"
                                        placeholder="* Nome Attività">
                                </div>
                                {{-- errore-message --}}
                                <div id="activity-name-error" class="text-danger fs-s-7"></div>
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
                                        class="form-control fs-s-7 rounded-5 @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address') }}" autocomplete="address"
                                        oninput="validateAddress()" placeholder="* Indirizzo">
                                </div>
                                {{-- error---message --}}
                                <div id="address-error" class="text-danger fs-s-7"></div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4 row justify-content-center align-items-center">
                                <div class="col-12 d-flex align-items-center gap-3">
                                    <input id="phone" type="text"
                                        class="form-control fs-s-7 rounded-5 @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                        placeholder="* Telefono" oninput="validatePhoneNumber()">
                                </div>
                                <div id="phone-error" class="text-danger fs-s-7"></div>
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
                                        class="form-control fs-s-7 rounded-5 @error('p_iva') is-invalid @enderror"
                                        name="p_iva" value="{{ old('p_iva') }}" autocomplete="p_iva"
                                        placeholder="* Partita Iva" oninput="validateIva()">

                                </div>
                                {{-- errore--message --}}
                                <div id="piva-error" class="text-danger fs-s-7"></div>
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
                                {{-- errore---message --}}
                                <div id="typology-error" class="text-danger fs-s-7"></div>
                                <div class="row row-cols-2 row-cols-md-3 gy-1">
                                    @foreach ($types as $type)
                                        <div class="form-check">
                                            <input class="form-check-input @error('types') is-invalid @enderror"
                                                type="checkbox" name="types[]" value="{{ $type->id }}"
                                                id="type-checkbox-{{ $type->id }}" oninput="validateTypologies()">
                                            <label class="form-check-label fs-s-6"
                                                for="type-checkbox-{{ $type->id }}">
                                                {{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- Pulsante Conferma --}}
                <div class="row justify-content-center align-items-center my-5 px-4">
                    <button type="submit" class="col-12 col-md-12 btn btn-primary rounded-5 p-2 w-50 w-md-25"
                        onclick="submitForm(event)">
                        {{ __('Iscriviti a DevileryBee') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function submitForm(event) {
            let isValidate = validateName() && validateLastName() && validateEmail() && validatePassword() &&
                validateActivityName() &&
                validateAddress() && validatePhoneNumber() && validateIva() && validateTypologies();
            if (isValidate) {
                document.getElementById('formRegister').submit();
                return true;
            } else {
                validateName();
                validateLastName();
                validateEmail();
                validatePassword();
                validateActivityName();
                validateAddress();
                validatePhoneNumber();
                validateIva();
                validateTypologies()
                event.preventDefault(); // Serve per bloccare l'invio del form
                return false;
            }
        }

        function validateName() {
            let nameInput = document.querySelector('input[name="name"]');
            let nameValue = nameInput.value;
            let nameError = document.querySelector('#name-error');
            if (!nameValue.trim()) {
                nameError.textContent = 'Il campo "Nome" deve essere compilato.';
                nameInput.classList.add('is-invalid');
                return false;
            } else {
                nameError.textContent = '';
                nameInput.style.border = '1px solid green';
                nameInput.classList.remove('is-invalid');
                return true;
            }
        }

        function validateLastName() {
            let lastNameInput = document.querySelector('input[name="lastname"]');
            let lastNameValue = lastNameInput.value;
            let lastNameError = document.querySelector(
                '#lastname-error');
            if (!lastNameValue.trim()) {
                lastNameError.textContent = 'Il campo "Cognome" deve essere compilato.';
                lastNameInput.classList.add('is-invalid');
                return false;
            } else {
                lastNameError.textContent = '';
                lastNameInput.style.border = '1px solid green';
                lastNameInput.classList.remove('is-invalid');
                return true;
            }
        }

        function validateEmail() {
            let emailInput = document.querySelector('input[name="email"]');
            let emailValue = emailInput.value;
            let emailError = document.querySelector('#email-error');

            if (!emailValue.trim()) {
                emailError.textContent = 'Il campo "Email" non può essere vuoto.';
                emailInput.classList.add('is-invalid');
                return false;
            }

            if (!emailValue.includes('@')) {
                emailError.textContent = 'Inserisci un indirizzo email valido.';
                emailInput.classList.add('is-invalid');
                return false;
            }

            emailError.textContent = '';
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            return true;
        }

        function validatePassword() {
            let passwordIntput = document.querySelector('input[name="password"]');
            let passwordValue = passwordIntput.value;
            let passwordError = document.querySelector('#password-error');

            if (!passwordValue) {
                passwordError.textContent = 'Il campo "Password" deve essere compilato.';
                passwordIntput.classList.add('is-invalid');
                return false;
            } else {
                passwordError.textContent = '';
                passwordIntput.style.border = '1px solid green';
                passwordIntput.classList.remove('is-invalid');
                return true;
            }

        }

        function validateConfirmPassword() {
            let confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
            let confirmPasswordValue = confirmPasswordInput.value;
            let passwordValue = document.querySelector('input[name="password"]').value;
            let passwordConfirmError = document.querySelector('#password-confirm-error');

            if (!confirmPasswordValue.trim()) {
                confirmPasswordInput.style.border = '1px solid red';
                passwordConfirmError.textContent = 'Il campo "Conferma Password" deve essere compilato.';
                return false;
            } else if (passwordValue !== confirmPasswordValue) {
                passwordConfirmError.textContent = 'Le password non corrispondono.';
                confirmPasswordInput.style.border = '1px solid red';
                confirmPasswordInput.classList.add('is-invalid');
                return false;
            } else {
                passwordConfirmError.textContent = '';
                confirmPasswordInput.style.border = '1px solid green';
                confirmPasswordInput.classList.remove('is-invalid');
                confirmPasswordInput.classList.add('is-valid');
                return true;
            }
        }

        function validateActivityName() {
            let activityNameInput = document.querySelector('input[name="activity_name"]');
            let activityName = activityNameInput.value;
            let activityNameError = document.querySelector('#activity-name-error');

            if (!activityName.trim()) {
                activityNameError.textContent = '"Nome Attività" deve essere compilato.';
                activityNameInput.classList.add('is-invalid');
                return false;
            } else {
                activityNameError.textContent = '';
                activityNameInput.style.border = '1px solid green';
                activityNameInput.classList.remove('is-invalid');
                return true;
            }
        }

        function validateAddress() {
            let addressInput = document.querySelector('input[name="address"]')
            let address = addressInput.value;
            let addressError = document.querySelector('#address-error');
            if (!address) {
                addressError.textContent = 'Il campo "Indirizzo" deve essere compilato.';
                addressInput.classList.add('is-invalid');
                return false
            } else {
                addressError.textContent = '';
                addressInput.style.border = '1px solid green';
                addressInput.classList.remove('is-invalid');
                return true;
            }
        }

        function validatePhoneNumber() {
            let phoneInput = document.querySelector('input[name="phone"]');
            let phoneNumber = phoneInput.value;
            let phoneError = document.querySelector('#phone-error');

            // Rimuovi eventuali spazi vuoti
            phoneNumber = phoneNumber.replace(/\s/g, '');

            // Verifica se il numero di telefono è vuoto o contiene solo spazi vuoti
            if (!phoneNumber.trim()) {
                phoneError.textContent = 'Il campo "Telefono" non può essere vuoto.';
                phoneInput.classList.add('is-invalid');
                return false;
            }

            // Verifica se il numero di telefono contiene solo cifre
            if (!/^\d+$/.test(phoneNumber)) {
                phoneError.textContent = 'Il numero di telefono può contenere solo cifre.';
                phoneInput.classList.add('is-invalid');
                return false;
            }

            // Pulisci eventuali errori precedenti
            phoneError.textContent = '';
            phoneInput.style.border = '1px solid green';
            phoneInput.classList.remove('is-invalid');
            return true;
        }

        function validateIva() {
            let pIvaInput = document.querySelector('input[name="p_iva"]');
            let pIvaValue = pIvaInput.value;
            let pIvaError = document.querySelector('#piva-error');
            let pivaRegex = /^\d{11}$/;
            if (!pIvaValue || !pivaRegex.test(pIvaValue)) {
                pIvaError.textContent = 'Inserisci una Partita IVA valida (11 cifre).';
                pIvaInput.classList.add('is-invalid');
                pIvaInput.style.border = '1px solid red';
                return false
            } else {
                pIvaInput.classList.remove('is-invalid');
                pIvaInput.classList.add('is-valid');
                pIvaInput.style.border = '1px solid green';
                pIvaError.textContent = '';
                return true;
            }
        }

        function validateTypologies() {
            let typologyCheckboxes = document.querySelectorAll('input[name="types[]"]');
            let typologyError = document.querySelector('#typology-error');
            let isChecked = Array.from(typologyCheckboxes).some(checkbox => checkbox.checked);

            if (!isChecked) {
                typologyError.textContent = 'Seleziona almeno una tipologia.';
                typologyCheckboxes.forEach(checkbox => {
                    checkbox.classList.add('is-invalid');
                });
                return false;
            } else {
                typologyError.textContent = '';
                typologyCheckboxes.forEach(checkbox => {
                    checkbox.classList.remove('is-invalid');
                });
                return true;
            }
        }
    </script>
@endsection
