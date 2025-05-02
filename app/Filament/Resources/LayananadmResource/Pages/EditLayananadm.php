<?php

namespace App\Filament\Resources\LayananadmResource\Pages;

use App\Filament\Resources\LayananadmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayananadm extends EditRecord
{
    protected static string $resource = LayananadmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
