<x-filament-panels::page>
    <h2 class="font-bold text-xl mb-4">Kumpulkan Tugas: {{ $this->assignment->title }}</h2>

    {{ $this->form }}

    <x-filament::button wire:click="submit" class="mt-4">
        Submit
    </x-filament::button>
</x-filament-panels::page>
