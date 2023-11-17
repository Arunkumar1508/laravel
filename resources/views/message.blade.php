@extends('layouts.app')
@section('content')
    <h1>Message</h1>

    @forelse (auth()->user()->followers as $user)
        <div>
            <a href="{{ route('profile', $user) }}" class="" style="text-decoration: none">
                <img src="{{ asset('css/bootstrap/image/avat.jpg') }}" alt="" srcset="" class="rounded-circle"
                    style="width:50px; height:50px; border-radius:50%;">
                <h4>{{ $user->name }}</h4>
            </a>

            <form action="{{ route('sending', $user->id) }}">
                <button class="btn btn-primary">Message</button>
            </form>
        </div>






    @empty
        <p class="text-danger"> No friends Yet!</p>
    @endforelse
@endsection
