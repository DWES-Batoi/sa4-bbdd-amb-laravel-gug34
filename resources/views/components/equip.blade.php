@props(['equip'])

<div class="equip border rounded-lg shadow-md p-4 bg-white">
  <h2 class="text-xl font-bold text-blue-800">{{ $equip->nom }}</h2>  
  <p><strong>{{ __('Estadi') }}:</strong> {{ $equip->estadi->nom }}</p>  
  <p><strong>{{ __('Titols') }}:</strong> {{ $equip->titols }}</p>
  @if($equip->escut)
    <img src="{{ asset('storage/' . $equip->escut) }}" 
         alt="{{ __('Escut de :nom', ['nom' => $equip->nom]) }}" 
         class="w-20 h-20 mt-2">
  @endif
</div>