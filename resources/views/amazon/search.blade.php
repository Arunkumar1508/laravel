@extends('layouts.amazonindex')

@section('admin')
    <div class="row">
        <div class="col-xl-3">
            <div class="slide3">
                <form action="">
                    <ul>
                        <li>
                            <h5>Delivery Day</h5>
                        </li>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">Get It by Tomorrow</label><br>
                        <input type="checkbox" id="vehicle2" name="vehicle2" value="">
                        <label for="vehicle2">Get It in 2 Days</label><br>
                    </ul>
                </form>

            </div>




            <div class="slide1">
                <ul>
                    <li>
                        <h5>Category</h5>
                    </li>
                    <li>Smartphones & Basic Mobiles</li>
                    <li>Smartphones</li>
                    <li>Basic Mobiles</li>
                    <li>Mobile Accessories</li>
                </ul>

            </div>

            <div class="slide2">
                <ul>
                    <li>
                        <h5>Brand</h5>
                    </li>

                    <form action="">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">Apple</label><br>
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">Samsung</label><br>
                        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                        <label for="vehicle2">realme</label><br>
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                        <label for="vehicle3"> OnePlus</label><br>
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                        <label for="vehicle3"> Xiaomi</label><br>
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                        <label for="vehicle3"> Nokia</label><br>
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                        <label for="vehicle3"> Redmi</label><br>
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                        <label for="vehicle3"> Lava</label><br>

                    </form>

                </ul>
            </div>
            <div class="slide4">
                <ul>
                    <li>
                        <h5>Price</h5>
                    </li>
                    <li>Under ₹1,000</li>
                    <li>₹1,000 - ₹5,000</li>
                    <li>₹5,000 - ₹10,000</li>
                    <li>₹10,000 - ₹20,000</li>
                    <li>Over ₹20,000</li>
                </ul>
            </div>

            <div class="slide5">
                <ul>
                    <li>
                        <h5>Discount</h5>
                    </li>
                    <li>10% Off or more</li>
                    <li>25% Off or more</li>
                    <li>35% Off or more</li>
                    <li>50% Off or more</li>
                    <li>60% Off or more</li>
                    <li>70% Off or more</li>
                </ul>
            </div>
            <div class="slide6">

                <ul>
                    <li>
                        <h5>Customer Review</h5>
                    </li>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                </ul>
                <ul>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                </ul>
                <ul>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>

                </ul>
                <ul>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>

                </ul>
                <ul>
                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>


                </ul>

            </div>




        </div>



        <div class="col-xl-9">
            {{-- {{ $view }} --}}
            @if (count($view) > 0)
                @foreach ($view as $show)
                    {{-- @dd($show) --}}
                    <div class="row">
                        <div class="col-xl-3">
                            <h3>{{ $show->product_name }}</h3>
                            <a href="{{ route('move', $show->id) }}">
                                <img src="{{ asset('css/img/amazondbimage/' . $show->product_image) }}" class="card-img-top"
                                    alt="..." style="width: 200px">
                            </a>
                        </div>
                        <div class="col-xl-6 "><br>
                            <h5>Description:</h5>
                            <h5>{{ $show->product_description }}</h5>

                            <h4>Price:</h4>
                            <h4><i class="fa-solid fa-indian-rupee-sign"></i> {{ $show->product_price }}</h4>

                            <div class="fest">
                                <h5>Great Indian Festival</h5>
                            </div>
                            <p>M.R.P: ₹{{ $show->product_price }} (47% off)
                                Get it by Tomorrow, November <br><br>
                                <span class="ios"> FREE Delivery by Amazon</span>
                            </p>
                        </div>
                        <div class="col-xl-3"></div>
                    </div>
                @endforeach
            @else
                <div class="wrong">

                    <h3>Your Search Product is not Found</h3>
                </div>
            @endif
        </div>




    </div>
@endsection
