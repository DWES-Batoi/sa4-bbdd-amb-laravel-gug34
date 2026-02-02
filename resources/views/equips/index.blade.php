@extends('layouts.equip')

@section('title', __('Equips'))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Llistat d'equips") }}</h1>

    <div>
      <a href="{{ route('equips.create') }}" class="btn--create">{{ __('Crear Equip') }}</a>
    </div>

    <div class="grid-cards">
      @foreach ($equips as $equip)
        <article class="card">
          <header class="card__header">
            <div class="flex items-center space-x-3">
              @if ($equip->escut)
                <img src="{{ asset('storage/' . $equip->escut) }}" alt="{{ __('Escut de :nom', ['nom' => $equip->nom]) }}"
                  class="avatar">
              @else
                <div class="avatar-placeholder">N/A</div>
              @endif
              <h2 class="card__title">{{ $equip->nom }}</h2>
            </div>
            <span class="card__badge">ID: {{ $equip->id }}</span>
          </header>

          <div class="card__body">
            <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Ciutat') }}:</strong> {{ $equip->ciutat ?? '—' }}</p>
            <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Estadi') }}:</strong>
              {{ $equip->estadi->nom ?? '—' }}</p>
          </div>

          <footer class="card__footer">
            <a class="btn btn--ghost" href="{{ route('equips.show', $equip) }}">{{ __('Veure') }}</a>
            <a class="btn btn--primary" href="{{ route('equips.edit', $equip) }}">{{ __('Editar') }}</a>

            <form method="POST" action="{{ route('equips.destroy', $equip) }}" class="inline">
              @csrf
              @method('DELETE')
              <button class="btn btn--danger" type="submit"
                onclick="return confirm('{{ addslashes(__('Segur que vols eliminar aquest equip?')) }}')">
                {{ __('Eliminar') }}
              </button>
            </form>
          </footer>
        </article>
      @endforeach
    </div>
  </div>
@endsection