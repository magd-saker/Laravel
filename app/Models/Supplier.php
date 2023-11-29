<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['CompanyName', 'ContactName', 'City', 'Country', 'Phone', 'Fax'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
