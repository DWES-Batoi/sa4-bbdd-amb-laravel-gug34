@extends('layouts.equip')
@section('title', __('Editar equip'))

@section('content')
    <div class="container">
        <h1 class="title">{{ __('Editar equip') }}</h1>
        <form action="{{ route('equips.update', $equip) }}" method="POST" enctype="multipart/form-data"
            class="form-container">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">{{ __('Nom') }}</label>
                <input type="text" name="nom" value="{{ old('nom', $equip->nom) }}" class="form-input">
                @error('nom') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Estadi') }}</label>
                <select name="estadi_id" class="form-select">
                    @foreach($estadis as $estadi)
                        <option value="{{ $estadi->id }}" @selected(old('estadi_id', $equip->estadi_id) == $estadi->id)>
                            {{ $estadi->nom }}
                        </option>
                    @endforeach
                </select>
                @error('estadi_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Titols') }}</label>
                <input type="number" name="titols" value="{{ old('titols', $equip->titols) }}" class="form-input">
                @error('titols') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            @if($equip->escut)
                <div class="flex items-center gap-3 bg-gray-700 p-3 rounded">
                    <img src="{{ asset('storage/' . $equip->escut) }}" class="avatar" alt="{{ __('Escut') }}">
                    <p class="text-sm text-gray-300">{{ __('Escut actual') }}</p>
                </div>
            @endif

            <div class="form-group">
                <label class="form-label">{{ __('Nou escut (opcional)') }}</label>
                <input type="file" name="escut"
                    class="form-input text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                @error('escut') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2 pt-2">
                <button class="btn--submit">{{ __('Save') }}</button>
                <a href="{{ route('equips.index') }}" class="btn--cancel">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
@endsection