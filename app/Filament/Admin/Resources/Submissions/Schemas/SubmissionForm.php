<?php

namespace App\Filament\Admin\Resources\Submissions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('assigment_id')
                    ->required()
                    ->numeric(),
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('attachment')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('note')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('grade')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
