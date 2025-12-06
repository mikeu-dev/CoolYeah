<?php

namespace App\Filament\Admin\Resources\Materials\Pages;

use App\Filament\Admin\Resources\Materials\MaterialResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterial extends ViewRecord
{
    protected static string $resource = MaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
