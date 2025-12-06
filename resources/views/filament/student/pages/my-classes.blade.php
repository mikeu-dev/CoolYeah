<x-filament-panels::page>
    <h2 class="text-xl font-bold mb-4">Kelas Saya</h2>

    <div class="space-y-3">
        @foreach($this->classes as $class)
            <x-filament::card>
                <div class="flex justify-between">
                    <div>
                        <div class="font-bold">{{ $class->course->name }}</div>
                        <div class="text-sm text-gray-600">{{ $class->semester }} {{ $class->year }}</div>
                    </div>

                    <x-filament::button tag="a" href="{{ route('student.materials', $class) }}">
                        Lihat Materi & Tugas
                    </x-filament::button>
                </div>
            </x-filament::card>
        @endforeach
    </div>

</x-filament-panels::page>
