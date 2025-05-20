<?php

namespace App\Filament\Resources\SuratDuplikatSuratNikahResource\Pages;

use App\Filament\Resources\SuratDuplikatSuratNikahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratDuplikatSuratNikahs extends ListRecords
{
    protected static string $resource = SuratDuplikatSuratNikahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
