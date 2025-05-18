<?php

namespace App\Filament\Resources\SuratketeranganpendudukResource\Pages;

use App\Filament\Resources\SuratketeranganpendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratketeranganpenduduks extends ListRecords
{
    protected static string $resource = SuratketeranganpendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
