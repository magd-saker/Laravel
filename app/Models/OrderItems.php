<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['OrderId', 'ProductId', 'UnitPrice', 'Quantity'];

    // Define relationships if needed
    public function order()
    {
        return $this->belongsTo(Order::class,'OrderId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'ProductId');
    }
}
