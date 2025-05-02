<?php

namespace App\Filament\Resources\TentangdesaResource\Pages;

use App\Filament\Resources\TentangdesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTentangdesa extends EditRecord
{
    protected static string $resource = TentangdesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
