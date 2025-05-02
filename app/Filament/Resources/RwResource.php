<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RwResource\Pages;
use App\Filament\Resources\RwResource\RelationManagers;
use App\Models\Rw;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RwResource extends Resource
{
    protected static ?string $model = Rw::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Data Penduduk ';
    }

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
            Forms\Components\TextInput::make('nomor_rw')
                ->label('Nomor RW')
                ->required()
                ->maxLength(10),
            Forms\Components\Repeater::make('rts')
                ->label('Daftar RT')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('nomor_rt')->label('Nomor RT')->required(),
                    Forms\Components\TextInput::make('jumlah_penduduk')
                        ->label('Jumlah Penduduk')
                        ->numeric()
                        ->minValue(0),
                ])
            ->addActionLabel('Tambah RT')
            ->collapsible()
            ->defaultItems(1)
            ->columns(2)
            ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('nomor_rw')
                    ->label('Nomor RW')
                    ->toolTip(fn($record) => $record->nomor_rw)
                    ->searchable(),
                Tables\Columns\TextColumn::make('rts_count')
                ->label('Jumlah RT')
                ->counts('rts')
                ->tooltip(fn ($record) => "{$record->rts_count} RT di RW {$record->nomor_rw}"),
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
            'index' => Pages\ListRws::route('/'),
            'create' => Pages\CreateRw::route('/create'),
            'edit' => Pages\EditRw::route('/{record}/edit'),
        ];
    }
}
