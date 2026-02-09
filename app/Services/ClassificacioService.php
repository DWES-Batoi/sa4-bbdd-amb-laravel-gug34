<?php

namespace App\Services;

use App\Models\Equip;
use App\Models\Partit;

class ClassificacioService
{
    /**
     * Retorna l'array complet amb punts, gols, etc. ordenat
     */
    public function getStats(): array
    {
        $equips = Equip::all();
        $stats = [];

        foreach ($equips as $e) {
            $stats[$e->id] = [
                'equip_id' => $e->id,
                'punts' => 0,
                'gf' => 0,
                'gc' => 0,
                'dg' => 0
            ];
        }

        $partits = Partit::all();

        foreach ($partits as $p) {
            $l = $p->local_id;
            $v = $p->visitant_id;
            $gl = (int) $p->gols_local;
            $gv = (int) $p->gols_visitant;

            // Si el set partit no s'ha jugat (null?), potser hauriem de filtrar.
            // Assumim que si tenen gols és perquè s'ha jugat o son 0-0.

            $stats[$l]['gf'] += $gl;
            $stats[$l]['gc'] += $gv;
            $stats[$v]['gf'] += $gv;
            $stats[$v]['gc'] += $gl;

            if ($gl > $gv) {
                $stats[$l]['punts'] += 3;
            } elseif ($gl < $gv) {
                $stats[$v]['punts'] += 3;
            } else {
                $stats[$l]['punts'] += 1;
                $stats[$v]['punts'] += 1;
            }
        }

        foreach ($stats as &$row) {
            $row['dg'] = $row['gf'] - $row['gc'];
        }

        $rows = array_values($stats);
        usort($rows, function ($a, $b) {
            return $b['punts'] <=> $a['punts'] ?: $b['dg'] <=> $a['dg'] ?: $b['gf'] <=> $a['gf'];
        });

        // Afegim la posició explícita a cada fila
        foreach ($rows as $i => &$row) {
            $row['posicio'] = $i + 1;
        }

        return $rows;
    }

    public function posicionsPerEquip(): array
    {
        $rows = $this->getStats();
        $posicions = [];
        foreach ($rows as $row) {
            $posicions[$row['equip_id']] = $row['posicio'];
        }

        return $posicions;
    }
}