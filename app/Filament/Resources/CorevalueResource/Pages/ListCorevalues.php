<?php

namespace App\Filament\Resources\CorevalueResource\Pages;

use App\Filament\Resources\CorevalueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCorevalues extends ListRecords
{
    protected static string $resource = CorevalueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
