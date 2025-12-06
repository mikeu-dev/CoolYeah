<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class MyClasses extends Page
{
    public ?Collection $classes = null;
    protected string $view = 'filament.student.pages.my-classes';

    public function mount()
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        $this->classes = $user
            ->enrollments()
            ->with('classroom.course')
            ->get()
            ->map(fn($enrollment) => $enrollment->classCourse);
    }
}
