<!-- resources/views/home.blade.php -->

@extends('layout')

@section('content')

<div class="vh-70 w-100 d-flex justify-content-center align-items-end  .container">
            <div class="col-md-6 w-75 p-5">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ProductName</th>
                            <th scope="col">UnitPrice</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Remove</th>

                        </tr>
                    </thead>

                    <tbody>
                        @if(count($products)>0)
                        @foreach ($products as $product )
                            <tr>
                                <td>{{ $product['ProductName'] }}</td>
                                <td>{{ $product['UnitPrice'] }}</td>
                                <td>

                                        <a href="{{ route('products.edit', $product->id) }}">

                                        <button  type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button></a>

                                </td>
                                <td>
                                    <form style="width: 150px; margin: 0; padding:0; height:40px"   action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="padding-bottom:10px;" type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p>there are no Product to display</p>
                        @endif
                    </tbody>
                </table>
                <div class="text-center"  >
                <td>
                    <a href="{{ route('products.create') }}" class="button"><i class="bi bi-plus-circle-fill btn btn-sm btn-primary"> Add Proudect</i>
                </td>
                </div>
            </div>
        </div>

@endsection
