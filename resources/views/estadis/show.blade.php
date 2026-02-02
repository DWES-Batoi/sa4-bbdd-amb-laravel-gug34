@extends('layouts.equip')
@section('title', __("Detall d'Estadi"))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Detall d'Estadi") }}</h1>

    <x-estadi :nom="$estadi->nom" :capacitat="$estadi->capacitat" :equips="$estadi->equips" />

    <div class="flex gap-2 mt-6">
      <a href="{{ route('estadis.index') }}" class="btn--cancel">{{ __('Volver') }}</a>
      <a href="{{ route('estadis.edit', $estadi) }}" class="btn--submit">{{ __('Editar') }}</a>
    </div>
  </div>
@endsection