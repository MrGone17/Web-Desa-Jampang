<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Kontak Desa ';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->columns([
                    'sm' => 1,
                    'md' => 2,
                ])
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Status')
                        ->default(true)
                        ->required(),
                ]),
                Forms\Components\TextInput::make('jam_operasional')
                    ->maxLength(255)
                    ->placeholder('Masukan Jam Operasional')
                    ->default(null),
                Forms\Components\TextInput::make('telepon')
                    ->tel()
                    ->placeholder('Masukan No Telepon')
                    ->maxLength(20)
                    ->default(null),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(100)
                    ->placeholder('Masukan Alamat Kantor Desa')
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->placeholder('Masukan Email')
                    ->maxLength(50)
                    ->default(null),
                Forms\Components\Textarea::make('google_maps_embed')
                    ->placeholder('Masukan Link Dari Google Maps')
                    ->helperText('pastikan link yang di ambil dari googgle maps yang sudah di embed')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('jam_operasional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->toolTip(fn($record) => $record->telepon)
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                ->toolTip(fn($record) => $record->alamat)
                ->searchable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('email')
                    ->toolTip(fn($record) => $record->email)
                    ->searchable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
