<?php

namespace App\Filament\Resources\SuratmatidanlahirResource\Pages;

use App\Filament\Resources\SuratmatidanlahirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratmatidanlahirs extends ListRecords
{
    protected static string $resource = SuratmatidanlahirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
