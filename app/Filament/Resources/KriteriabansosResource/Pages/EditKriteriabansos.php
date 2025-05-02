<?php

namespace App\Filament\Resources\KriteriabansosResource\Pages;

use App\Filament\Resources\KriteriabansosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKriteriabansos extends EditRecord
{
    protected static string $resource = KriteriabansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
