<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            ['CompanyName' => 'tech company', 'ContactName' => 'Ahmad', 'City' => 'Damascus', 'Country' => 'Syria', 'Phone' => '33324587', 'Fax' => '33324588'],
            ['CompanyName' => 'Durra', 'ContactName' => 'سعيد', 'City' => 'دمشق', 'Country' => 'سوريا','Phone' => '0113855454', 'Fax' => '33324588'],
            ['CompanyName' => 'كهربائيات المصري', 'ContactName' => 'محمود', 'City' => 'حلب', 'Country' => 'سوريا','Phone' => NULL, 'Fax' => NULL],
        ]);
    }
}
