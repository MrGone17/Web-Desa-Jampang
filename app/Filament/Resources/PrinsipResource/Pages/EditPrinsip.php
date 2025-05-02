<?php

namespace App\Filament\Resources\PrinsipResource\Pages;

use App\Filament\Resources\PrinsipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrinsip extends EditRecord
{
    protected static string $resource = PrinsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
