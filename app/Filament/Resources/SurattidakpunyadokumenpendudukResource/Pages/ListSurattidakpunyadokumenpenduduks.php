<?php

namespace App\Filament\Resources\SurattidakpunyadokumenpendudukResource\Pages;

use App\Filament\Resources\SurattidakpunyadokumenpendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSurattidakpunyadokumenpenduduks extends ListRecords
{
    protected static string $resource = SurattidakpunyadokumenpendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
