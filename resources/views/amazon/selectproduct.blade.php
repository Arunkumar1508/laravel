@extends('layouts.amazonindex')

@section('admin')
    <div class="row">
        <div class="col-xl-2">
            {{-- <div class="small">

                <img src="{{ asset('css/img/amazondbimage/' . $moves[0]->product_image) }}" class="card-img-top"
                            alt="..." style="width: 100px">

            </div> --}}



        </div>

        <div class="col-xl-10">


            <div class="row">
                <div class="col-xl-4">
                    <h3  class="vv"> {{ $moves[0]->product_name }}</h3>

                    <img src="{{ asset('css/img/amazondbimage/' . $moves[0]->product_image) }}" class="card-img-top"
                        alt="..." style="width: 400px">


                </div>
                <div class="col-xl-5 "><br>

                    <h5>Description:</h5>
                    <h5> {{ $moves[0]->product_description }}</h5>
                    <hr>
                    <h4>Price:</h4>
                    <h4><i class="fa-solid fa-indian-rupee-sign"></i> {{ $moves[0]->product_price }}</h4>
                    <p>Inclusive of all taxes
                        EMI starts at ₹2,763. No Cost EMI available EMI options
                        Coupon
                        <br>
                        Apply ₹4000 coupon Terms | Shop items
                    </p>
                    <hr>

                    <div class="row">
                        <i class="fa-solid fa-percent" style="color: #4a4e54;">Offer</i> <br>
                        <div class="col-xl-4 slid">
                            <h5>Partner Offers</h5>
                            <p>Receive 1 Free Buds on Checkout on purchase of Oneplus 11 free when you purchase 1 or more
                                Qualifying items offered by Darshita Electronics</p>
                        </div>
                        <div class="col-xl-4 slid">
                            <h5>Bank Offer</h5>
                            <p>Additional Flat INR 2250 Instant Discount on ICICI Bank Credit Cards (excluding Amazon Pay
                                ICICI Credit Card) Credit Card Txn. Minimum purchase value INR 5000</p>
                        </div>
                        <div class="col-xl-4 slid">
                            <h5>No Cost EMI</h5>
                            <p>Upto ₹4,647.24 EMI interest savings on select Credit Cards</p>
                            <p>No Cost EMI available on Amazon Pay Later.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col">
                            <i class="fa-solid fa-gift"> <br> <br>7 days Service Replacement</i>
                        </div>
                        <div class="col"><i class="fa-solid fa-car-side"><br> <br>Free Delivery</i></div>
                        <div class="col"><i class="fa-solid fa-shield-halved"><br> <br>1 Year Warranty</i></div>
                        <div class="col"><i class="fa-solid fa-trophy"><br> <br>Top Brand</i></div>
                        <div class="col"><i class="fa-solid fa-truck"><br> <br>Amazon Delivered</i></div>
                        <div class="col"></div>


                    </div>
                </div>


                <div class="col-xl-3 mt-5">
                    <div class="row just">
                        <div class="col">


                            {{-- <input type="radio" id="html" name="fav_language" value="HTML"> --}}
                            <label for="">
                                With Exchange
                                Up to 7,550 off</label><br>


                            <h5><a href="#" style="
                                    color: black;">Delivering to
                                    Madurai 625020 - Update location </a></h5><br>

                            <h6>In stock</h6>

                            <p>Sold by Darshita Electronics and Fulfilled by Amazon.
                            </p>
                            {{-- @dd(auth()->user()); --}}

                            <h6>Add a Protection Plan:</h6>
                            <div class="bds">
                                @if ($authuser)
                                <button class="btn btn-warning plan w-50" ng-click="homeCtrl.addtoCart({{ $moves[0]->id }},{{  $authuser->id }})">Add
                                    to Cart</button><br><br>

                                @endif
                                <a href="{{ route('buy',$moves[0]->id) }}" class="btn btn-warning  plan w-50" >Buy Now</a>

                                {{-- <button class="btn btn-warning    >Buy Now</button> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>




    </div>
@endsection
