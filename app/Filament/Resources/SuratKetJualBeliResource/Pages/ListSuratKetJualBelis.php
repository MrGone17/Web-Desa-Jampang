<?php

namespace App\Filament\Resources\SuratKetJualBeliResource\Pages;

use App\Filament\Resources\SuratKetJualBeliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetJualBelis extends ListRecords
{
    protected static string $resource = SuratKetJualBeliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
