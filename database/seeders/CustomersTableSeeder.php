<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['FirstName' => 'Mohamad', 'LastName' => 'Zid', 'City' => 'Beirut', 'Country' => 'Lebanon', 'Phone' => '02015485546'],
            ['FirstName' => 'Samer', 'LastName' => 'Salam', 'City' => 'Damascus', 'Country' => 'Syria', 'Phone' => '555456687'],
        ]);
    }
}
