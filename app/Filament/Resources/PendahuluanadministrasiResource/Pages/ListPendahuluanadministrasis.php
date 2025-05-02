<?php

namespace App\Filament\Resources\PendahuluanadministrasiResource\Pages;

use App\Filament\Resources\PendahuluanadministrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendahuluanadministrasis extends ListRecords
{
    protected static string $resource = PendahuluanadministrasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
