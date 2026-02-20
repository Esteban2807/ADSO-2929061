<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PetSeeder::class,
            AdoptionSeeder::class,
        ]);

        // Genera 50 usuarios falsos con foto, género y nombre coherentes
        User::factory(50)->create();
        Pet::factory(50)->create();
    }
}
