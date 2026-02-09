@extends('layouts.equip')
@section('title', __("Detall del Partit"))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Detall del Partit") }}</h1>
    <div class="max-w-3xl mx-auto">
      <x-partit :local="$partit->local->nom" :visitant="$partit->visitant->nom" :estadi="$partit->estadi->nom"
        :data="$partit->data" :golsLocal="$partit->gols_local ?? 0" :golsVisitant="$partit->gols_visitant ?? 0" />

      <div class="mt-6 flex gap-2">
        <a href="{{ route('partits.edit', $partit) }}" class="btn--primary">{{ __('Editar') }}</a>
        <a href="{{ route('partits.index') }}" class="btn--secondary">{{ __('Volver') }}</a>
      </div>
    </div>
  </div>
@endsection