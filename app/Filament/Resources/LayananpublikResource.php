<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananpublikResource\Pages;
use App\Filament\Resources\LayananpublikResource\RelationManagers;
use App\Models\Layananpublik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayananpublikResource extends Resource
{
    protected static ?string $model = Layananpublik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Laporan Warga';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('nomor_wa')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('tanggal_kejadian')
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(1000),
                Forms\Components\FileUpload::make('bukti_foto')
                    ->required()
                    ->image()
                    ->placeholder('Seret atau klik untuk masukan gambar (maximal 2048kb / 2MB)')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->maxSize(2048)
                    ->imageEditor()
                    ->disk('public')
                    ->directory('layananpublik')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->nama)    
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_wa')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->nomor_wa)    
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->alamat)    
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_kejadian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('bukti_foto')
                    ->label('Gambar')
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
            'index' => Pages\ListLayananpubliks::route('/'),
            'create' => Pages\CreateLayananpublik::route('/create'),
            'edit' => Pages\EditLayananpublik::route('/{record}/edit'),
        ];
    }
}
