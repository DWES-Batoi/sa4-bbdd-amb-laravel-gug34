<?php

namespace App\Http\Controllers;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Illuminate\Http\Request;

class PartitController extends Controller
{
    public function index()
    {
        $partits = Partit::all();
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.create', compact('equips', 'estadis'));
    }

    public function store(Request $request)
    {
        Partit::create($request->all());
        return redirect()->route('partits.index')->with('success', 'Partido creado!');
    }

    public function show(Partit $partit)
    {
        $partit->load(['local', 'visitant', 'estadi']);

        return view('partits.show', compact('partit'));
    }
}