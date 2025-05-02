<?php

namespace App\Filament\Resources\PendahuluanadministrasiResource\Pages;

use App\Filament\Resources\PendahuluanadministrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendahuluanadministrasi extends EditRecord
{
    protected static string $resource = PendahuluanadministrasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
