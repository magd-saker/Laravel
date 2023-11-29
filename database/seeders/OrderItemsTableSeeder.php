<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            ['OrderId' => 1, 'ProductId' => 4, 'UnitPrice' => 500, 'Quantity' => 2],
            ['OrderId' => 2, 'ProductId' => 3, 'UnitPrice' => 250, 'Quantity' => 2],
            ['OrderId' => 2, 'ProductId' => 2, 'UnitPrice' => 300, 'Quantity' => 1],
        ]);
    }
}
