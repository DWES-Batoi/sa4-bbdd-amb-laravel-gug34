@extends('layouts.equip')
@section('title', __("Detall de la Jugadora"))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Detall de la Jugadora") }}</h1>
    <div class="max-w-2xl mx-auto">
      <x-jugadora :nom="$jugadora->nom" :dorsal="$jugadora->dorsal" :dataNaixement="$jugadora->data_naixement"
        :equip="$jugadora->equip->nom" :foto="$jugadora->foto" />

      <div class="mt-6 flex gap-2">
        <a href="{{ route('jugadoras.edit', $jugadora) }}" class="btn--primary">{{ __('Editar') }}</a>
        <a href="{{ route('jugadoras.index') }}" class="btn--secondary">{{ __('Volver') }}</a>
      </div>
    </div>
  </div>
@endsection