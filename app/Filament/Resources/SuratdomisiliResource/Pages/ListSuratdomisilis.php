<?php

namespace App\Filament\Resources\SuratdomisiliResource\Pages;

use App\Filament\Resources\SuratdomisiliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratdomisilis extends ListRecords
{
    protected static string $resource = SuratdomisiliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
