<?php

namespace App\Filament\Resources\SuratKetDomisiliUsahaNonWargaResource\Pages;

use App\Filament\Resources\SuratKetDomisiliUsahaNonWargaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetDomisiliUsahaNonWargas extends ListRecords
{
    protected static string $resource = SuratKetDomisiliUsahaNonWargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
