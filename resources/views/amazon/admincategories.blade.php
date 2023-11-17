@extends('layouts.adminindex')

@section('adminpage')
    <div class="text-center w-100">
        <form action="{{ route('updated') }}" method="post">
            @csrf
            {{-- @method('PUT') --}}


            <h5>Admin Add Catergoire</h5>
            <label for="category_name">Category_name</label><br>
            <input type="text" id="" name="category_name"   value=""><br><br>

            <label for="category_title">Category_Title</label><br>
            <input type="text" id="" name="category_title"
                value=""><br><br>

            <label for="category_quantity">Category_Quantity</label><br>
            <input type="number" id="" name="category_quantity"
                value=""><br><br>



            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
@endsection
