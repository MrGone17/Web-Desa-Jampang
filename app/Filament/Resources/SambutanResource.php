<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SambutanResource\Pages;
use App\Filament\Resources\SambutanResource\RelationManagers;
use App\Models\Sambutan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SambutanResource extends Resource
{
    protected static ?string $model = Sambutan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Status')
                        ->default(true)
                        ->required(),
                ]),
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->placeholder('Masukan Judul')
                        // ->required()
                        ->maxLength(1000),
                    Forms\Components\Textarea::make('description')
                        ->placeholder('Masukan Deskripsi')
                        ->maxLength(2000)
                        ->helperText('Beri Kata Sambutan')
                        ->rows(10)
                        ->label('Kata-Kata Sambutan'),
                    Forms\Components\FileUpload::make('image_kades')
                        ->label('Foto Kades')
                        ->image()
                        ->placeholder('Seret atau klik untuk masukan gambar (maximal 2048kb / 2MB)')
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->maxSize(2048)
                        ->helperText('Pastikan ukuran gambar sesuai agar tampilannya optimal atau setelah upload edit terlebih dahulu dengan mengklik icon pensil.')
                        ->imageEditor()
                        ->disk('public')
                        ->directory('sambutan'),
                    Forms\Components\Textarea::make('nama_kades')
                        ->placeholder('Masukan Nama')
                        ->maxLength(100)
                        ->helperText('Maksimal 100 karakter')
                        ->label('Nama Kades'),
                    // ->default('center')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(1000)
                    ->toolTip(fn($record) => $record->description)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_kades')
                    ->label('Gambar Kades'),
                Tables\Columns\TextColumn::make('nama_kades')
                    ->label('Nama KAdes')
                    ->limit(1000)
                    ->toolTip(fn($record) => $record->nama_kades)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
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
            'index' => Pages\ListSambutans::route('/'),
            'create' => Pages\CreateSambutan::route('/create'),
            'edit' => Pages\EditSambutan::route('/{record}/edit'),
        ];
    }
}
