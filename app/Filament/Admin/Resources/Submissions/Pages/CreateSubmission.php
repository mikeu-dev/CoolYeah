<?php

namespace App\Filament\Admin\Resources\Submissions\Pages;

use App\Filament\Admin\Resources\Submissions\SubmissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubmission extends CreateRecord
{
    protected static string $resource = SubmissionResource::class;
}
