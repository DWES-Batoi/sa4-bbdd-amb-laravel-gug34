<div class="flex justify-around items-center mb-4">
    <div class="text-center">
      <span class="block font-bold text-xl">{{ $local }}</span>
      <span class="text-3xl">{{ $golsLocal ?? '-' }}</span>
    </div>
    <div class="text-gray-500 font-bold">VS</div>
    <div class="text-center">
      <span class="block font-bold text-xl">{{ $visitant }}</span>
      <span class="text-3xl">{{ $golsVisitant ?? '-' }}</span>
    </div>
</div>