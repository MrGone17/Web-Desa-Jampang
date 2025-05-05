<?php

namespace App\Filament\Resources\DivisidesaResource\Pages;

use App\Filament\Resources\DivisidesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDivisidesa extends EditRecord
{
    protected static string $resource = DivisidesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
