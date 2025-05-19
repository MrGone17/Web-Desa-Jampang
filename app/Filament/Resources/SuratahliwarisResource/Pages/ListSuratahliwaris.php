<?php

namespace App\Filament\Resources\SuratahliwarisResource\Pages;

use App\Filament\Resources\SuratahliwarisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratahliwaris extends ListRecords
{
    protected static string $resource = SuratahliwarisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
