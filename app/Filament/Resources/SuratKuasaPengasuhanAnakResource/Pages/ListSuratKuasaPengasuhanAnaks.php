<?php

namespace App\Filament\Resources\SuratKuasaPengasuhanAnakResource\Pages;

use App\Filament\Resources\SuratKuasaPengasuhanAnakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKuasaPengasuhanAnaks extends ListRecords
{
    protected static string $resource = SuratKuasaPengasuhanAnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
