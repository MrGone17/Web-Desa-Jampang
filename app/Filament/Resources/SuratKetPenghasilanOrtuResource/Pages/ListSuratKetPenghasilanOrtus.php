<?php

namespace App\Filament\Resources\SuratKetPenghasilanOrtuResource\Pages;

use App\Filament\Resources\SuratKetPenghasilanOrtuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetPenghasilanOrtus extends ListRecords
{
    protected static string $resource = SuratKetPenghasilanOrtuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
