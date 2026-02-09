<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClassificacioService;

class ClassificacioController extends Controller
{
    public function index(ClassificacioService $classificacioService)
    {
        $stats = $classificacioService->getStats();
        // Indexem per equip_id per accés ràpid a la vista
        $statsMap = collect($stats)->keyBy('equip_id');

        $equips = \App\Models\Equip::all()->sortBy(fn($e) => $statsMap[$e->id]['posicio'] ?? 999)->values();

        return view('classificacio.index', compact('equips', 'statsMap'));
    }
}
