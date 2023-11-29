@extends('layout')

@section('content')
<div class="creat">
    <div class="max-w-6xl mx-auto">
        <h1 style="margin-left: 13%">Edit Product</h1>
    </div>

    <div class="flex justify-center">
        <form id="UpdateProductForm" action="{{ route('products.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')

            <div>
                <label for="product-name">Product Name</label>
                <input id="product-name" name="product-name" type="text" value="{{ $product->ProductName }}" required>
            </div>
            <div>
                <label for="unit-price">Unit Price</label>
                <input id="unit-price" name="unit-price" type="number" min="0" max="1000000" value="{{ $product->UnitPrice }}" required>
            </div>
            <div>
                <option value="" disabled selected style="color: white">Choose a supplier</option>
                <select id="supplier-id" name="supplier-id" required>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>
                            {{ $supplier->CompanyName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit"> Update</button>
                <button type="button" onclick="clearUpdateForm()">Cancel</button>
            </div>

        </form>
    </div>
</div>
<script>
    function clearForm() {
        document.getElementById('productForm').reset();
    }
</script>
@endsection
