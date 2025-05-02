<?php

namespace App\Filament\Resources\PariwisataResource\Pages;

use App\Filament\Resources\PariwisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPariwisatas extends ListRecords
{
    protected static string $resource = PariwisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
