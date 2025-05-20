<?php

namespace App\Filament\Resources\SuratKetLajangResource\Pages;

use App\Filament\Resources\SuratKetLajangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetLajangs extends ListRecords
{
    protected static string $resource = SuratKetLajangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
