@extends('layouts.app')
@section('title', 'Editar equip')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar equip: {{ $equip->nom }}</h1>

    {{-- Bloque de errores --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- El action apunta a 'update' y pasamos el objeto o el ID --}}
    <form action="{{ route('equips.update', $equip) }}" method="POST" class="space-y-4">
      @csrf
      {{-- Directiva necesaria para que Laravel procese la petición como PUT --}}
      @method('PUT')

      <div>
        <label for="nom" class="block font-bold">Nom:</label>
        <input
          type="text"
          name="nom"
          id="nom"
          {{-- old('campo', 'valor_por_defecto') --}}
          value="{{ old('nom', $equip->nom) }}"
          class="border p-2 w-full rounded"
        >
      </div>

      <div>
        <label for="estadi_id" class="block font-bold">Estadi:</label>
        <select name="estadi_id" id="estadi_id" class="border p-2 w-full rounded">
          @foreach ($estadis as $estadi)
            <option value="{{ $estadi->id }}"
              {{ old('estadi_id', $equip->estadi_id) == $estadi->id ? 'selected' : '' }}>
              {{ $estadi->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label for="titols" class="block font-bold">Títols:</label>
        <input
          type="number"
          name="titols"
          id="titols"
          value="{{ old('titols', $equip->titols) }}"
          class="border p-2 w-full rounded"
        >
      </div>

      <div class="flex gap-2">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Actualitzar Equip
          </button>
          <a href="{{ route('equips.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Cancelar
          </a>
      </div>
    </form>
</div>
@endsection