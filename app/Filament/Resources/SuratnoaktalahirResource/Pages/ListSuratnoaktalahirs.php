<?php

namespace App\Filament\Resources\SuratnoaktalahirResource\Pages;

use App\Filament\Resources\SuratnoaktalahirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratnoaktalahirs extends ListRecords
{
    protected static string $resource = SuratnoaktalahirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
