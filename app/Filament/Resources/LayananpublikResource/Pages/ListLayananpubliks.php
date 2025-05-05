<?php

namespace App\Filament\Resources\LayananpublikResource\Pages;

use App\Filament\Resources\LayananpublikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLayananpubliks extends ListRecords
{
    protected static string $resource = LayananpublikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
