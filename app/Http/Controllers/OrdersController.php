<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItems;
use App\Models\Product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.listorder',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('orders.create',compact('orders','products'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'customer-id' => 'required|exists:customers,id',
        ]);

        $data = $request->input('orderit');
        $tableBody = json_decode($data, true);

        $order= new Order();
        $order -> OrderDate =$request->input('date');
        $order -> CustomerId =$request->input('customer-id');
        $order -> OrderNumber =$request->input('order-number');

        $total=0;
        foreach ($tableBody as $row) {
        $total+= $row['unit-price'] *$row['quantity'];
        }

        $order = Order::create([
            'OrderDate' => $request->input('date'),
            'CustomerId' => $request->input('customer-id'),
            'OrderNumber' => $request->input('order-number'),
            'TotalAmount'=>$total
        ]);

        foreach ($tableBody as $row) {
            $orderitem= new OrderItems();
            $orderitem -> OrderId =$order->id;
            $orderitem -> ProductId =$row['product-id'];
            $orderitem -> UnitPrice =$row['unit-price'];
            $orderitem -> Quantity =$row['quantity'];
            $orderitem ->save();
        }

        return redirect()->route('orders.index');

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

        // $order = Order::findOrFail($id);
        $orders = Order::findOrFail($id);
        $orderitems = OrderItems::where('OrderId',$id)->get();
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.update', compact('orders', 'orderitems','customers','products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'customer-id' => 'required|exists:customers,id',
        ]);

        $order = Order::findOrFail($id);

        OrderItems::where('OrderId', $id)->delete();

        $data = $request->input('orderit');
        $tableBody = json_decode($data, true);

        $order -> OrderDate =$request->input('date');
        $order -> CustomerId =$request->input('customer-id');
        $order -> OrderNumber =$request->input('order-number');
        $total=0;
        foreach ($tableBody as $row) {
        $total+= $row['unit-price'] *$row['quantity'];
        }
        $order -> TotalAmount = $total;
        $order -> save();

        foreach ($tableBody as $row) {
            $orderitem= new OrderItems();
            $orderitem -> OrderId =$order->id;
            $orderitem -> ProductId =$row['product-id'];
            $orderitem -> UnitPrice =$row['unit-price'];
            $orderitem -> Quantity =$row['quantity'];
            $orderitem ->save();
        }

        return redirect()->route('orders.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
        }
        return redirect()->route('orders.index');
    }
}
