<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
        # Sample Technician
        ->create([
            'name' => 'Test User',
            'email' => 'innongalu327@gmail.com',
            'password' => '$2y$10$8h53Xk0Q3NaGbKrGE24MRepuoN8MY3Mpr6SX4x0a94lfpc/TFKHK6' //password is bluefish
        ])
        # Default Controller
        ->create([
            'name' => 'Fake Admin',
            'email' => 'fakeadmin@gmail.com',
            'role' => 'Controller',
            'password' => '$2y$10$8h53Xk0Q3NaGbKrGE24MRepuoN8MY3Mpr6SX4x0a94lfpc/TFKHK6' //password is bluefish
        ]);
    }
}
