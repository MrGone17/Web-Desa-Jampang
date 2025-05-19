<?php

namespace App\Filament\Resources\SuratbuataktalahirResource\Pages;

use App\Filament\Resources\SuratbuataktalahirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratbuataktalahirs extends ListRecords
{
    protected static string $resource = SuratbuataktalahirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
