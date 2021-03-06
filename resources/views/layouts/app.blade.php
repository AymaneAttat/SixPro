<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UchiStore') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0f7fbb64e2.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'UchiStore') }}
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
                                            <a class="btn btn-dark btn-sm btn-block" href="">
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
                        @guest
                            <li class="nav-item">
                                @isset($url)
                                <a class="nav-link" href="{{ url("login/$url") }}">{{ __('Login') }}</a>
                                @else
                                <a class="nav-link" href="/login/customer">{{ __('Login') }}</a>
                                @endisset
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    @isset($url)
                                    <a class="nav-link" href="{{ url("register/$url") }}">{{ __('Register') }}</a>
                                    @else
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endisset
                                    
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
