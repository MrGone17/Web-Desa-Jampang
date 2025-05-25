<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasswordResetRequestResource\Pages;
use App\Filament\Resources\PasswordResetRequestResource\RelationManagers;
use App\Models\PasswordResetRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetRequestResource extends Resource
{
    protected static ?string $model = PasswordResetRequest::class;
    protected static ?string $navigationLabel = 'Permintaan Reset Password';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('warga.email')->label('Email Warga'),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'menunggu' => 'warning',
                        'disetujui' => 'success',
                        'selesai' => 'success',
                        'ditolak' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal Permintaan')
                    ->label('Tanggal Permintaan')
                    ->dateTime('d M Y H:i') 
                    ->timezone('Asia/Jakarta'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('setujui')
                    ->label('Setujui')
                    ->action(function (PasswordResetRequest $record) {
                        $token = Str::random(60);
                        $record->update([
                            'status' => 'disetujui',
                            'token' => $token,
                            'expires_at' => now()->addHours(24),
                        ]);

                        // Kirim email ke warga dengan link reset
                        $warga = $record->warga;
                        Mail::to($warga->email)->send(new \App\Mail\PasswordResetLink($warga, $token));
                    })
                    ->requiresConfirmation()
                    ->visible(fn (PasswordResetRequest $record) => $record->status === 'menunggu'),
                Tables\Actions\Action::make('tolak')
                    ->label('Tolak')
                    ->action(function (PasswordResetRequest $record) {
                        $record->update(['status' => 'ditolak']);
                    })
                    ->requiresConfirmation()
                    ->visible(fn (PasswordResetRequest $record) => $record->status === 'menunggu'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePasswordResetRequests::route('/'),
        ];
    }
}
