<?php

namespace App\Filament\Admin\Resources\Assigments\Pages;

use App\Filament\Admin\Resources\Assigments\AssigmentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAssigment extends EditRecord
{
    protected static string $resource = AssigmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
