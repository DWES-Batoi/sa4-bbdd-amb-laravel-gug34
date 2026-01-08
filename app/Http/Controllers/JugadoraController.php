<?php

namespace App\Http\Controllers;

use App\Models\Jugadora;
use App\Models\Equip;
use Illuminate\Http\Request;

class JugadoraController extends Controller {
    public function index() {
        $jugadoras = Jugadora::all();
        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create() {
        $equips = Equip::all(); // Necesario para el <select> en el formulario
        return view('jugadoras.create', compact('equips'));
    }

    public function store(Request $request) {
        $jugadora = new Jugadora($request->all());
        $jugadora->save();
        return redirect()->route('jugadoras.index')->with('success', 'Jugadora añadida!');
    }

    public function show(Jugadora $jugadora) {
        return view('jugadoras.show', compact('jugadora'));
    }
}