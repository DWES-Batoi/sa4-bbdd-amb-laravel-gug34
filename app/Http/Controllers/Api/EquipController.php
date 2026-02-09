<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equip;
use App\Models\User;

use App\Http\Requests\StoreEquipRequest;
use App\Http\Requests\UpdateEquipRequest;
use App\Services\EquipService;

class EquipController extends Controller
{
    public function __construct(private EquipService $servei)
    {
        $this->authorizeResource(Equip::class, 'equip');
    }

    public function index()
    {
        return $this->servei->llistar();
    }

    public function store(StoreEquipRequest $request)
    {
        $equip = $this->servei->guardar($request->validated(), $request->file('escut'));
        return response()->json($equip, 201);
    }

    public function show(Equip $equip)
    {
        return $equip;
    }

    public function update(UpdateEquipRequest $request, Equip $equip)
    {
        $equip = $this->servei->actualitzar($equip->id, $request->validated(), $request->file('escut'));
        return response()->json($equip);
    }

    public function destroy(Equip $equip)
    {
        try {
            $this->servei->eliminar($equip->id);
            return response()->json(null, 204);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return response()->json([
                    'success' => false,
                    'message' => 'No es pot eliminar l\'equip perquè té partits o jugadores associades.'
                ], 409);
            }
            throw $e;
        }
    }
}