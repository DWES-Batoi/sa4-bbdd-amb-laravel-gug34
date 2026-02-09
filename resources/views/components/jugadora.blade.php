@props([
    'nom',
    'dorsal',
    'dataNaixement',
    'equip',
    'foto' => null
])

@props([
    'nom',
    'dorsal',
    'dataNaixement',
    'equip',
    'foto' => null
])

<div class="card">
  <div class="card__header">
      <div class="flex items-center space-x-3">
        @if($foto)
          <img src="{{ asset('storage/' . $foto) }}" alt="{{ __('Foto jugadora') }}" class="avatar">
        @else
          <div class="avatar-placeholder">{{ __('No foto') }}</div>
        @endif
        <h2 class="card__title">{{ $nom }}</h2>
      </div>
  </div>
  <div class="card__body">
      <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Dorsal') }}:</strong> {{ $dorsal }}</p>
      <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Equip') }}:</strong> {{ $equip }}</p>
      <p><strong class="text-gray-900 dark:text-gray-100">{{ __('Data Naixement') }}:</strong> {{ $dataNaixement }}</p>
  </div>
</div>