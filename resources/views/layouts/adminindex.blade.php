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

    <div class="row mart1  navbar-dark bg-dark ">
        <div class="col-xl-1 ">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('css/bootstrap/image/amazon/amazonlogo.png') }}" alt="amazonlogo" srcset=""
                        class="img-fluid  ">
                </a>
            </div>
        </div>
        <div class="col-xl-4 p-2  overflow-hidden">



            <a href="{{ route('adminlist') }}" class="save ms-4">List of Products</a>

            <a href="{{ route('add') }}" class="save ms-4" >Add list</a>
            <a href="{{ route('categories_list') }}" class="save ms-4" >Add Categories list</a>
            <a href="{{ route('categories_view') }}" class="save ms-4" >View Categories </a>
        </div>

        {{-- dropdown --}}

        <div class="col-xl-4 p-2">



            <form action="{{ route('adminsearch') }}" method="GET">
                @csrf

                <select name="categoryid">
                    <option value="">All</option>
                    @foreach ($category as $list)
                        <option value="{{ $list->id }}"><br>{{ $list->category_name }}

                        </option>
                    @endforeach


                </select>


                <input class="w-75" type="text" class="form-control " placeholder="search amazon in" aria-label=""
                    name="search"  aria-describedby="basic-addon1" disabled>
                <button type="submit" class="btn btn-warning "><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>



        </div>
        <div class="col-xl-1 logo3">
            <div class="logo2">

                <img src="{{ asset('css/bootstrap/image/amazon/flag.png') }}" alt="nologo" srcset=""
                    class="img-fluid p-2 ">

                <p class="text-white mt-4">EN</p>
            </div>


        </div>
        <div class="col-xl-1 logins mt-1">
            <a href="#" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- @if ($authuser)
                    <span class="wel">Welcome User</span>
                    <p>{{ $authuser->name }}</p>
                @else
                    <p class="text-white ">Hello, Sign</p>
                    <p class="text-white">Accounts&Lits</p>
                @endif --}}

                <h5>Welcome admin</h5>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <div class="row text-center">
                        <div class="col-xl-12">
                            <div class="btn btn-warning">Logout</div>
                        </div>
                        <hr>


                        <div class="col-xl-6 ">
                            <h5>Your Lists</h5>
                            <ul>
                                <li>Create a wish list</li>
                                <li>Wish from website</li>
                                <li>Baby wishlist</li>
                            </ul>

                        </div>
                        <div class="col-xl-6">
                            <h5>Your Accounts</h5>
                            <ul>
                                <li>Your Accounts</li>
                                <li>Your Order</li>
                                <li>Your Wish List</li>
                            </ul>
                        </div>

                    </div>
                </div>


            </a>
        </div>
        <div class="col-xl-1  mt-1">
            <form action="">
                @csrf

                <a style="text-decoration:none" href="{{ route('userloggedout') }}">Logout</a>

            </form>


        </div>
        {{-- <div class="col-xl-1 logins">
            <p class="text-white mt-4">Returns&Orders</p>

        </div>
        <div class="col-xl-1 logins text-white">
            <div class="logo4">
                <a href="{{ route('addtocart_view') }}">
                    <img src="{{ asset('css/bootstrap/image/amazon/cart_logo.png') }}" alt="cartlogo" srcset=""
                        class="img-fluid  "><span class="py-5"> Cart</span>
                </a>
            </div>

        </div> --}}
    </div>



    @yield('adminpage')


    {{-- footer --}}

    <footer class="btm mt-4">
        <a href="#" class="btn btn-dark w-100">Back to top</a>
        {{-- <button class="btn btn-dark w-100">Back to top</button> --}}
        <div class="footer_content overflow-hidden">

            <div class="row  overflow-hidden">
                <div class="col-xl-3">
                    <ul>
                        <li>
                            <h5>
                                <a href="">Get to know</a>
                            </h5>
                        </li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press Releases</a></li>
                        <li><a href="#">Amazon Science
                            </a></li>
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul>
                        <li>
                            <h5>
                                <a href="">Connect with Us</a>
                            </h5>
                        </li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>

                    </ul>

                </div>
                <div class="col-xl-3">
                    <ul>
                        <li>
                            <h5>
                                <a href="">
                                    Make Money with Us</a>
                            </h5>
                        </li>
                        <li><a href="#">Sell on Amazon</a></li>
                        <li><a href="#">Sell under Amazon Accelerator</a></li>
                        <li><a href="#">Protect and Build Your Brand</a></li>
                        <li><a href="#">Amazon Global Selling</a></li>
                        <li><a href="#">Protect and Build Your Brand</a></li>
                        <li><a href="#">Become an Affiliate</a></li>
                        <li><a href="#">Fulfilment by Amazon</a></li>
                        <li><a href="#">Advertise Your Products</a></li>
                        <li><a href="#">Amazon Pay on Merchants</a></li>

                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul>
                        <li>
                            <h5>
                                <a href="">
                                    Let Us Help You</a>
                            </h5>
                        </li>
                        <li><a href="#">COVID-19 and Amazon</a></li>
                        <li><a href="#">Your Account</a></li>
                        <li><a href="#">Returns Centre</a></li>
                        <li><a href="#">100% Purchase Protection</a></li>
                        <li><a href="#">Amazon App Download</a></li>
                        <li><a href="#">Help</a></li>

                    </ul>

                </div>
                <hr>
                <div class="drop overflow-hidden">
                    <div class="row mt-3">
                        <div class="col">
                            <img src="{{ asset('css/bootstrap/image/amazon/amazonlogo.png') }}" alt="amazonlogo"
                                srcset="" class="img-fluid  ">
                        </div>
                        <div class="col mt-4">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    ENGLISH
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <br><br><br><br><br>

                <div class="row">
                    <div class="col-12">
                        <div class="overflow-hidden">
                            <ul class="footer_line gap-4 overflow-hidden">
                                <li><a href="#">Australia</a></li>
                                <li><a href="#">Brazil</a></li>
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">France</a></li>
                                <li><a href="#">Germany</a></li>
                                <li><a href="#">Italy</a></li>
                                <li><a href="#">Japan</a></li>
                                <li><a href="#">Mexico</a></li>
                                <li><a href="#">Netherlands</a></li>
                                <li><a href="#">Poland</a></li>
                                <li><a href="#">Singapore</a></li>
                                <li><a href="#">Spain</a></li>
                                <li><a href="#">Turkey</a></li>
                                <li><a href="#">United Arab Emirates</a></li>
                                <li><a href="#">United Kingdom</a></li>
                                <li><a href="#">United States</a></li>
                            </ul>
                        </div>
                    </div>
                </div>






            </div>
        </div>
        <div class="last overflow-hidden">
            <div class="row">
                <div class="col-xl-3">
                    <ul>
                        <li><a href="#">AbeBooks</a></li>
                        <li><a href="#">Books,Art</a></li>
                        <li><a href="#">&Collection</a></li><br>
                        <li><a href="#">Shopbop</a></li>
                        <li><a href="#">Designer</a></li>
                        <li><a href="#">Fashion Brands</a></li>
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul>
                        <li><a href="#">AbeBooks</a></li>
                        <li><a href="#">Books,Art</a></li>
                        <li><a href="#">&Collection</a></li><br>
                        <li><a href="#">Shopbop</a></li>
                        <li><a href="#">Designer</a></li>
                        <li><a href="#">Fashion Brands</a></li>
                    </ul>

                </div>
                <div class="col-xl-3">
                    <ul>
                        <li><a href="#">AbeBooks</a></li>
                        <li><a href="#">Books,Art</a></li>
                        <li><a href="#">&Collection</a></li><br>
                        <li><a href="#">Shopbop</a></li>
                        <li><a href="#">Designer</a></li>
                        <li><a href="#">Fashion Brands</a></li>
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul>
                        <li><a href="#">AbeBooks</a></li>
                        <li><a href="#">Books,Art</a></li>
                        <li><a href="#">&Collection</a></li><br>
                        <li><a href="#">Shopbop</a></li>
                        <li><a href="#">Designer</a></li>
                        <li><a href="#">Fashion Brands</a></li>
                    </ul>
                </div>
            </div>
            <div class="last3 mt-2 overflow-hidden">
                <div class="row">
                    <div class="col-xl-12">
                        Conditions of Use & Sale
                        Privacy Notice
                        Interest-Based Ads <br>
                        © 1996-2023, Amazon.com, Inc. or its affiliates

                    </div>
                </div>
            </div>


        </div>
    </footer>
    <script src="{{ asset('css/bootstrap-5.3.0-dist/js/bundle-min.js') }}"></script>
    <script src="{{ asset('js/test.js') }}" defer></script>
</body>



</html>
