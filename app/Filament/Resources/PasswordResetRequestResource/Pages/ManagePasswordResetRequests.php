<?php

namespace App\Filament\Resources\PasswordResetRequestResource\Pages;

use App\Filament\Resources\PasswordResetRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePasswordResetRequests extends ManageRecords
{
    protected static string $resource = PasswordResetRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
