<?php

namespace App\Filament\Resources\SuratKetJamkesosResource\Pages;

use App\Filament\Resources\SuratKetJamkesosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetJamkesos extends ListRecords
{
    protected static string $resource = SuratKetJamkesosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
