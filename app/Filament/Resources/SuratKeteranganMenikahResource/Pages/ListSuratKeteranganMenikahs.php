<?php

namespace App\Filament\Resources\SuratKeteranganMenikahResource\Pages;

use App\Filament\Resources\SuratKeteranganMenikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKeteranganMenikahs extends ListRecords
{
    protected static string $resource = SuratKeteranganMenikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
