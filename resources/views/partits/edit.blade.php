@extends('layouts.app')
@section('title', 'Editar Partit')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Partit Jornada: {{ $partit->jornada }}</h1>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
        <ul>
          @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('partits.update', $partit) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
      @csrf
      @method('PUT')

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-bold">Equip Local:</label>
          <select name="local_id" class="border p-2 w-full rounded">
            @foreach ($equips as $equip)
              <option value="{{ $equip->id }}" {{ old('local_id', $partit->local_id) == $equip->id ? 'selected' : '' }}>{{ $equip->nom }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-bold">Equip Visitant:</label>
          <select name="visitant_id" class="border p-2 w-full rounded">
            @foreach ($equips as $equip)
              <option value="{{ $equip->id }}" {{ old('visitant_id', $partit->visitant_id) == $equip->id ? 'selected' : '' }}>{{ $equip->nom }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <label class="block font-bold">Estadi:</label>
        <select name="estadi_id" class="border p-2 w-full rounded">
          @foreach ($estadis as $estadi)
            <option value="{{ $estadi->id }}" {{ old('estadi_id', $partit->estadi_id) == $estadi->id ? 'selected' : '' }}>{{ $estadi->nom }}</option>
          @endforeach
        </select>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-bold">Data i Hora:</label>
          <input type="datetime-local" name="data" value="{{ old('data', \Carbon\Carbon::parse($partit->data)->format('Y-m-d\TH:i')) }}" class="border p-2 w-full rounded">
        </div>
        <div>
          <label class="block font-bold">Jornada:</label>
          <input type="number" name="jornada" value="{{ old('jornada', $partit->jornada) }}" class="border p-2 w-full rounded">
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-bold">Gols Local:</label>
          <input type="number" name="gols_local" value="{{ old('gols_local', $partit->gols_local) }}" class="border p-2 w-full rounded">
        </div>
        <div>
          <label class="block font-bold">Gols Visitant:</label>
          <input type="number" name="gols_visitant" value="{{ old('gols_visitant', $partit->gols_visitant) }}" class="border p-2 w-full rounded">
        </div>
      </div>

      <div class="flex gap-2 pt-2">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualitzar Partit</button>
          <a href="{{ route('partits.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
      </div>
    </form>
</div>
@endsection