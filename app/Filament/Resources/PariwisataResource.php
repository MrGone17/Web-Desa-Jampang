<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PariwisataResource\Pages;
use App\Filament\Resources\PariwisataResource\RelationManagers;
use App\Models\Pariwisata;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PariwisataResource extends Resource
{
    protected static ?string $model = Pariwisata::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Pariwisata ';
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
                    DateTimePicker::make('publish_date')
                        ->label('Tanggal Terbit')
                        ->default(fn() => now()->setTime(7, 0))
                        ->required(),
                ]),

            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->placeholder('Masukan Judul')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->required()
                        // ->columnSpan(3)
                        ->maxLength(1000),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->readOnly()
                        ->placeholder('Otomatis sesuai judul')
                        ->required(),
                    Forms\Components\RichEditor::make('description')
                        ->placeholder('Masukan Deskripsi (maximal 3000 karakter)')
                        ->label('Deskripsi'),
                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar')
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
                        ->directory('Pariwisata'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('publish_date')
                    ->label('Terbit'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                // Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->html()
                    ->toolTip(fn($record) => $record->description)
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
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
            'index' => Pages\ListPariwisatas::route('/'),
            'create' => Pages\CreatePariwisata::route('/create'),
            'edit' => Pages\EditPariwisata::route('/{record}/edit'),
        ];
    }
}
