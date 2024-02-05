<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Single+Day&display=swap" rel="stylesheet">


    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--  Vite -->
    @vite('resources/js/app.js')
</head>

<body>
    <div id="app">
        {{-- Contenitore generale grande tutto il viewport--}}
        <div class="w-100 vh-100 d-flex">
            {{-- SideBar laterale--}}
            <aside class="bg-primary d-none d-md-flex flex-column h-100">
                <div class="bg-row"></div>
                <div class="row row-cols-2 justify-content-center align-items-center mt-2">
                    <img src="{{ asset('logo.png') }}" class="img-fluid w-25">
                    <p class="fs-5 fw-bold text-yellow mb-0">DELIVERBEE</p>
                </div>
                <div class="my-2 d-flex justify-content-center align-items-center">
                    <input type="text" class="form-control fs-s-6 rounded-3 w-75 px-4 py-3" placeholder="Cerca">
                    <div><i class="fa-solid fa-magnifying-glass text-yellow "></i></div>
                </div>
                <ul class="list-unstyled mt-5 px-5" >
                    <li class="my-4">
                        <a href="{{ route('user.restaurant.index') }}" class="aside-link text-decoration-none d-flex gap-4 justify-content-start align-items-center">
                            <i class="fa-solid fa-house fs-4"></i>
                            <span class="mb-0 fs-4">Dashboard</span>
                        </a>

                    </li>
                    <li class="my-4">
                        <a href="" class="aside-link text-decoration-none d-flex gap-4 justify-content-start align-items-center">
                            <i class="fa-solid fa-folder fs-4"></i>
                            <span class="mb-0 fs-4">Ordini</span>
                        </a>

                    </li>
                    <li class="my-4">
                        <a href="{{ route('user.dish.index')}}" class="aside-link text-decoration-none d-flex gap-4 justify-content-start align-items-center">
                            <i class="fa-solid fa-bars fs-4"></i>
                            <span class="mb-0 fs-4">Lista Piatti</span>
                        </a>

                    </li>
                </ul>
                <hr class="w-75 mt-5 mx-auto">
                    <a class="gap-2 text-decoration-none fs-5 mt-auto mb-3 logout text-center" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </aside>
            <main class="col-10">
                <div class="h-15 bg-yellow px-4 py-2 d-flex align-items-end justify-content-between">
                    <h3 class="text-light">@yield('Page-name')</h3>
                    <div class="text-white d-flex gap-2 justify-content-between align-items-center">
                        <div>
                            <p class="mb-0">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                            <p class="mb-0 text-black-50 fs-s-7">Administrator</p>
                        </div>
                        <img src="https://placehold.co/50x50" class="rounded-circle">
                    </div>
                </div>
                <section class="overflow-y-scroll content" >
                    @yield('content')
                </section>

            </main>
        </div>
    </div>
@yield('script')
</body>
