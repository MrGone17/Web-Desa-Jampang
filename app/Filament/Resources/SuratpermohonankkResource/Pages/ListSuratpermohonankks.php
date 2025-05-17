<?php

namespace App\Filament\Resources\SuratpermohonankkResource\Pages;

use App\Filament\Resources\SuratpermohonankkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratpermohonankks extends ListRecords
{
    protected static string $resource = SuratpermohonankkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
