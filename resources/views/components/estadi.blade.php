@props([
  'nom',
  'capacitat',
  'equips' => collect(),
])

@props([
  'nom',
  'capacitat',
  'equips' => collect(),
])

<div class="card">
  <div class="card__header">
    <h2 class="card__title">{{ $nom }}</h2>
  </div>
  <div class="card__body">
    <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Capacitat') }}:</strong> {{ $capacitat }}</p>

    <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Equips') }}:</strong> {{ $equips->count() }}</p>
  </div>
</div>