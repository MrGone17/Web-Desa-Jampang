<?php

namespace App\Filament\Resources\SuratKetDomisiliUsahaResource\Pages;

use App\Filament\Resources\SuratKetDomisiliUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetDomisiliUsahas extends ListRecords
{
    protected static string $resource = SuratKetDomisiliUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
