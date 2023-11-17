@extends('layouts.amazonindex')
@section('admin')
    {{-- {{ $daws }} --}}

    {{-- <button class="btn btn-info" ng-click="homeCtrl.alldata()">all</button> --}}

    <div class="row">


        <div class="col-xl-2"></div>
        <div class="col-xl-7">
            <h4>Shopping Cart</h4>
            <div class="row">
                @foreach ($daws as $dew)
                    @if ($dew->user_id == auth()->user()->id)
                        <div class="col-xl-12">
                            <div class="row">





                                <div class="col-xl-6">

                                    <h3>{{ $dew->product_name }}</h3>

                                    <img src="{{ asset('css/img/amazondbimage/' . $dew->product_image) }}"
                                        class="card-img-top" alt="no-image" style="width: 180px">
                                    <hr>
                                </div>




                                <div class="col-xl-6 lbw">
                                    <h5>Description:</h5>
                                    {{ $dew->product_description }}
                                    <br>
                                    <span class="baggi">27%off</span>
                                    <br>
                                    <h4>M.R.P: ₹{{ $dew->product_price }}</h4>


                                    <div>
                                        <h5>Quantity:</h5>
                                        <span>No Of Quantity:{{ $dew->product_quantity }} </span>


                                        {{-- <select name="" id="" >
                                            <option value=""></option> --}}
                                        {{-- <option value="">0</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option> --}}
                                        {{-- </select> --}}
                                        {{-- @dd($dew->id); --}}
                                    </div>
                                    <button type="submit" class="btn btn-danger"
                                        ng-click='homeCtrl.remove($event,{{ $dew->product_id }})'>Remove</button>
                                    <a href="{{ route('buy', $dew->product_id) }}" class="btn btn-warning ">Buy</a>


                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-xl-3 text-center  quea">
            {{-- {{ $counts }} --}}


            <div class="border">


                @if ($dew->user_id == auth()->user()->id)
                    <p>
                    <h4>Number Of Products</h4>
                    </p><br>
                    <p>
                    <h5>Category Quanitiy</h5>{{ $counts }}</p>
                    <p>
                    <h5>Total Count</h5>{{ $sum }}</p>
                    {{-- <a href="{{ route('buy', $dew->product_id) }}" class="btn btn-warning w-50">Buy</a> --}}
                    {{-- <button class="btn btn-warning "> </button> --}}
                @endif
            </div>
        </div>
    </div>
@endsection
