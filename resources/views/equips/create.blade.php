@extends('layouts.equip')
@section('title', __('Afegir nou equip'))

@section('content')
  <div class="container">
    <h1 class="title">{{ __('Afegir nou equip') }}</h1>

    @if ($errors->any())
      <div class="bg-red-900 border border-red-700 text-red-100 p-4 mb-6 rounded-lg">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('equips.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
      @csrf
      <div class="form-group">
        <label for="nom" class="form-label">{{ __('Nom') }}:</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="form-input">
      </div>

      <div class="form-group">
        <label for="estadi_id" class="form-label">{{ __('Estadi') }}:</label>
        <select name="estadi_id" id="estadi_id" class="form-select">
          @foreach ($estadis as $estadi)
            <option value="{{ $estadi->id }}" {{ old('estadi_id') == $estadi->id ? 'selected' : '' }}>
              {{ $estadi->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="titols" class="form-label">{{ __('Titols') }}:</label>
        <input type="number" name="titols" id="titols" value="{{ old('titols') }}" class="form-input">
      </div>

      <div class="form-group">
        <label for="escut" class="form-label">{{ __('Escut') }}:</label>
        <input type="file" name="escut" id="escut"
          class="form-input text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
        @error('escut')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex gap-2 pt-2">
        <button type="submit" class="btn--submit">
          {{ __('Afegir') }}
        </button>
        <a href="{{ route('equips.index') }}" class="btn--cancel">{{ __('Cancelar') }}</a>
      </div>
    </form>
  </div>
@endsection