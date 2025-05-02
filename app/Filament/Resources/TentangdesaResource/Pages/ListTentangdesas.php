<?php

namespace App\Filament\Resources\TentangdesaResource\Pages;

use App\Filament\Resources\TentangdesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTentangdesas extends ListRecords
{
    protected static string $resource = TentangdesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
