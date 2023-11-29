<!-- resources/views/home.blade.php -->

@extends('layout')

@section('content')
<div class="creat">
    <div class="max-w-6xl mx-auto ">
        <h1> Create a new Proudect </h1>
    </div>

    <div class="flex justify-center">
        <form id ="productForm" action="{{ route('products.store') }}" method="post">
            @csrf
            <div>
                <label for="product-name"> Product Name</label>
                <input id ="product-name" name="product-name" type="text" required="required">
            </div>
            <div>
                <label for="unit-price"> Unit Price</label>
                <input id ="unit-price" name="unit-price" type="number" min="0" max="1000000" required="required">
            </div>
            <div>

                    <select id="supplier-id" name="supplier-id" required="required">
                        <option value="" disabled selected>Choose a supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->CompanyName }}</option>
                        @endforeach
                    </select>
            </div>
            <div>
                <button type="submit"> Save</button>
                <button type="button" onclick="clearForm()">Cancel</button>
            </div>

        </form>


    </div>
</div>


@endsection
