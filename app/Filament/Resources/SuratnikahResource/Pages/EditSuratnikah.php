<?php

namespace App\Filament\Resources\SuratnikahResource\Pages;

use App\Filament\Resources\SuratnikahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratnikah extends EditRecord
{
    protected static string $resource = SuratnikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
