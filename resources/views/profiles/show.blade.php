@extends('layouts.app')
<style>
    .gud {
        display: flex;
        justify-content: space-between;
    }

    .oja:hover {
        color: red;
    }
</style>
@section('content')
    <header class="mb-5 position-relative">

        <img src="{{ asset('css/bootstrap/image/music.jpg') }}" width="100%" alt="" srcset="" class="rounded">


        <div class="d-flex justify-content-between p-1">


            <div style="max-width: 200px">
                <h3>{{ $user->name }}</h3>
                <p>Joined{{ $user->created_at->diffForHumans() }}</p>

            </div>
            <div class="d-flex p-2 ">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="btn btn-primary m-2 mt-2 "style="
                                height: 38px; ">Edit Profile</a>
                @endcan

                @unless (auth()->user()->is($user))
                    <form action="{{ route('follow', $user->username) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-2 ">


                            {{auth()->user()->following($user)? 'Unfollow Me': 'Follow Me' }}
                        </button>

                    </form>
                @endunless
            </div>

        </div>

        <img src="{{ $user->avatar }}" alt="" class="position-absolute rounded-circle"
            style="top: 48%;left:calc(60% - 110px);width:100px";>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate modi minus cum dicta ad repudiandae ducimus
            voluptate provident necessitatibus delectus dignissimos,</p>





    </header>


    @include('timeline', [
        'tweets' => $tweet,
    ])

@endsection
