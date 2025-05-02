<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananadmResource\Pages;
use App\Filament\Resources\LayananadmResource\RelationManagers;
use App\Models\Layananadm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayananadmResource extends Resource
{
    protected static ?string $model = Layananadm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Layanan Administrasi ';
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
                    ->helperText('Beri Kata Layanan')
                    ->rows(10)
                    ->label('Deskripsi Layanan'),
                Forms\Components\TextInput::make('icon')
                    ->required()
                    ->label('Icon (nama lucide)') // contoh: file-text, baby, id-card
                    ->placeholder('file-text')
                    ->helperText('contoh: file-text, baby, id-card'),
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
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->limit(50)
                    ->toolTip(fn($record) => $record->icon)
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
            'index' => Pages\ListLayananadms::route('/'),
            'create' => Pages\CreateLayananadm::route('/create'),
            'edit' => Pages\EditLayananadm::route('/{record}/edit'),
        ];
    }
}
