<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductApiController extends Controller
{
    public function index()
    {
       return response()->json([
            'products'=> Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'products' => Product::all(),
        ]);
    }

}
