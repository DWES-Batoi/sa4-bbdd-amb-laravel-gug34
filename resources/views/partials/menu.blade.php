<nav>
  <ul class="flex space-x-4">
    <li><a class="text-white hover:underline" href="/">{{ __('Inici') }}</a></li>

    <li><a class="text-white hover:underline" href="{{ route('equips.index') }}">{{ __("Guia d'Equips") }}</a></li>

    <li><a class="text-white hover:underline" href="{{ route('estadis.index') }}">{{ __("Llistat d'Estadis") }}</a></li>

    <li><a class="text-white hover:underline" href="{{ route('jugadoras.index') }}">{{ __('Jugadoras') }}</a></li>

    <li><a class="text-white hover:underline" href="{{ route('partits.index') }}">{{ __('Partits') }}</a></li>
  </ul>
</nav>