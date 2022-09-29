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
        'price' => 30000,
        'qtn_number' => 'QTN001'
    ])
    ->create([
        'job_id' => 2,
        'price' => 100000,
        'qtn_number' => 'QTN002'
    ])
    ->create([
        'job_id' => 3,
        'price' => 90000,
        'qtn_number' => 'QTN003'
    ])
    ->create([
        'job_id' => 4,
        'price' => 80000,
        'qtn_number' => 'QTN004'
    ])
    ->create([
        'job_id' => 5,
        'price' => 750000,
        'qtn_number' => 'QTN005'
    ])
    ->create([
        'job_id' => 6,
        'price' => 502000,
        'qtn_number' => 'QTN006'
    ])
    ->create([
        'job_id' => 7,
        'price' => 510000,
        'qtn_number' => 'QTN007'
    ])
    ->create([
        'job_id' => 8,
        'price' => 350000,
        'qtn_number' => 'QTN008'
    ])
    ->create([
        'job_id' => 9,
        'price' => 250000,
        'qtn_number' => 'QTN009'
    ])
    ->create([
        'job_id' => 10,
        'price' => 150000,
        'qtn_number' => 'QTN0010'
    ]);
    }
}
