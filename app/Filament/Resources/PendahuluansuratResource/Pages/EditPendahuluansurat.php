<?php

namespace App\Filament\Resources\PendahuluansuratResource\Pages;

use App\Filament\Resources\PendahuluansuratResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendahuluansurat extends EditRecord
{
    protected static string $resource = PendahuluansuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
