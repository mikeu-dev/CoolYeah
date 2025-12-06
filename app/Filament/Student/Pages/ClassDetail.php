<?php

namespace App\Filament\Student\Pages;

use App\Models\Classroom;
use Filament\Pages\Page;

class ClassDetail extends Page
{
    protected string $view = 'filament.student.pages.class-detail';
    public $class;

    public function mount(Classroom $classroom)
    {
        $this->class = $classroom->load('materials', 'assignments');
    }
}
