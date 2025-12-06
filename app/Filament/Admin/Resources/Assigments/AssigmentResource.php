<?php

namespace App\Filament\Admin\Resources\Assigments;

use App\Filament\Admin\Resources\Assigments\Pages\CreateAssigment;
use App\Filament\Admin\Resources\Assigments\Pages\EditAssigment;
use App\Filament\Admin\Resources\Assigments\Pages\ListAssigments;
use App\Filament\Admin\Resources\Assigments\Pages\ViewAssigment;
use App\Filament\Admin\Resources\Assigments\Schemas\AssigmentForm;
use App\Filament\Admin\Resources\Assigments\Schemas\AssigmentInfolist;
use App\Filament\Admin\Resources\Assigments\Tables\AssigmentsTable;
use App\Models\Assigment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AssigmentResource extends Resource
{
    protected static ?string $model = Assigment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return AssigmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AssigmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssigmentsTable::configure($table);
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
            'index' => ListAssigments::route('/'),
            'create' => CreateAssigment::route('/create'),
            'view' => ViewAssigment::route('/{record}'),
            'edit' => EditAssigment::route('/{record}/edit'),
        ];
    }
}
