<?php

namespace App\Filament\Resources\BedanamaResource\Pages;

use App\Filament\Resources\BedanamaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBedanama extends EditRecord
{
    protected static string $resource = BedanamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
