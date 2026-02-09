<?php

namespace App\Http\Controllers;

use App\Models\Estadi;
use App\Http\Requests\StoreEstadiRequest;
use App\Http\Requests\UpdateEstadiRequest;
use App\Services\LLMService;

class EstadiController extends Controller
{
    // GET /estadis
    public function index()
    {
        $estadis = Estadi::all();
        return view('estadis.index', compact('estadis'));
    }

    // GET /estadis/{estadi}
    public function show(Estadi $estadi)
    {
        $prompt = "Escribre una descripción breve y amable del estadio {$estadi->nom}. "
            . "Incluye 3 datos curiosos y tono divulgativo. Máximo 80 palabras.";

        // Llamamos a la IA local
        $descripcio = LLMService::getResponse($prompt);
        return view('estadis.show', compact('estadi', 'descripcio'));
    }

    // GET /estadis/create
    public function create()
    {
        return view('estadis.create');
    }

    // POST /estadis
    public function store(StoreEstadiRequest $request)
    {
        Estadi::create($request->validated());

        return redirect()
            ->route('estadis.index')
            ->with('success', 'Estadi afegit correctament!');
    }

    // GET /estadis/{estadi}/edit
    public function edit(Estadi $estadi)
    {
        return view('estadis.edit', compact('estadi'));
    }

    // PUT/PATCH /estadis/{estadi}
    public function update(UpdateEstadiRequest $request, Estadi $estadi)
    {
        $estadi->update($request->validated());

        return redirect()
            ->route('estadis.index')
            ->with('success', 'Estadi actualitzat correctament!');
    }

    // DELETE /estadis/{estadi}
    public function destroy(Estadi $estadi)
    {
        $estadi->delete();

        return redirect()
            ->route('estadis.index')
            ->with('success', 'Estadi esborrat correctament!');
    }
}