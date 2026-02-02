@extends('layouts.equip')

@section('content')
  <div class="container">
    <h1 class="title">{{ __('Calendario de Partidos') }}</h1>

    <div>
      <a href="{{ route('partits.create') }}" class="btn--create">{{ __('Nuevo Partido') }}</a>
    </div>

    <div class="grid-cards">
      @foreach ($partits as $partit)
        <article class="card">
          <header class="card__header">
            <h2 class="card__title">{{ __('Jornada :numero', ['numero' => $partit->jornada]) }}</h2>
            <span class="card__badge">ID: {{ $partit->id }}</span>
          </header>

          <div class="card__body text-center">
            <div class="flex justify-between items-center font-bold text-lg mb-2">
              <span class="flex-1 text-right pr-2 text-gray-800 dark:text-gray-200">{{ $partit->local->nom }}</span>

              <span class="score-badge">
                @if(is_null($partit->gols_local))
                  v
                @else
                  {{ $partit->gols_local }} - {{ $partit->gols_visitant }}
                @endif
              </span>

              <span class="flex-1 text-left pl-2 text-gray-800 dark:text-gray-200">{{ $partit->visitant->nom }}</span>
            </div>

            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">🏟️ {{ $partit->estadi->nom }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">📅
              {{ \Carbon\Carbon::parse($partit->data)->format('d/m/Y H:i') }}
            </p>
          </div>

          <footer class="card__footer">
            <a class="btn btn--ghost" href="{{ route('partits.show', $partit) }}">{{ __('Ver') }}</a>
            <a class="btn btn--primary" href="{{ route('partits.edit', $partit) }}">{{ __('Editar') }}</a>

            <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline">
              @csrf
              @method('DELETE')
              <button class="btn btn--danger" type="submit"
                onclick="return confirm('{{ addslashes(__('¿Seguro que quieres eliminar este partido?')) }}')">
                {{ __('Eliminar') }}
              </button>
            </form>
          </footer>
        </article>
      @endforeach
    </div>
  </div>
@endsection