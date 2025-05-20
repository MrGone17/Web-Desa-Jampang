<?php

namespace App\Filament\Resources\SuratKeteranganWaliResource\Pages;

use App\Filament\Resources\SuratKeteranganWaliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKeteranganWalis extends ListRecords
{
    protected static string $resource = SuratKeteranganWaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
