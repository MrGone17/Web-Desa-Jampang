<?php

namespace App\Filament\Resources\SyaratketentuanResource\Pages;

use App\Filament\Resources\SyaratketentuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSyaratketentuan extends EditRecord
{
    protected static string $resource = SyaratketentuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
