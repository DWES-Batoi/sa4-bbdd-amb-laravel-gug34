<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            EstadisSeeder::class,
            EquipsSeeder::class,
            JugadorasSeeder::class,
            PartitsSeeder::class,
            UserSeeder::class,
        ]);
    }
}