@extends('layouts.app')
@section('content')
    <div>
        @foreach ($users as $user)




            <a href="{{ $user->path() }}" style="text-decoration:none">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" srcset="" width="80px"
                    class="rounded">
                <h2>{{ $user->username }}</h2>

            </a>
        @endforeach

        {{ $users->links() }}
    </div>
@endsection
