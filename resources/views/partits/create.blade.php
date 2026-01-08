@extends('layouts.app')
@section('title', 'Crear Nou Partit')

@section('content')
<h1 class="text-2xl font-bold mb-4">Registrar Nou Partit</h1>

<form action="{{ route('partits.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
  @csrf
  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block font-bold">Equip Local:</label>
      <select name="local_id" class="border p-2 w-full">
        @foreach ($equips as $equip)
          <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label class="block font-bold">Equip Visitant:</label>
      <select name="visitant_id" class="border p-2 w-full">
        @foreach ($equips as $equip)
          <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div>
    <label class="block font-bold">Estadi:</label>
    <select name="estadi_id" class="border p-2 w-full">
      @foreach ($estadis as $estadi)
        <option value="{{ $estadi->id }}">{{ $estadi->nom }}</option>
      @endforeach
    </select>
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block font-bold">Data i Hora:</label>
      <input type="datetime-local" name="data" class="border p-2 w-full">
    </div>
    <div>
      <label class="block font-bold">Jornada:</label>
      <input type="number" name="jornada" class="border p-2 w-full">
    </div>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar Partit</button>
</form>
@endsection