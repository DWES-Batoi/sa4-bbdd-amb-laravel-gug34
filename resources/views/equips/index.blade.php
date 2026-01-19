@extends('layouts.equip')

@section('title', __('Equips'))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Llistat d'equips") }}</h1>

    <p class="mb-4">
      <a href="{{ route('equips.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">{{ __('Crear Equip') }}</a>
    </p>

    <div class="grid-cards">
      @foreach ($equips as $equip)
        <article class="card">
          @if ($equip->escut)
            <img src="{{ asset('storage/' . $equip->escut) }}" 
                 alt="{{ __('Escut de :nom', ['nom' => $equip->nom]) }}"
                 class="h-12 w-12 object-cover rounded-full mb-2">
          @endif
          <header class="card__header">
            <h2 class="card__title">{{ $equip->nom }}</h2>
            <span class="card__badge">ID: {{ $equip->id }}</span>
          </header>

          <div class="card__body">
            <p><strong>{{ __('Ciutat') }}:</strong> {{ $equip->ciutat ?? '—' }}</p>
            <p><strong>{{ __('Estadi') }}:</strong> {{ $equip->estadi->nom ?? '—' }}</p>
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