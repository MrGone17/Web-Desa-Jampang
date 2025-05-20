<?php

namespace App\Filament\Resources\SuratKuasaPengasuhAnakResource\Pages;

use App\Filament\Resources\SuratKuasaPengasuhAnakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratKuasaPengasuhAnak extends EditRecord
{
    protected static string $resource = SuratKuasaPengasuhAnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
