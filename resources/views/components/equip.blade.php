@props(['equip'])

@props(['equip'])

<div class="card">
  <div class="card__header">
    <h2 class="card__title">{{ $equip->nom }}</h2>
  </div>
  <div class="card__body">
    <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Estadi') }}:</strong> {{ $equip->estadi->nom }}</p>
    <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Titols') }}:</strong> {{ $equip->titols }}</p>
    @if($equip->escut)
      <div class="mt-4">
        <img src="{{ asset('storage/' . $equip->escut) }}" alt="{{ __('Escut de :nom', ['nom' => $equip->nom]) }}"
          class="w-32 h-32 object-contain ml-0">
      </div>
    @endif
  </div>
</div>