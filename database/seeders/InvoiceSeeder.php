<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        /**
         * Dates were dependent on Today(October 15th) + 7
         * Should prolly have a formula for the dates like Today + 7 days. Blah
         */
        Invoice::factory()->create([
            'quotation_id' => 1,
            'payment_status' => 0,
            'inv_number' => 'INV001',
            'created_at' => '2022-10-06 14:14:45',
            'updated_at' => '2022-10-06 14:14:45',
            'reminder_sent_at' => '2022-10-13 14:15:02'
        ])
        ->create([
            'quotation_id' => 2,
            'payment_status' => 1,
            'inv_number' => 'INV002'
        ])  
        ->create([
            'quotation_id' => 3,
            'payment_status' => 0,
            'inv_number' => 'INV003',
            'created_at' => '2022-09-30 13:14:45',
            'updated_at' => '2022-09-30 13:14:45',
            'reminder_sent_at' => '2022-10-06 14:15:02'
        ])
        ->create([
            'quotation_id' => 4,
            'payment_status' => 0,
            'inv_number' => 'INV004',
            'created_at' => '2022-10-07 15:00',
            'updated_at' => '2022-10-07 15:00'
        ]);              
    }
}
