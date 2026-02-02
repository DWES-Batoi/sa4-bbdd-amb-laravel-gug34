@extends('layouts.equip')

@section('title', __('Guia d\'Estadis'))

@section('content')
  <div class="container">
    <h1 class="title">{{ __("Llistat d'Estadis") }}</h1>

    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <div>
      <a href="{{ route('estadis.create') }}" class="btn--create">{{ __('Nou Estadi') }}</a>
    </div>

    <div class="grid-cards">
      @foreach($estadis as $estadi)
        <article class="card">
          <header class="card__header">
            <h2 class="card__title">{{ $estadi->nom }}</h2>
          </header>

          <div class="card__body">
            <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Capacitat') }}:</strong> {{ $estadi->capacitat }}</p>
            <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Ciutat') }}:</strong> {{ $estadi->ciutat }}</p>
          </div>

          <footer class="card__footer">
            <a class="btn btn--ghost" href="{{ route('estadis.show', $estadi) }}">{{ __('Veure') }}</a>
            <a class="btn btn--primary" href="{{ route('estadis.edit', $estadi) }}">{{ __('Editar') }}</a>

            <form method="POST" action="{{ route('estadis.destroy', $estadi) }}" class="inline">
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