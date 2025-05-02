<?php

namespace App\Filament\Resources\LayananadmsResource\Pages;

use App\Filament\Resources\LayananadmsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayananadms extends EditRecord
{
    protected static string $resource = LayananadmsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
