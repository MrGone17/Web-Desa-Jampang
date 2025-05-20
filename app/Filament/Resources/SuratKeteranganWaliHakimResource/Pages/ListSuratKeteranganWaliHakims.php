<?php

namespace App\Filament\Resources\SuratKeteranganWaliHakimResource\Pages;

use App\Filament\Resources\SuratKeteranganWaliHakimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKeteranganWaliHakims extends ListRecords
{
    protected static string $resource = SuratKeteranganWaliHakimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
