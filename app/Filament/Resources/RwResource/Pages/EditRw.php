<?php

namespace App\Filament\Resources\RwResource\Pages;

use App\Filament\Resources\RwResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRw extends EditRecord
{
    protected static string $resource = RwResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
