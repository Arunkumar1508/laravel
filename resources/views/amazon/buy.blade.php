@extends('layouts.amazonindex')
@section('admin')
    <div class="container">
        <h5 class="">Enter Your Details</h5>
        <div class="row">
            <div class="col">
                {{-- {{ $authuser}} --}}
                {{-- {{ $daws }} --}}
                {{-- {{ $counts }} --}}
                {{-- {{ $sum }} --}}
                <form action="{{ route('finalupdated',auth()->user()->id) }}" method="POST">
                    @csrf
                    {{-- <select >
                        <option >{{ $daws[0]->product_id }}</option>
                    </select> --}}
                    @foreach ( $daws as $daw )
                    <input type="hidden" name="product_id" id="" value="{{$daw->product_id }}">

                    @endforeach
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $authuser->name }}"
                        class="form-control border border-secondary w-50"><br><br>

                    <label for="Address">Address</label>
                    <input type="text" name="address" value=""
                        class="form-control border border-secondary w-50"><br><br>

                    <label for="Email">Email</label>
                    <input type="text" name="email" value="{{ $authuser->email }}"
                        class="form-control border border-secondary w-50"><br><br>

                    {{-- <label for="Purchase_price">Purchase Price</label> --}}

                    <input type="hidden" name="purchaseprice" value="{{ $daw->product_price }}"
                        class="form-control border border-secondary w-50"><br><br>

                    <label for="Payment Method">Payment Method</label>
                    <select name="payment" id="" required>
                        <option value="0">Payment method</option>
                        <option value="Gpay">Gpay</option>
                        <option value="Phonepay">Phonepay</option>
                        <option value="Paytym">Paytym</option>
                        <option value="Cash on Delivery">Cash on Delivery</option>
                    </select> <br> <br>

                    <button type="submit"  class="btn btn-success">Submit</button>
                    {{-- <a href="{{ route('success') }}"  class="btn btn-success">Submit</a> --}}

                    <a href="{{ route('show') }}" class="btn btn-secondary">Back</a>






                </form>
            </div>
            <div class="col ">
                <div class="container">
                    <h5>Product Image</h5>
                    {{-- {{ $daw11 }} --}}

                        <img src="{{ asset('css/img/amazondbimage/'.$daw11->product_image) }}" class="card-img-top"
                            alt="no-image" style="width: 180px">
                        <hr>


                </div>

            </div>
        </div>


    </div>
@endsection
