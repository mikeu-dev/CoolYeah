<?php

namespace App\Filament\Admin\Resources\Assigments\Pages;

use App\Filament\Admin\Resources\Assigments\AssigmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssigments extends ListRecords
{
    protected static string $resource = AssigmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
