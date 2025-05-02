<?php

namespace App\Filament\Resources\SyaratketentuanResource\Pages;

use App\Filament\Resources\SyaratketentuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSyaratketentuans extends ListRecords
{
    protected static string $resource = SyaratketentuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
