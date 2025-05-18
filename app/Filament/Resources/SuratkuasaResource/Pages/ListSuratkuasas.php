<?php

namespace App\Filament\Resources\SuratkuasaResource\Pages;

use App\Filament\Resources\SuratkuasaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratkuasas extends ListRecords
{
    protected static string $resource = SuratkuasaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
