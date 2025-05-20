<?php

namespace App\Filament\Resources\SuratKeteranganTelahMenikahResource\Pages;

use App\Filament\Resources\SuratKeteranganTelahMenikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKeteranganTelahMenikahs extends ListRecords
{
    protected static string $resource = SuratKeteranganTelahMenikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
