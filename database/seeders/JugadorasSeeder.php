<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JugadorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equips = \App\Models\Equip::all();
        foreach ($equips as $equip) {
            // Creamos 11 jugadoras para cada equipo
            \App\Models\Jugadora::factory()->count(11)->create([
                'equip_id' => $equip->id
            ]);
        }
    }
}
