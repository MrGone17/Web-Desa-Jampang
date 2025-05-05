<?php

namespace App\Filament\Resources\LayananpublikResource\Pages;

use App\Filament\Resources\LayananpublikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayananpublik extends EditRecord
{
    protected static string $resource = LayananpublikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
