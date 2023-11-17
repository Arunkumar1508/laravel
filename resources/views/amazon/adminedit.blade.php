@extends('layouts.adminindex')

@section('adminpage')
    <h1 class="text-center">Product Edit</h1><br>
    <form action="{{ route('update',$adminlist->id) }}" method="POST" enctype="multipart/form-data" class="  text-center">
        @csrf
        @method('PUT')

        <label for="categories_id"><h5>Category id</h5></label><br>

        <input type="hidden" name="id" value="{{  $adminlist->id  }}">
        <input type="number" id="fname" name="categories_id" value="{{ $adminlist->categories_id }}"><br>

        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="product_name"><h5>Product Name</h5></label><br>
        <input type="text" id="fname" name="product_name"  value="{{ $adminlist->product_name }}"><br>

        @error('product_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <label for="product_price"><h5>Product Price</h5></label><br>
        <input type="number" id="fname" name="product_price"  value="{{ $adminlist->product_price }}"><br>


        @error('product_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="product_price"><h5>Product Description</h5></label><br>
        <input type="text" id="fname" name="product_description"  value="{{ $adminlist->product_description }}"><br>
        @error('product_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="product_quantity"><h5>Product Quantity</h5></label><br>
        <input type="number" id="fname" name="product_quantity"  value="{{ $adminlist->product_quantity }}"><br><br>

        @error('product_quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="product_image"><h5>Product Image</h5></label><br>
        <img src="{{ asset('css/img/amazondbimage/' .$adminlist->product_image) }}" style="width: 100px" alt="" srcset="">
        <input type="file" id="fname" name="product_image"

        value=""><br><br>

        @error('product_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="product_approve"><h5>Product Approve</h5></label><br>
        <select name="admin" id="">
            <option value="0">0</option>
            <option value="1">1</option>
        </select><br><br>

        <button type="submit" class="btn btn-secondary">Update</button><br><br>
        <a href="{{ route('adminlist') }}" class="btn btn-secondary">Back</a>


    </form>
@endsection
