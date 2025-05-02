<?php

namespace App\Filament\Resources\InfobansosResource\Pages;

use App\Filament\Resources\InfobansosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfobansos extends EditRecord
{
    protected static string $resource = InfobansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
