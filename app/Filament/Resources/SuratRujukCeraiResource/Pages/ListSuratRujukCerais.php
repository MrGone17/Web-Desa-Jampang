<?php

namespace App\Filament\Resources\SuratRujukCeraiResource\Pages;

use App\Filament\Resources\SuratRujukCeraiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratRujukCerais extends ListRecords
{
    protected static string $resource = SuratRujukCeraiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
