<?php

namespace App\Filament\Resources\SosmedResource\Pages;

use App\Filament\Resources\SosmedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSosmeds extends ListRecords
{
    protected static string $resource = SosmedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
