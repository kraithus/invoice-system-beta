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
        Invoice::factory()->create([
            'quotation_id' => 1,
            'payment_status' => 0,
            'inv_number' => 'INV001',
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
            'inv_number' => 'INV002',
            'reminder_sent_at' => '2022-10-06-14:15:02'
        ]);           
    }
}
