@extends('layouts.equip')
@section('title', __('Crear Nou Partit'))

@section('content')
  <div class="container">
    <h1 class="title">{{ __('Registrar Nou Partit') }}</h1>

    @if ($errors->any())
      <div class="bg-red-900 border border-red-700 text-red-100 p-4 mb-6 rounded-lg">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('partits.store') }}" method="POST" class="form-container">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="form-group">
          <label class="form-label">{{ __('Equip Local') }}:</label>
          <select name="local_id" class="form-select">
            @foreach ($equips as $equip)
              <option value="{{ $equip->id }}" {{ old('local_id') == $equip->id ? 'selected' : '' }}>{{ $equip->nom }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">{{ __('Equip Visitant') }}:</label>
          <select name="visitant_id" class="form-select">
            @foreach ($equips as $equip)
              <option value="{{ $equip->id }}" {{ old('visitant_id') == $equip->id ? 'selected' : '' }}>{{ $equip->nom }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">{{ __('Estadi') }}:</label>
        <select name="estadi_id" class="form-select">
          @foreach ($estadis as $estadi)
            <option value="{{ $estadi->id }}" {{ old('estadi_id') == $estadi->id ? 'selected' : '' }}>{{ $estadi->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="form-group">
          <label class="form-label">{{ __('Data i Hora') }}:</label>
          <input type="datetime-local" name="data" value="{{ old('data') }}" class="form-input">
        </div>
        <div class="form-group">
          <label class="form-label">{{ __('Jornada') }}:</label>
          <input type="number" name="jornada" value="{{ old('jornada') }}" class="form-input">
        </div>
      </div>

      <div class="flex gap-2 pt-2">
        <button type="submit" class="btn--submit">{{ __('Guardar Partit') }}</button>
        <a href="{{ route('partits.index') }}" class="btn--cancel">{{ __('Cancelar') }}</a>
      </div>
    </form>
  </div>
@endsection