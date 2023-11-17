@extends('layouts.app')
{{--
<style>
    .gud {
        display: flex;
        justify-content: space-between;
    }

    .oja:hover {
        color: red;
    }
</style>  --}}

@section('content')
    <form action="{{ $user->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="mb-2">Name</label>
            <input class="w-100" type="text" name="name" id="name" value="{{ $user->name }}" required>

            @error('name')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">
            <label for="username" class="mb-2">Username</label>
            <input class="w-100" type="text" name="username" id="username" value="{{ $user->username }}" required>

            @error('username')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror

        </div>


        <div class="mb-4 d-flex">
            <div>
                <label for="avatar" class="mb-2">Avatar</label>
                <input class="w-100" type="file" name="avatar" id="avatar">

                @error('avatar')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

            <img src="{{ $user->avatar }}" alt="Your avatar" srcset="" width="40px">
        </div>


        <div class="mb-4">
            <label for="email" class="mb-2">Email</label>
            <input class="w-100" type="email" name="email" id="email" value="{{ $user->email }}" required>

            @error('email')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">
            <label for="password" class="mb-2">Password</label>
            <input class="w-100" type="password" name="password" id="password" required>

            @error('password')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="mb-2">Password_confirmation</label>
            <input class="w-100" type="password" name="password_confirmation" id="password_confirmation" required>

            @error('password_confirmation')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror

        </div>


        <div class="mb-4">

            <button type="submit" class=" btn btn-primary py-2 px-4">Submit</button>

            <a href="{{ $user->path() }}" class="btn btn-secondary ">Cancel</a>



        </div>














    </form>
@endsection
