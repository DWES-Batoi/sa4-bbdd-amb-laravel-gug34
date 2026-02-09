@extends('layouts.equip')
@section('title', __('Afegir nou estadi'))

@section('content')
  <div class="container">
    <h1 class="title">{{ __('Afegir nou estadi') }}</h1>

    @if ($errors->any())
      <div class="bg-red-900 border border-red-700 text-red-100 p-4 mb-6 rounded-lg">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('estadis.store') }}" method="POST" class="form-container">
      @csrf

      <div class="form-group">
        <label for="nom" class="form-label">{{ __('Nom') }}:</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="form-input">
      </div>

      <div class="form-group">
        <label for="capacitat" class="form-label">{{ __('Capacitat') }}:</label>
        <input type="number" name="capacitat" id="capacitat" value="{{ old('capacitat') }}" class="form-input">
      </div>

      <div class="form-group">
        <label for="ciutat" class="form-label">{{ __('Ciutat') }}:</label>
        <input type="text" name="ciutat" id="ciutat" value="{{ old('ciutat') }}" class="form-input">
      </div>

      <div class="flex gap-2 pt-2">
        <button type="submit" class="btn--submit">{{ __('Afegir') }}</button>
        <a href="{{ route('estadis.index') }}" class="btn--cancel">{{ __('Cancelar') }}</a>
      </div>
    </form>
  </div>
@endsection