<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['FirstName', 'LastName', 'City', 'Country', 'Phone'];

    // Define relationships if needed
    // For example, if you have orders related to customers
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
