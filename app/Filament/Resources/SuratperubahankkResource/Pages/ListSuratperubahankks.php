<?php

namespace App\Filament\Resources\SuratperubahankkResource\Pages;

use App\Filament\Resources\SuratperubahankkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratperubahankks extends ListRecords
{
    protected static string $resource = SuratperubahankkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
