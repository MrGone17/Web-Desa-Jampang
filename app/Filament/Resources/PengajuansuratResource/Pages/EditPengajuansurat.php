<?php

namespace App\Filament\Resources\PengajuansuratResource\Pages;

use App\Filament\Resources\PengajuansuratResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengajuansurat extends EditRecord
{
    protected static string $resource = PengajuansuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
