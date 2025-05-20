<?php

namespace App\Filament\Resources\SuratPembuatanPengakuanAnakResource\Pages;

use App\Filament\Resources\SuratPembuatanPengakuanAnakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPembuatanPengakuanAnaks extends ListRecords
{
    protected static string $resource = SuratPembuatanPengakuanAnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
