@extends('layouts.equip')
@section('title', __("Detall de la Jugadora"))

@section('content')
  <div class="max-w-md mx-auto">
    <x-jugadora
      :dorsal="$jugadora->dorsal"
      :dataNaixement="$jugadora->data_naixement"
      :equip="$jugadora->equip->nom"
      :foto="$jugadora->foto"
    />
    
    <div class="mt-4 flex gap-2">
        <a href="{{ route('jugadoras.edit', $jugadora) }}" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('Editar') }}</a>
        <a href="{{ route('jugadoras.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">{{ __('Volver') }}</a>
    </div>
  </div>
@endsection