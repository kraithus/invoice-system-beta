<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::factory()->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-15 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 3,
                'technician_id' => 2,
                'created_at' => '2022-09-15 14:15:02'
                ])
            ->create([
                'name' => 'Server Scaling',
                'customer_id' => 3,
                'technician_id' => 2,
                'created_at' => '2022-09-15 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-16 14:16:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 4,
                'technician_id' => 2,
                'created_at' => '2022-09-16 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-17 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-17 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-17 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-18 14:15:02'
                ])
            ->create([
                'name' => 'Server Maintenance',
                'customer_id' => 2,
                'technician_id' => 2,
                'created_at' => '2022-09-18 14:15:02'
            ]);    
    }
}
