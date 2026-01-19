@extends('layouts.equip')
@section('title', __("Detall del Partit"))

@section('content')
  <div class="max-w-2xl mx-auto">
      <x-partit
        :local="$partit->local->nom"
        :visitant="$partit->visitant->nom"
        :estadi="$partit->estadi->nom"
        :data="$partit->data"
        :golsLocal="$partit->gols_local ?? 0"
        :golsVisitant="$partit->gols_visitant ?? 0"
      />
      
      <div class="mt-6">
          <a href="{{ route('partits.index') }}" class="text-blue-600 hover:underline">{{ __('← Tornar al calendari') }}</a>
      </div>
  </div>
@endsection