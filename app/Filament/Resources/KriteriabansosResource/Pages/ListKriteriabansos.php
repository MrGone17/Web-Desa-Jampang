<?php

namespace App\Filament\Resources\KriteriabansosResource\Pages;

use App\Filament\Resources\KriteriabansosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKriteriabansos extends ListRecords
{
    protected static string $resource = KriteriabansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
