<?php

namespace App\Filament\Resources\StrukturpemdesaResource\Pages;

use App\Filament\Resources\StrukturpemdesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrukturpemdesas extends ListRecords
{
    protected static string $resource = StrukturpemdesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
