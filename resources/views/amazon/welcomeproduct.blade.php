@extends('layouts.amazonindex')
@section('admin')
    <div class="container overflow-hidden ">
        <div id="carouselExampleControls" class="carousel hii  slide data  " data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/caro1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/cara2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/cara3.jpg') }}" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/cara4.jpg') }}" alt="fourth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/cara5.jpg') }}" alt="fifth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/cara6.jpg') }}" alt="six slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('css/bootstrap/image/amazon/cara7.jpg') }}" alt="seven slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>







        {{-- cards --}}
        <div class="row  way">
            <div class="col-xl-3">


                <div class="row way1 h-75">


                    @foreach ($category as $values)
                        @if ($values->id == 3)
                            <h5 class="card-title text-center"> Up to 70% off | Deals on Amazon Brands & more</h5>
                            @foreach ($values->listproduct as $cada)
                                {{-- @dd($cada) --}}
                                <div class="col-xl-6">
                                    <a href="{{ route('search', 'categoryid=' . $values->id) }}">
                                        <img src="{{ asset('css/img/amazondbimage/' . $cada->product_image) }}"
                                            class="card-img-top img-fliud" alt="...">
                                        <p class="card-text">
                                            <h5 class=" two">{{ $cada->product_name }}</h5>
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>


            </div>
            <div class="col-xl-3">
                <div class="row way1 h-75">


                    @foreach ($category as $values)
                        @if ($values->id == 2)
                            <h5 class="card-title text-center"> Up to 75% off | Deals on Amazon Brands & more</h5>

                            @foreach ($values->listproduct as $cada)
                                <div class="col-xl-6">
                                    <a href="{{ route('search', 'categoryid=' . $values->id) }}">


                                        <img src="{{ asset('css/img/amazondbimage/' . $cada->product_image) }}"
                                            class="card-img-top img-fliud" alt="...">
                                        <p class="card-text">
                                            <h5 class=" two">{{ $cada->product_name }}</h5>
                                        </p>
                                    </a>
                                    {{-- <a href="#" class="btn btn-primary">Go</a> --}}
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>



            </div>
            <div class="col-xl-3">

                <div class="row way1 h-75">


                    @foreach ($category as $values)
                        @if ($values->id == 4)
                            <h5 class="card-title text-center"> Up to 80% off | Deals on Amazon Brands & more</h5>
                            @foreach ($values->listproduct as $cada)
                                <div class="col-xl-6">

                                    <a href="{{ route('search', 'categoryid=' . $values->id) }}">

                                        <img src="{{ asset('css/img/amazondbimage/' . $cada->product_image) }}"
                                            class="card-img-top img-fliud" alt="...">
                                        <p class="card-text">
                                            <h5 class=" two">{{ $cada->product_name }}</h5>
                                        </p>
                                    </a>
                                    {{-- <a href="#" class="btn btn-primary">Go</a> --}}
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3">

                <div class="row way1 h-75">


                    <div class="col-xl-6">
                        @if ($authuser)
                        <a class=" btn btn-warning" style="text-decoration:none"
                                    href="{{ route('userloggedout') }}">Logout</a>

                        @else
                        <h5 class="card-title1 text-center">Sign in for your best experience<h5>
                            <a class="btn btn-warning" style="text-decoration:none"
                            href="{{ route('login') }}">Login</a><br>

                        @endif



                    </div>
                    <img src="{{ asset('css/bootstrap/image/amazon/box1.gif') }}" alt="" srcset="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col ">
                @foreach ($category as $valuess)
                    @if ($valuess->id == 5)
                        <div class="row border-end-black">
                            @foreach ($valuess->listproduct as $fest)
                                <div class="col-xl-3  border border-black">
                                    <h5 class="card-title text-center"> Get allup |to to 70% off | Deals on Amazon Brands &
                                        more</h5>
                                    <br>
                                    <img src="{{ asset('css/img/amazondbimage/' . $fest->product_image) }}"
                                        class="card-img-top img-fliud" alt="...">
                                    <p class="card-text">
                                    <h5 class=" text-center  two">{{ $fest->product_name }}</h5>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <br> <br>

        <div class="trending">
            {{-- {{ $trend }} --}}
            <div class="row">

                    <h4>Trending Products</h4>
                    @foreach ($trend as $trends)
                        <div class="col-xl-3 border-end-black">

                            <div class="  border border-black">
                                <br>
                                <img src="{{ asset('css/img/amazondbimage/' . $trends->product_image) }}"
                                    class="card-img-top img-fliud" alt="...">
                                <p class="card-text">
                                <h5 class=" text-center  two">{{ $trends->product_name }}</h5>
                                </p>
                            </div>

                        </div>
                    @endforeach

            </div>
        </div>







    </div>
@endsection
