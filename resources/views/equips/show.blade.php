@extends('layouts.equip')
@section('title', __("Detall d'Equip"))

@section('content')
    <div class="container">
        <h1 class="title">{{ __("Detall d'Equip") }}</h1>
        <div class="max-w-2xl mx-auto">
            <x-equip :equip="$equip" />

            <div class="mt-6 flex gap-2">
                <a href="{{ route('equips.edit', $equip) }}" class="btn--primary">{{ __('Editar') }}</a>
                <a href="{{ route('equips.index') }}" class="btn--secondary">{{ __('Volver') }}</a>
            </div>
        </div>
    </div>
@endsection