<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0f7fbb64e2.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="{{asset('dist/img/icons/favicon.ico')}}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                         
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-pill badge-dark">
                                    <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                <ul class="list-group" style="margin: 20px;">
                                    @if(count(\Cart::getContent()) > 0)
                                        @foreach(\Cart::getContent() as $item)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <img src="/images/{{ $item->attributes->image }}" style="width: 50px; height: 50px;">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <b>{{$item->name}}</b>
                                                        <br><small>Qty: {{$item->quantity}}</small>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </li>
                                        @endforeach
                                        <br>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <b>Total: </b>${{ \Cart::getTotal() }}
                                                </div>
                                                <div class="col-lg-2">
                                                    <form action="{{ route('cart.clear') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <br>
                                        <div class="row" style="margin: 0px;">
                                            <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
                                                CART <i class="fa fa-arrow-right"></i>
                                            </a>
                                            <a class="btn btn-dark btn-sm btn-block" href="{{route('cart.checkout')}}">
                                                CHECKOUT <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    @else
                                        <li class="list-group-item">Your Cart is Empty</li>
                                    @endif
                                </ul>

                            </div>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-power-off" style="color: red;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="nav-link"><i class="fas fa-user"></i>{{ Auth::user()->name }}</a>
                                <a class="dropdown-item" href="{{ route('logoutCustomer') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-base').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-base" action="{{ route('logoutCustomer') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @include('sweetalert::alert')
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>