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
    @include('tweetpanel')

  @include('timeline')
@endsection
