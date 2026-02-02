@extends('layouts.equip')
@section('title', __('Afegir nova jugadora'))

@section('content')
  @section('content')
    <div class="container">
      <h1 class="title">{{ __('Afegir nova jugadora') }}</h1>

      @if ($errors->any())
        <div class="bg-red-900 border border-red-700 text-red-100 p-4 mb-6 rounded-lg">
          <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('jugadoras.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        <div class="form-group">
          <label for="equip_id" class="form-label">{{ __('Equip') }}:</label>
          <select name="equip_id" id="equip_id" class="form-select">
            @foreach ($equips as $equip)
              <option value="{{ $equip->id }}" {{ old('equip_id') == $equip->id ? 'selected' : '' }}>
                {{ $equip->nom }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="nom" class="form-label">{{ __('Nom') }}:</label>
          <input type="text" name="nom" id="nom" value="{{ old('nom', $jugadora->nom ?? '') }}" class="form-input">
        </div>

        <div class="form-group">
          <label for="dorsal" class="form-label">{{ __('Dorsal') }}:</label>
          <input type="number" name="dorsal" id="dorsal" value="{{ old('dorsal') }}" class="form-input">
        </div>

        <div class="form-group">
          <label for="data_naixement" class="form-label">{{ __('Data de Naixement') }}:</label>
          <input type="date" name="data_naixement" id="data_naixement" value="{{ old('data_naixement') }}"
            class="form-input">
        </div>

        <div class="form-group">
          <label for="foto" class="form-label">{{ __('Foto') }}:</label>
          <input type="file" name="foto" id="foto"
            class="form-input text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
        </div>

        <div class="flex gap-2 pt-2">
          <button type="submit" class="btn--submit">{{ __('Afegir Jugadora') }}</button>
          <a href="{{ route('jugadoras.index') }}" class="btn--cancel">{{ __('Cancelar') }}</a>
        </div>
      </form>
    </div>
  @endsection
@endsection