@extends('layouts.equip')

@section('content')
  <div class="container">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">{{ __('Llistat de Jugadores') }}</h1>

    <p class="mb-4">
      <a href="{{ route('jugadoras.create') }}"
        class="bg-blue-600 text-white px-3 py-2 rounded">{{ __('Nova Jugadora') }}</a>
    </p>

    <div class="grid-cards">
      @foreach ($jugadoras as $jugadora)
        <article class="card">
          <header class="card__header">
            <h2 class="card__title">{{ $jugadora->nom }}</h2>
            <p><strong>{{ __('Dorsal') }}:</strong> {{ $jugadora->dorsal }}</p>
          </header>

          <div class="card__body">
            <p><strong>{{ __('Equip') }}:</strong> {{ $jugadora->equip->nom }}</p>
            <p><strong>{{ __('Nacimiento') }}:</strong> {{ $jugadora->data_naixement }}</p>
          </div>

          <footer class="card__footer">
            <a class="btn btn--ghost" href="{{ route('jugadoras.show', $jugadora) }}">{{ __('Veure') }}</a>
            <a class="btn btn--primary" href="{{ route('jugadoras.edit', $jugadora) }}">{{ __('Editar') }}</a>

            <form method="POST" action="{{ route('jugadoras.destroy', $jugadora) }}" class="inline">
              @csrf
              @method('DELETE')
              <button class="btn btn--danger" type="submit"
                onclick="return confirm('{{ addslashes(__('Segur que vols eliminar aquesta jugadora?')) }}')">
                {{ __('Eliminar') }}
              </button>
            </form>
          </footer>
        </article>
      @endforeach
    </div>
  </div>
@endsection