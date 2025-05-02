<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SosmedResource\Pages;
use App\Filament\Resources\SosmedResource\RelationManagers;
use App\Models\Sosmed;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SosmedResource extends Resource
{
    protected static ?string $model = Sosmed::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Sosial Media ';
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
                Forms\Components\TextInput::make('platform')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('icon')
                    ->maxLength(20)
                    ->placeholder('Contoh: facebook, instagram, youtube')
                    ->default(null),
                Forms\Components\TextInput::make('link')
                    ->maxLength(100)
                    ->url()
                    ->default(null),
                Forms\Components\TextInput::make('username')
                    ->maxLength(50)
                    ->prefix('@')
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                ->label('Status'),
                Tables\Columns\TextColumn::make('platform')
                    ->label('Platform')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->platform)
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('icon')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->icon)
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('link sosmed')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->link)
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->label('Username')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->username)
                    ->searchable(),
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
            'index' => Pages\ListSosmeds::route('/'),
            'create' => Pages\CreateSosmed::route('/create'),
            'edit' => Pages\EditSosmed::route('/{record}/edit'),
        ];
    }
}
