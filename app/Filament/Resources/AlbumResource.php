<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers;
use App\Filament\Resources\PhotosResource\RelationManagers\PhotosRelationManager;
use App\Models\Album;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Foto Desa';
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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                ),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->readOnly()
                    ->placeholder('Otomatis sesuai judul')
                    ->unique(ignoreRecord: true),
                Forms\Components\Textarea::make('description'),
                Forms\Components\FileUpload::make('cover_image')
                    ->directory('album-covers')
                    ->image()
                    ->imageEditor()
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->required(),
                    Forms\Components\Repeater::make('photos')
                        ->label('Daftar Foto Dalam Album Ini')
                        ->relationship()
                        ->schema([
                            Forms\Components\FileUpload::make('image')
                                ->required()
                                ->directory('album-photos')
                                ->image()
                                ->imageEditor()
                                ->placeholder('Seret atau klik untuk masukan gambar (maximal 2048kb / 2MB)')
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->maxSize(2048)
                                ->imagePreviewHeight('155'),
                            Forms\Components\TextArea::make('caption')
                                ->label('Keterangan')
                                ->rows(6),
                        ])
                    ->addActionLabel('Tambah Foto')
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
                Tables\Columns\ImageColumn::make('cover_image')
                ->label('Cover'),
                Tables\Columns\TextColumn::make('title')
                ->toolTip(fn($record) => $record->title)
                ->searchable(),
                Tables\Columns\TextColumn::make('photos_count')
                ->label('Jumlah Foto')
                ->counts('photos'),
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
           
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
