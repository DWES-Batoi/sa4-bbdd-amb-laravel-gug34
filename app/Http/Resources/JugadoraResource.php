<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JugadoraResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nombre_completo' => $this->nom,
            'id_equipo' => $this->equip_id,
            'dorsal' => $this->dorsal,
            'fecha_nacimiento' => $this->data_naixement,
            'foto' => $this->foto ? asset('storage/' . $this->foto) : null,
        ];
    }
}
