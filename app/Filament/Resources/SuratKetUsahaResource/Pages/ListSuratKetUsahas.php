<?php

namespace App\Filament\Resources\SuratKetUsahaResource\Pages;

use App\Filament\Resources\SuratKetUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetUsahas extends ListRecords
{
    protected static string $resource = SuratKetUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
