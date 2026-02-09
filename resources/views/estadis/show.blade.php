@extends('layouts.equip')
@section('title', __("Detall d'Estadi"))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Detall d'Estadi") }}</h1>

    <x-estadi :nom="$estadi->nom" :capacitat="$estadi->capacitat" :equips="$estadi->equips" />
    <div class="mt-8 p-6 bg-gray-800 border border-gray-700 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-gray-100 mb-4">Descripció</h3>

        @if(!empty($descripcio))
            <p class="text-gray-300 leading-relaxed text-lg">
                {{ $descripcio }}
            </p>
        @else
            <p class="text-gray-400 italic">
                No s’ha pogut generar la descripció ara mateix.
            </p>
        @endif
    </div>

    <div class="flex gap-2 mt-6">
      <a href="{{ route('estadis.index') }}" class="btn--cancel">{{ __('Volver') }}</a>
      <a href="{{ route('estadis.edit', $estadi) }}" class="btn--submit">{{ __('Editar') }}</a>
    </div>
  </div>
@endsection