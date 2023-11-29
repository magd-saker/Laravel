<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductsController extends Controller
{

    public function index()
    {
        return view('products.listproduct',[
            'products'=> Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create',[
            'suppliers' => Supplier::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product-name' => 'required|string',
            'unit-price' => 'required|numeric|min:0|max:1000000',
            'supplier-id' => 'required|exists:suppliers,id',
        ]);
        $product= new Product();
        $product->ProductName =$request->input('product-name');
        $product->UnitPrice = $request->input('unit-price');
        $product->SupplierId = $request->input('supplier-id');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all();
        return view('products.update', compact('product', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product-name' => 'required|string',
            'unit-price' => 'required|numeric|min:0|max:1000000',
            'supplier-id' => 'required|exists:suppliers,id',
        ]);

        $product = Product::findOrFail($id);
        $product->ProductName = $request->input('product-name');
        $product->UnitPrice = $request->input('unit-price');
        $product->SupplierId = $request->input('supplier-id');
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        return redirect()->route('products.index');
    }
}
