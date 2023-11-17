@extends('layouts.adminindex')

@section('adminpage')
    <h1 class="text-center">Admin </h1>
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data" class="  text-center">
@csrf

            <label for="category_id">category_id:</label><br>
            <input type="number" id="fname" name="category_id" require value=""><br>

            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_name">product_name:</label><br>
            <input type="text" id="fname" name="product_name" require value=""><br>

            @error('product_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <label for="product_price">product_price:</label><br>
            <input type="number" id="fname" name="product_price" require value=""><br>


            @error('product_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_price">product_description:</label><br>
            <input type="text" id="fname" name="product_description" value=""><br>
            @error('product_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_quantity">product_quantity:</label><br>
            <input type="number" id="fname" name="product_quantity" require value=""><br><br>

            @error('product_quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_image">product_image:</label><br>
            <input type="file" id="fname" name="product_image" require value=""><br><br>

            @error('product_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_approve">product_approve</label><br>
            <select name="product_approve" id="">
                <option value="0">0</option>
                <option value="1">1</option>
            </select><br><br>

            <button type="submit" class="btn btn-secondary">Add</button>


    </form>
@endsection
