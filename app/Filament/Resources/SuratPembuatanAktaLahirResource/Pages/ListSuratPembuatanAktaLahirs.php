<?php

namespace App\Filament\Resources\SuratPembuatanAktaLahirResource\Pages;

use App\Filament\Resources\SuratPembuatanAktaLahirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPembuatanAktaLahirs extends ListRecords
{
    protected static string $resource = SuratPembuatanAktaLahirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
