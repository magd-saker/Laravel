<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            ['OrderDate' => '2020-07-05', 'OrderNumber' => 5, 'CustomerId' => 1, 'TotalAmount' => 1000],
            ['OrderDate' => '2020-08-14', 'OrderNumber' => 8, 'CustomerId' => 2, 'TotalAmount' => 800],
        ]);
    }
}
