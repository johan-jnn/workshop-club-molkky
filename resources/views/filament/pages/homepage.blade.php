<x-filament-panels::page>
  <form wire:submit="save">
    {{ $this->form }}

    <x-filament::button type="submit" class="my-4">
      Valider les modifications
    </x-filament::button>
  </form>
</x-filament-panels::page>
