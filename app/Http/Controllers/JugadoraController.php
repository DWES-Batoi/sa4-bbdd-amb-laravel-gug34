<?php

namespace App\Http\Controllers;

use App\Services\JugadoraService;
use App\Models\Equip;
use App\Models\Jugadora;
use App\Http\Requests\StoreJugadoraRequest;
use App\Http\Requests\UpdateJugadoraRequest;

class JugadoraController extends Controller
{
    public function __construct(private JugadoraService $servei)
    {
    }

    public function index()
    {
        return view('jugadoras.index', ['jugadoras' => $this->servei->llistar()]);
    }

    public function create()
    {
        $equips = Equip::all();
        return view('jugadoras.create', compact('equips'));
    }

    public function store(StoreJugadoraRequest $request)
    {
        $this->servei->guardar($request->validated(), $request->file('foto'));
        return redirect()->route('jugadoras.index');
    }

    public function show(Jugadora $jugadora)
    {
        return view('jugadoras.show', compact('jugadora'));
    }

    public function edit(Jugadora $jugadora)
    {
        $equips = Equip::all();
        return view('jugadoras.edit', compact('jugadora', 'equips'));
    }

    public function update(UpdateJugadoraRequest $request, $id)
    {
        $this->servei->actualitzar($id, $request->validated(), $request->file('foto'));
        return redirect()->route('jugadoras.index');
    }

    public function destroy($id)
    {
        $this->servei->eliminar($id);
        return redirect()->route('jugadoras.index');
    }

}