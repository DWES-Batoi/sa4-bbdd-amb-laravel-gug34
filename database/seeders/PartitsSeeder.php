<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equips = \App\Models\Equip::all();

        foreach ($equips as $local) {
            foreach ($equips as $visitant) {
                if ($local->id !== $visitant->id) {
                    \App\Models\Partit::create([
                        'local_id' => $local->id,
                        'visitant_id' => $visitant->id,
                        'estadi_id' => $local->estadi_id,
                        'data' => now()->addDays(rand(1, 100)),
                        'jornada' => rand(1, 34),
                        'gols' => rand(0, 4)
                    ]);
                }
            }
        }
    }
}
