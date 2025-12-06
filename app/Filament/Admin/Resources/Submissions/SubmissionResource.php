<?php

namespace App\Filament\Admin\Resources\Submissions;

use App\Filament\Admin\Resources\Submissions\Pages\CreateSubmission;
use App\Filament\Admin\Resources\Submissions\Pages\EditSubmission;
use App\Filament\Admin\Resources\Submissions\Pages\ListSubmissions;
use App\Filament\Admin\Resources\Submissions\Pages\ViewSubmission;
use App\Filament\Admin\Resources\Submissions\Schemas\SubmissionForm;
use App\Filament\Admin\Resources\Submissions\Schemas\SubmissionInfolist;
use App\Filament\Admin\Resources\Submissions\Tables\SubmissionsTable;
use App\Models\Submission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'grade';

    public static function form(Schema $schema): Schema
    {
        return SubmissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubmissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubmissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubmissions::route('/'),
            'create' => CreateSubmission::route('/create'),
            'view' => ViewSubmission::route('/{record}'),
            'edit' => EditSubmission::route('/{record}/edit'),
        ];
    }
}
