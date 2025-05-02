<?php

namespace App\Filament\Resources\InfobansosResource\Pages;

use App\Filament\Resources\InfobansosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfobansos extends ListRecords
{
    protected static string $resource = InfobansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
