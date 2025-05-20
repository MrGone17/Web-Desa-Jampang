<?php

namespace App\Filament\Resources\SuratBelumMenikahResource\Pages;

use App\Filament\Resources\SuratBelumMenikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratBelumMenikahs extends ListRecords
{
    protected static string $resource = SuratBelumMenikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
