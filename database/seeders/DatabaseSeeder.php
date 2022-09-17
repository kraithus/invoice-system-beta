<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        /**
         * Leave only role, user, region, district uncommented in production
         * Ordered by hierarchy of execution based on table relationship dependencies
         */
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            RegionSeeder::class,
            DistrictSeeder::class,
            CustomerSeeder::class,
            JobSeeder::class,
            QuotationSeeder::class
        ]);
    }
}
