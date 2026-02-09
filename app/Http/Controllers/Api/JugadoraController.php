<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JugadoraRequest;
use App\Http\Resources\JugadoraResource;
use App\Models\Jugadora;

class JugadoraController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Jugadora::class, 'jugadora');
    }
    public function index()
    {
        return JugadoraResource::collection(Jugadora::paginate(10));
    }

    public function show(Jugadora $jugadora)
    {
        return new JugadoraResource($jugadora);
    }

    public function store(JugadoraRequest $request)
    {
        $jugadora = Jugadora::create($request->validated());
        return response()->json(new JugadoraResource($jugadora), 201);
    }

    public function update(JugadoraRequest $request, Jugadora $jugadora)
    {
        $jugadora->update($request->validated());
        return new JugadoraResource($jugadora);
    }

    public function destroy(Jugadora $jugadora)
    {
        $jugadora->delete();
        return response()->noContent(); // Estado 204
    }
}