<?php

namespace App\Filament\Resources\SuratNumpangNikahResource\Pages;

use App\Filament\Resources\SuratNumpangNikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratNumpangNikahs extends ListRecords
{
    protected static string $resource = SuratNumpangNikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
