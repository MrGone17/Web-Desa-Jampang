<?php

namespace App\Filament\Resources\SambutanResource\Pages;

use App\Filament\Resources\SambutanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSambutan extends EditRecord
{
    protected static string $resource = SambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
