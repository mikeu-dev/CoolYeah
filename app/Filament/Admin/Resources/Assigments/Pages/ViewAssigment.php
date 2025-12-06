<?php

namespace App\Filament\Admin\Resources\Assigments\Pages;

use App\Filament\Admin\Resources\Assigments\AssigmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAssigment extends ViewRecord
{
    protected static string $resource = AssigmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
