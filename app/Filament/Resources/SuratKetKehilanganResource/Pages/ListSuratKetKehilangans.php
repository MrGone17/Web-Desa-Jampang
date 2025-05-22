<?php

namespace App\Filament\Resources\SuratKetKehilanganResource\Pages;

use App\Filament\Resources\SuratKetKehilanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetKehilangans extends ListRecords
{
    protected static string $resource = SuratKetKehilanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
