@extends('layouts.adminindex')

@section('adminpage')
    <div class="container">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Approve &Disapprove</th>
                    <th scope="col">Button</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminlist as $list)
                    <tr>
                        <td>{{ $list->product_name }}</td>
                        <td>
                            <img src="{{ asset('css/img/amazondbimage/' . $list->product_image) }}" alt=""
                                style="width: 150px" srcset="">
                        </td>
                        <td>{{ $list->product_price }}</td>
                        <td>{{ $list->product_description }}</td>
                        <td>{{ $list->product_quantity }}</td>
                        <td>
                            {{ $list->admin  }}
                        </td>
                        <td>


                            <a href="{{ route('adminlist_edit', $list->id) }}" type="submit"
                                class="btn btn-secondary gap-2">Edit</a> <br>


                                <button type="submit" class="btn  {{  $list->admin==1 ?'btn-primary':'btn-danger'}} approve{{ $list }}"
                                    ng-click='homeCtrl.approve($event,{{ $list->id }})'>{{ $list->admin ==1 ?'Approve':'Disapprove' }}</button> <br>







                            <button type="submit" class="btn btn-danger last"
                                ng-click='homeCtrl.delete({{ $list->id }})'>Delete</button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class=" d-flex justify-content-center mt-4">

            {{$adminlist->links()}}
        </div>



    </div>
@endsection
