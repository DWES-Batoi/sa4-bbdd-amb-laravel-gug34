@extends('layouts.equip')

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Llistat de Jugadores") }}</h1>

    <div>
      <a href="{{ route('jugadoras.create') }}" class="btn--create">{{ __('Nova Jugadora') }}</a>
    </div>

    <div class="grid-cards">
      @foreach ($jugadoras as $jugadora)
        <article class="card">
          <header class="card__header">
            <div class="flex items-center space-x-3">
              @if($jugadora->foto)
                <img src="{{ asset('storage/' . $jugadora->foto) }}" class="avatar">
              @else
                <div class="avatar-placeholder">N/F</div>
              @endif
              <h2 class="card__title">{{ $jugadora->nom }}</h2>
            </div>

            <div class="card__badge">
              <strong>{{ __('Dorsal') }}:</strong> {{ $jugadora->dorsal }}
            </div>
          </header>

          <div class="card__body">
            <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Equip') }}:</strong> {{ $jugadora->equip->nom }}</p>
            <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Nacimiento') }}:</strong>
              {{ $jugadora->data_naixement }}</p>
          </div>

          <footer class="card__footer">
            <a class="btn btn--ghost" href="{{ route('jugadoras.show', $jugadora) }}">{{ __('Ver') }}</a>
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