<?php

namespace App\Filament\Resources\PariwisataResource\Pages;

use App\Filament\Resources\PariwisataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPariwisata extends EditRecord
{
    protected static string $resource = PariwisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
