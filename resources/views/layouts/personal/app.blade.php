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
        <nav class="navbar p-0 wh-100">
           <div class="container-fluid align-items-stretch bg-yellow col-12">
            <div class="bg-yellow w-100 px-4 py-2 d-flex align-items-center justify-content-between">
                <h3 class="text-light">@yield('Page-name')</h3>
                <div class="text-white d-flex gap-2 justify-content-between align-items-center">
                    <a href="{{ route('profile.edit')}}" class="text-decoration-none text-black" id="profile">
                        <p class="mb-0">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                        <p class="mb-0 text-black-50 fs-s-7">Administrator</p>
                    </a>
                    <img src="https://placehold.co/50x50" class="rounded-circle">
                </div>
            </div>
           </div>
        </nav>
        <main class="main d-flex">          
            {{-- SideBar LEFT--}}
            <aside class="sidebar-left bg-aqua d-flex flex-column justify-content-between p-3">
                {{-- top icon --}}
                <div class="row row-cols-2 justify-content-center align-items-center mt-2 color-logo">
                    <img src="{{ asset('logo.png') }}" class="img-fluid w-25">
                    <h6 class="d-none d-md-inline-block">DELIVERY<span class="d-none text-aqua d-md-inline-block">BEE</span></h6>
                </div>
                <div class="input-group d-flex justify-content-center align-items-center">
                    <input type="text" class="form-control fs-s-6 rounded-3 w-75 px-4 py-3" placeholder="Cerca">
                    <span class="input-group">
                        <i class="fa-solid fa-magnifying-glass text-yellow py-1" style="font-size: 1rem;" aria-hidden="true"></i>
                    </span>
                </div>                
                <ul class="list-unstyled mt-5 px-5" >
                    <li class="my-4">
                        <a href="{{ route('user.restaurant.index') }}" class="aside-link text-decoration-none d-flex gap-4 justify-content-start align-items-center">
                            <i class="fa-solid fa-house fs-4"></i>
                            <span class="mb-0 fs-4">Dashboard</span>
                        </a>

                    </li>
                    <li class="my-4">
                        <a href="{{ route('user.order.index')}}" class="aside-link text-decoration-none d-flex gap-4 justify-content-start align-items-center">
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
                        <i class="fa-solid fa-arrow-right-from-bracket color-text pe-2"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </aside>
            <section class="overflow-y-scroll w-100" >
                @yield('content')
            </section>
        </main>
    </div>
@yield('script')
</body>
