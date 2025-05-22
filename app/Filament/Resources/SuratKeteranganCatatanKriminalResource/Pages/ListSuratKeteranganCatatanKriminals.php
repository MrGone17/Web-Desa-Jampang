<?php

namespace App\Filament\Resources\SuratKeteranganCatatanKriminalResource\Pages;

use App\Filament\Resources\SuratKeteranganCatatanKriminalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKeteranganCatatanKriminals extends ListRecords
{
    protected static string $resource = SuratKeteranganCatatanKriminalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
