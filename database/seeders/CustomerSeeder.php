<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(5)->create();
    }
}
