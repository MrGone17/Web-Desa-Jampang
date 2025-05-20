<?php

namespace App\Filament\Resources\SuratPengantarNikahResource\Pages;

use App\Filament\Resources\SuratPengantarNikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPengantarNikahs extends ListRecords
{
    protected static string $resource = SuratPengantarNikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
