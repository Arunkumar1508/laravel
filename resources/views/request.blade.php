@extends('layouts.app')
@section('content')
    {{-- @dd($new) --}}
    @foreach ($new as $hide => $user)
    
        @if ($new[$hide]->request == 0)
            <div class="flex hlo">

                <img src="{{ asset('css/bootstrap/image/cart.jpg') }}" alt="" srcset=""
                    style="width:50px; height:50px; border-radius:50%;">

                {{ $user->name }}
            </div>

            <div class="d-flex py-3  ">
                <form action="{{ route('accept', $user->id) }}" method="get">
                    <button class="btn btn-secondary mx-2">Approved</button>
                </form>
                <form action="{{ route('reject', $user->id) }}" method="get">
                    <button class="btn btn-danger ">Disapproved</button>
                </form>
            </div>
        @endif
    @endforeach
@endsection
