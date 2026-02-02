<div class="card p-6">
  <div class="flex justify-around items-center">
    <div class="text-center">
      <span class="block font-bold text-xl text-gray-800 dark:text-gray-200">{{ $local }}</span>
      <span class="text-4xl font-bold text-blue-600 dark:text-blue-400 block mt-2">{{ $golsLocal ?? '-' }}</span>
    </div>
    <div class="text-gray-400 font-bold text-xl">{{ __('VS') }}</div>
    <div class="text-center">
      <span class="block font-bold text-xl text-gray-800 dark:text-gray-200">{{ $visitant }}</span>
      <span class="text-4xl font-bold text-blue-600 dark:text-blue-400 block mt-2">{{ $golsVisitant ?? '-' }}</span>
    </div>
  </div>
</div>