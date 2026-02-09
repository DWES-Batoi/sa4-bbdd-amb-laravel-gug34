<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

class JugadoraService
{
    public function __construct(private BaseRepository $repo)
    {
    }

    public function llistar()
    {
        return $this->repo->getAll();
    }
    public function trobar($id)
    {
        return $this->repo->find($id);
    }
    public function guardar(array $data, $foto = null)
    {
        if ($foto) {
            $data['foto'] = $foto->store('jugadoras', 'public');
        }
        return $this->repo->create($data);
    }
    public function actualitzar($id, array $data, $foto = null)
    {
        $jugadora = $this->repo->find($id);
        if ($foto) {
            if ($jugadora->foto) {
                Storage::disk('public')->delete($jugadora->foto);
            }
            $data['foto'] = $foto->store('jugadoras', 'public');
        }
        return $this->repo->update($id, $data);
    }
    public function eliminar($id)
    {
        $jugadora = $this->repo->find($id);
        if ($jugadora && $jugadora->foto) {
            Storage::disk('public')->delete($jugadora->foto);
        }
        return $this->repo->delete($id);
    }
}