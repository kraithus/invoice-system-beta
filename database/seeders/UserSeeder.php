<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
        # Default Controller
        ->create([
            'name' => 'Fake Admin',
            'email' => 'fakeadmin@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$8h53Xk0Q3NaGbKrGE24MRepuoN8MY3Mpr6SX4x0a94lfpc/TFKHK6' //password is bluefish
        ])
        
        # Sample Technician
        ->create([
            'name' => 'Test User',
            'email' => 'innongalu327@gmail.com',
            'password' => '$2y$10$8h53Xk0Q3NaGbKrGE24MRepuoN8MY3Mpr6SX4x0a94lfpc/TFKHK6' //password is bluefish
        ]);

    }
}
