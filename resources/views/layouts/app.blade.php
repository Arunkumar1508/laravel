<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.0-dist/css/bootstrap-min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/style.css') }}">
</head>

<body ng-app="myApp" ng-controller="HomeController as homeCtrl">

    <div id="app">

        <section class="px-5 py-3">

            <header class="container mx-auto">
                <h1>
                    <img src="{{ asset('css/bootstrap/image/amazon/amazonlogo.png') }}" class="bg-dark"  style="width:80px; heigth:80px"
                        alt="no" srcset="">
                  Amazon


                </h1>
            </header>
        </section>



        <main class="container ">
            <div class="container">
                @if (auth()->check())
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            @include('links')
                        </div>
                    </div>
                @endif
                <div class="col-lg-6 col-md-6">
                    @yield('content')
                </div>
                @if (auth()->check())
                    <div class="col-lg-3 col-md-3">
                        @include('friends')
                    </div>
                @endif
            </div>

        </main>
    </div>




</body>

</html>
