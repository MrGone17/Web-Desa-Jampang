<?php

namespace App\Filament\Resources\SuratIzinKeramaianResource\Pages;

use App\Filament\Resources\SuratIzinKeramaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratIzinKeramaians extends ListRecords
{
    protected static string $resource = SuratIzinKeramaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
