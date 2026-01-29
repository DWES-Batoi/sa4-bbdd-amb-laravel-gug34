<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nom,
            'id_estadio' => $this->estadi_id,
            'titulos' => $this->titols,
            'escut' => $this->escut ? asset('storage/' . $this->escut) : null,
            'estadio' => $this->whenLoaded('estadi', fn() => $this->estadi->nom),
        ];
    }
}
