<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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

            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('visi_title')
                        ->label('Judul Visi')
                        ->placeholder('Masukan Judul')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->required()
                        ->maxLength(1000),
                    Forms\Components\RichEditor::make('visi_desc')
                        ->placeholder('Masukan Deskripsi (maximal 1000 karakter)')
                        ->label('Deskripsi Visi'),
                    Forms\Components\TextInput::make('misi_title')
                        ->label('Judul Misi')
                        ->placeholder('Masukan Judul')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->required()
                        ->maxLength(1000),
                    Forms\Components\RichEditor::make('misi_desc')
                        ->placeholder('Masukan Deskripsi (maximal 1000 karakter)')
                        ->label('Deskripsi Misi'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('visi_title')
                    ->label('Judul Visi')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                Tables\Columns\TextColumn::make('visi_desc')
                    ->label('Deskripsi Visi')
                    ->html()
                    ->toolTip(fn($record) => $record->description)
                    ->limit(20)
                    ->searchable(),
                    Tables\Columns\TextColumn::make('misi_title')
                    ->label('Judul Misi')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                Tables\Columns\TextColumn::make('misi_desc')
                    ->label('Deskripsi Misi')
                    ->html()
                    ->toolTip(fn($record) => $record->description)
                    ->limit(20)
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
