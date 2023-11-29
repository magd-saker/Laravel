<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['OrderDate', 'OrderNumber', 'CustomerId', 'TotalAmount'];

    // Define relationships if needed
    public function customer()
    {
        return $this->belongsTo(Customer::class,'CustomerId');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
