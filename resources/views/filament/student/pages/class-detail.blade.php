<x-filament-panels::page>
    <h2 class="text-lg font-bold">{{ $this->class->course->name ?? 'Belum ada.' }}</h2>

    <h3 class="mt-4 font-semibold">Materi</h3>
    <ul class="list-disc pl-4">
        @foreach($this->class->materials as $m)
            <li>
                {{ $m->title }}
                @if($m->file)
                    <a class="text-blue-600" href="{{ asset($m->file) }}" target="_blank">Download</a>
                @endif
            </li>
        @endforeach
    </ul>

    <h3 class="mt-6 font-semibold">Tugas Kuliah</h3>
    @if($submission = $a->submissions()->where('student_id', auth()->id())->first())
    <div class="text-sm mt-2">
        Status: Sudah dikumpulkan
        @if($submission->grade)
            | Nilai: {{ $submission->grade }}
        @else
            | Menunggu penilaian
        @endif
    </div>
@endif

    <div class="space-y-2">
        @foreach($this->class->assignments as $a)
            <x-filament::card>
                <div class="flex justify-between">
                    <div>
                        <div class="font-bold">{{ $a->title }}</div>
                        <div class="text-sm text-gray-500">Deadline: {{ $a->deadline }}</div>
                    </div>
                    <x-filament::button tag="a" href="{{ route('student.submit', $a) }}">
                        Kumpulkan
                    </x-filament::button>
                </div>
            </x-filament::card>
        @endforeach
    </div>

    
</x-filament-panels::page>
