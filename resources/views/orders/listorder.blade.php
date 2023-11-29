<!-- resources/views/home.blade.php -->

@extends('layout')

@section('content')

<div class="vh-70 w-100 d-flex justify-content-center align-items-end  .container">
            <div class="col-md-6 w-75 p-5">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Order Number</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Total</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Remove</th>

                        </tr>
                    </thead>

                    <tbody>
                        @if(count($orders)>0)
                        @foreach ($orders as $order )
                            <tr>
                                <td>{{ $order['OrderDate'] }}</td>
                                <td>{{ $order['OrderNumber'] }}</td>
                                <td>{{ $order->customer->FirstName }} {{ $order->customer->LastName }}</td>
                                <td>{{ $order['TotalAmount'] }}</td>
                                <td>
                                    <a href="{{ route('orders.edit', $order->id) }}" >
                                        <button class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form style="width: 150px; margin: 0; padding:0; height:40px"   action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="padding-bottom:10px;" type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p>there are no Order to display</p>
                        @endif
                    </tbody>
                </table>
                <div class="text-center"  >
                <td>
                    <a href="{{ route('orders.create') }}" class=""><i class="bi bi-plus-circle-fill btn btn-sm btn-primary"> Create Order</i></button></td>
                </div>
            </div>
        </div>
@endsection
