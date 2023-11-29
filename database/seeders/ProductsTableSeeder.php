<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['ProductName' => 'Chai', 'SupplierId' => 1, 'UnitPrice' => 150],
            ['ProductName' => 'Rice', 'SupplierId' => 1, 'UnitPrice' => 300],
            ['ProductName' => 'Sugar', 'SupplierId' => 2, 'UnitPrice' => 250],
            ['ProductName' => 'Biscuit', 'SupplierId' => 3, 'UnitPrice' => 500],
        ]);
    }
}
