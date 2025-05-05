<?php

namespace App\Filament\Resources\DivisidesaResource\Pages;

use App\Filament\Resources\DivisidesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDivisidesas extends ListRecords
{
    protected static string $resource = DivisidesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
