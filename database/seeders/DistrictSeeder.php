<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $northRegionId =1;
        $centralRegionId =2;
        $southRegionId =3;
        District::factory()
        # Northern Region
        ->create([
            'name' => 'Chitipa',
            'region_id' => $northRegionId
        ])
        ->create([
            'name' => 'Karonga',
            'region_id' => $northRegionId
        ])
        ->create([
            'name' => 'Likoma',
            'region_id' => $northRegionId
        ])
        ->create([
            'name' => 'Mzimba',
            'region_id' => $northRegionId
        ])
        ->create([
            'name' => 'Nkhata Bay',
            'region_id' => $northRegionId
        ])
        ->create([
            'name' => 'Rumphi',
            'region_id' => $northRegionId
        ])  
        
        # Central Region
        ->create([
            'name' => 'Dedza',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Dowa',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Kasungu',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Lilongwe',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Mchinji',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Nkhotakota',
            'region_id' => $centralRegionId
        ]) 
        ->create([
            'name' => 'Ntcheu',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Ntchisi',
            'region_id' => $centralRegionId
        ])
        ->create([
            'name' => 'Salima',
            'region_id' => $centralRegionId
        ])

        # Southern Region
        ->create([
            'name' => 'Balaka',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Blantyre',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Chikwawa',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Chiradzulu',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Machinga',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Mangochi',
            'region_id' => $southRegionId
        ]) 
        ->create([
            'name' => 'Mulanje',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Mwanza',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Nsanje',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Thyolo',
            'region_id' => $southRegionId
        ]) 
        ->create([
            'name' => 'Phalombe',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Zomba',
            'region_id' => $southRegionId
        ])
        ->create([
            'name' => 'Neno',
            'region_id' => $southRegionId
        ]);        
                               
    }
}
