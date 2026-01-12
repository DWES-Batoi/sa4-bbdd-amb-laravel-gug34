@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-3xl font-bold text-blue-800 mb-6">Listado de Jugadoras</h1>

  <p class="mb-4">
    <a href="{{ route('jugadoras.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Nueva Jugadora</a>
  </p>

  <div class="grid-cards">
    @foreach ($jugadoras as $jugadora)
      <article class="card">
        <header class="card__header">
          <h2 class="card__title">Dorsal {{ $jugadora->dorsal }}</h2>
          <span class="card__badge">ID: {{ $jugadora->id }}</span>
        </header>

        <div class="card__body">
          <p><strong>Equipo:</strong> {{ $jugadora->equip->nom }}</p>
          <p><strong>Nacimiento:</strong> {{ $jugadora->data_naixement }}</p>
        </div>

        <footer class="card__footer">
          <a class="btn btn--ghost" href="{{ route('jugadoras.show', $jugadora) }}">Ver</a>
          <a class="btn btn--primary" href="{{ route('jugadoras.edit', $jugadora) }}">Editar</a>

          <form method="POST" action="{{ route('jugadoras.destroy', $jugadora) }}" class="inline">
            @csrf
            @method('DELETE')
            <button class="btn btn--danger" type="submit">Eliminar</button>
          </form>
        </footer>
      </article>
    @endforeach
  </div>
</div>
@endsection