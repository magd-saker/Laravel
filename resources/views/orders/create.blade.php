<!-- resources/views/home.blade.php -->

@extends('layout')

@section('content')
<div class="creatorder">
    <div class="max-w-6xl mx-auto ">
        <h1> Create a new Order </h1>
    </div>
    <div class="flex justify-center">
        <form id="productForm" action="{{ route('orders.store') }}" method="post">
            @csrf
            <div class="creato">
                <label for="date"> Date</label>
                <input id="date" name="date" type="date" required="required">

                <label for="order-number"> Order Number</label>
                <input id="order-number" name="order-number" type="number"min="0" max="1000000"  required="required">
            </div>
            <div class="selectcustomer">
                <select id="customer-id" name="customer-id" required="required">
                    <option value="" disabled selected>Choose a customer</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->CustomerId }}">{{ $order->customer->FirstName }} {{ $order->customer->LastName }}</option>
                    @endforeach
                </select>
            </div>
            <div style="padding-left:17%;">

                <label style=" color: #dadedfb4;font-size: 1.8rem ; "> Select Order Items</label>
            </div>
            <div class="selectcustomer">
                <select id="product-id" name="product-id" required="required">
                    <option value="" disabled selected>Choose a Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->Id }}">{{ $product->ProductName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="creato" style="padding-left: 0px;">
                <label for="quantity" style="padding-left: 25%;"> Quantity</label>
                <input id="quantity" name="quantity" type="number" min="0" max="1000000" required="required">
            </div>
            <div class="addrow">
                <button class="btn btn-primary addnewrow" type="button" onclick="addNewRow()">Add</button>
            </div>
            <div>
                <input id="orderit" name="orderit" type="hidden" >

            </div>

            <div class="col-md-6 w-75 p-5">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Order Number</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                        <!-- Rows will be added here dynamically -->
                    </tbody>
                </table>
            </div>

            <div class="buttonsubmit">
                <button type="button" onclick="serializeTableData({{ $products }},event)" > Save</button>
                <button type="button" onclick="clearForm()">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
    var products = {!! json_encode($products) !!};
</script>
@endsection

