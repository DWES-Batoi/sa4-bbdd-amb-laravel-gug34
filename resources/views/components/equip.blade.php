@props(['equip'])

<div class="equip border rounded-lg shadow-md p-4 bg-white">
  <h2 class="text-xl font-bold text-blue-800">{{ $equip->nom }}</h2>  
  <p><strong>Estadi:</strong> {{ $equip->estadi->nom }}</p>  
  <p><strong>Títols:</strong> {{ $equip->titols }}</p>
  @if($equip->escut)
    <img src="{{ asset('storage/' . $equip->escut) }}" alt="Escut de {{ $equip->nom }}" class="w-20 h-20 mt-2">
  @endif
</div>