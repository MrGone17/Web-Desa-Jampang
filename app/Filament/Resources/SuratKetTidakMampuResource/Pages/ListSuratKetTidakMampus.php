<?php

namespace App\Filament\Resources\SuratKetTidakMampuResource\Pages;

use App\Filament\Resources\SuratKetTidakMampuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetTidakMampus extends ListRecords
{
    protected static string $resource = SuratKetTidakMampuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
