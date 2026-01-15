@extends('layouts.equip')

@section('content')
  <div class="container">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Listado de equipos</h1>

    <p class="mb-4">
      <a href="{{ route('equips.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Nuevo equipo</a>
    </p>

    <div class="grid-cards">
      @foreach ($equips as $equip)
        <article class="card">
          @if ($equip->escut)
            <img src="{{ asset('storage/' . $equip->escut) }}" alt="Escut de {{ $equip->nom }}"
              class="h-12 w-12 object-cover rounded-full mb-2">
          @endif
          <header class="card__header">
            <h2 class="card__title">{{ $equip->nom }}</h2>
            <span class="card__badge">ID: {{ $equip->id }}</span>
          </header>

          <div class="card__body">
            <p><strong>Ciudad:</strong> {{ $equip->ciutat ?? '—' }}</p>
            <p><strong>Estadio:</strong> {{ $equip->estadi->nom ?? '—' }}</p>
          </div>

          <footer class="card__footer">
            <a class="btn btn--ghost" href="{{ route('equips.show', $equip) }}">Ver</a>
            <a class="btn btn--primary" href="{{ route('equips.edit', $equip) }}">Editar</a>

            <form method="POST" action="{{ route('equips.destroy', $equip) }}" class="inline">
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