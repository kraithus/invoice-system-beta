<?php

namespace Database\Seeders;

use App\Models\Quotation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Quotation::factory()->create([
        'job_id' => 1,
        'price' => 30000
    ])
    ->create([
        'job_id' => 2,
        'price' => 100000
    ])
    ->create([
        'job_id' => 3,
        'price' => 90000
    ])
    ->create([
        'job_id' => 4,
        'price' => 80000
    ])
    ->create([
        'job_id' => 5,
        'price' => 750000
    ])
    ->create([
        'job_id' => 6,
        'price' => 502000
    ])
    ->create([
        'job_id' => 7,
        'price' => 510000
    ])
    ->create([
        'job_id' => 8,
        'price' => 350000
    ])
    ->create([
        'job_id' => 9,
        'price' => 250000
    ])
    ->create([
        'job_id' => 10,
        'price' => 150000
    ]);
    }
}
