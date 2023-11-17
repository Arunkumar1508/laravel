@extends('layouts.app')
@section('content')
{{-- @dd($convert); --}}
    <div class="profile d-flex">

        <img src="{{ asset('css/bootstrap/image/avat.jpg') }}" alt="{{ $convert['username'] }}" srcset="" class="rounded-circle"
        style="width:50px; height:50px; border-radius:50%;">
        <h2 class=" foon m-3">{{ $convert['username'] }}</h2>

    </div>

        <div class="row hlos">
            <div class="col-6">

                    @foreach ( $outgoing as $data)

                    <div class="in"  >{{ $data->message }}</div>
                    @endforeach

            </div>
            <div class="col-6">
                <div>
                    @foreach ($incoming as $data )
                    <div class="out">{{ $data->message }}</div>

                    @endforeach
                </div>
            </div>
        </div>

        <form action="{{ route('sendDB',$convert['id']) }}" method="post">
            @csrf

            <input type="text" name="typing_msg" required class="w-75 tesla">
            <button type="submit" class="btn btn-danger">Send</button>




        </form>



@endsection
