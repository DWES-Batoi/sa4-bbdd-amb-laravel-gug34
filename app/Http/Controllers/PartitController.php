<?php

namespace App\Http\Controllers;

use App\Services\PartitService;
use App\Models\Equip;
use App\Models\Estadi;
use App\Models\Partit;
use App\Http\Requests\StorePartitRequest;
use App\Http\Requests\UpdatePartitRequest;
use App\Events\PartitActualitzat;
use App\Services\ClassificacioService;
use Illuminate\Http\Request;

class PartitController extends Controller
{
    public function __construct(
        private PartitService $servei,
        private ClassificacioService $classificacioService
    ) {
    }

    public function index()
    {
        $partits = $this->servei->llistar();
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.create', compact('equips', 'estadis'));
    }

    public function store(StorePartitRequest $request)
    {
        $this->servei->guardar($request->validated());
        return redirect()->route('partits.index')->with('success', 'Partit registrat!');
    }

    public function show(Partit $partit)
    {
        $partit->load(['local', 'visitant', 'estadi']);
        return view('partits.show', compact('partit'));
    }

    public function destroy($id)
    {
        $this->servei->eliminar($id);
        return redirect()->route('partits.index')
            ->with('success', 'Partit eliminat!');
    }

    public function edit(Partit $partit)
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.edit', compact('partit', 'equips', 'estadis'));
    }

    public function update(UpdatePartitRequest $request, Partit $partit)
    {
        // Obtenim stats abans (per saber posicio antiga)
        $abansStats = $this->classificacioService->getStats();
        $abansMap = collect($abansStats)->keyBy('equip_id');

        $this->servei->actualitzar($partit->id, $request->validated());

        // Obtenim stats després
        $despresStats = $this->classificacioService->getStats();
        // Necessitem saber la posició de cada equip

        $delta = [];
        foreach ($despresStats as $row) {
            $equipId = $row['equip_id'];
            $posDespres = $row['posicio'];
            $posAbans = $abansMap[$equipId]['posicio'] ?? $posDespres;

            // Calculem delta de posició
            $deltaPos = $posAbans - $posDespres;

            // Si hi ha canvi de posició O volem enviar dades actualitzades (punts, gols...)
            // Enviem sempre per als equips que han jugat?
            // MILLOR: Enviem TOTS els equips o només els que canvien?
            // L'usuari vol "real time updates". Si canvien punts però no posició, també vol veure-ho.
            // Així que detectem canvis en punts també?
            // Simplificació: Enviem dades per TOTS els equips si volem ser exhaustius,
            // o només els que han canviat alguna cosa.
            // Com que és un event, enviem els equips implicats en el partit i els que es mouen.
            // Per simplicitat i robustesa: enviem dades de TOT l'array si no és molt gran?
            // No, el JS itera sobre "delta". Si enviem tots, el JS processarà tots.
            // Fem una llista de canvis rellevants.

            // Per a refrescar punts, hem d'enviar info de l'equip si han canviat els seus punts O la seva posició.
            // Però comparar punts es tedious aquí.
            // Estratègia: Enviem tots els equips que tinguin delta != 0 OR siguin local/visitant del partit actualitzat.
            // Però aquí no sabem qui son local/visitant fàcilment sense mirar $partit.

            // Més fàcil: Enviem TOTS els equips a l'event. Son pocs (20?).
            // Així la taula es refresca sencera visualment (dada a dada).

            $delta[] = [
                'equip_id' => $equipId,
                'delta' => $deltaPos,
                'stats' => $row // Passem tota la fila de dades nova
            ];
        }

        if (!empty($delta)) {
            event(new PartitActualitzat($delta));
        }

        return redirect()->route('partits.index')->with('success', 'Partit actualitzat!');
    }
}