@extends('layouts.equip')
@section('title', __('Editar jugadora'))

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ __('Editar jugadora') }} ID: {{ $jugadora->id }}</h1>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
        <ul>
          @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('jugadoras.update', $jugadora) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
      @csrf
      @method('PUT')

      <div>
        <label for="equip_id" class="block font-bold">{{ __('Equip') }}:</label>
        <select name="equip_id" id="equip_id" class="border p-2 w-full rounded">
          @foreach ($equips as $equip)
            <option value="{{ $equip->id }}" {{ old('equip_id', $jugadora->equip_id) == $equip->id ? 'selected' : '' }}>
              {{ $equip->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label for="dorsal" class="block font-bold">{{ __('Dorsal') }}:</label>
        <input type="number" name="dorsal" id="dorsal" value="{{ old('dorsal', $jugadora->dorsal) }}" class="border p-2 w-full rounded">
      </div>

      <div>
        <label for="data_naixement" class="block font-bold">{{ __('Data de Naixement') }}:</label>
        <input type="date" name="data_naixement" id="data_naixement" value="{{ old('data_naixement', $jugadora->data_naixement) }}" class="border p-2 w-full rounded">
      </div>

      <div class="flex gap-2 pt-2">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ __('Actualitzar Jugadora') }}</button>
          <a href="{{ route('jugadoras.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">{{ __('Cancelar') }}</a>
      </div>
    </form>
</div>
@endsection