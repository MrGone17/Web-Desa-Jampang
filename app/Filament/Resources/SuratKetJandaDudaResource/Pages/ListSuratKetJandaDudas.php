<?php

namespace App\Filament\Resources\SuratKetJandaDudaResource\Pages;

use App\Filament\Resources\SuratKetJandaDudaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetJandaDudas extends ListRecords
{
    protected static string $resource = SuratKetJandaDudaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
