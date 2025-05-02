<?php

namespace App\Filament\Resources\PrinsipResource\Pages;

use App\Filament\Resources\PrinsipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrinsips extends ListRecords
{
    protected static string $resource = PrinsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
