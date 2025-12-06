<?php

namespace App\Filament\Student\Pages;

use App\Models\Assignment;
use App\Models\Submission;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class SubmitAssignment extends Page
{
    protected string $view = 'filament.student.pages.submit-assignment';
    public Assignment $assignment;
    public ?string $file = null;
    public ?string $note = null;

    public function mount(Assignment $assignment)
    {
        $this->assignment = $assignment;
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('file')
                ->directory('submissions')
                ->required(),

            Textarea::make('note')
                ->label('Catatan (opsional)'),
        ]);
    }

    public function submit()
    {
        Submission::create([
            'assignment_id' => $this->assignment->id,
            'student_id' => Auth::id(),
            'file' => $this->file,
            'note' => $this->note,
        ]);

        Notification::make()
            ->title('Tugas berhasil dikumpulkan!')
            ->success()
            ->send();

        return redirect()->route('student.class.detail', $this->assignment->class_course_id);
    }
}
