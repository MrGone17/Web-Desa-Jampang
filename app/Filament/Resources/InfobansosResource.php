<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfobansosResource\Pages;
use App\Filament\Resources\InfobansosResource\RelationManagers;
use App\Models\Infobansos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfobansosResource extends Resource
{
    protected static ?string $model = Infobansos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): string
    {
        return 'Informasi Bansos';
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
                    ->helperText('Informasi Bansos')
                    ->rows(10)
                    ->label('Deskripsi Informasi'),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar Background'),
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
            'index' => Pages\ListInfobansos::route('/'),
            'create' => Pages\CreateInfobansos::route('/create'),
            'edit' => Pages\EditInfobansos::route('/{record}/edit'),
        ];
    }
}
