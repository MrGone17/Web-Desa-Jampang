<?php

namespace App\Filament\Resources\SuratKetPernahMenikahResource\Pages;

use App\Filament\Resources\SuratKetPernahMenikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKetPernahMenikahs extends ListRecords
{
    protected static string $resource = SuratKetPernahMenikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
