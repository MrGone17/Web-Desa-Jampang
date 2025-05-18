<?php

namespace App\Filament\Resources\SuratprosesktpResource\Pages;

use App\Filament\Resources\SuratprosesktpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratprosesktps extends ListRecords
{
    protected static string $resource = SuratprosesktpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
