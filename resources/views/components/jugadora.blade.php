@props([
    'nom',
    'dorsal',
    'dataNaixement',
    'equip',
    'foto' => null
])

<div class="jugadora border rounded-lg shadow-md p-4 bg-white">
  <div class="flex items-center space-x-4">
    @if($foto)
      <img src="{{ asset('storage/' . $foto) }}" alt="{{ __('Foto jugadora') }}" class="w-16 h-16 rounded-full">
    @else
      <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">{{ __('No foto') }}</div>
    @endif
    
    <div>
      <h2 class="text-xl font-bold text-blue-800">{{ $nom }}</h2>
      <p><strong>{{ __('Dorsal') }}:</strong> {{ $dorsal }}</p>
      <p><strong>{{ __('Equip') }}:</strong> {{ $equip }}</p>
      <p><strong>{{ __('Data Naixement') }}:</strong> {{ $dataNaixement }}</p>
    </div>
  </div>
</div>