<?php

namespace App\Filament\Resources\SuratpindahpendudukResource\Pages;

use App\Filament\Resources\SuratpindahpendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratpindahpenduduks extends ListRecords
{
    protected static string $resource = SuratpindahpendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
