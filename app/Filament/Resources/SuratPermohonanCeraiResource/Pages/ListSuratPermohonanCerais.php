<?php

namespace App\Filament\Resources\SuratPermohonanCeraiResource\Pages;

use App\Filament\Resources\SuratPermohonanCeraiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPermohonanCerais extends ListRecords
{
    protected static string $resource = SuratPermohonanCeraiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
