@extends('layouts.adminindex')

@section('adminpage')
    <div class="container">

        <table class="table mt-5">
            <thead>
                <tr class="text-center table-success">
                    <th scope="col">Product_id</th>
                    <th scope="col">Category_Name</th>
                    <th scope="col">Category_Title</th>
                    <th scope="col">Category_Quantity</th>
                </tr>
            </thead>

            <tbody>
                {{-- {{ $lbw }} --}}
                @foreach ($lbw as $opps)
                    <tr class="text-center">
                        <td>{{ $opps->id }}</td>
                        <td>{{$opps->category_name }}</td>
                        <td>{{$opps->category_title }}</td>
                        <td>{{$opps->category_quantity }}</td>
                    </tr>

                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
