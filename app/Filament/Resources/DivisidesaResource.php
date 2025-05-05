<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DivisidesaResource\Pages;
use App\Filament\Resources\DivisidesaResource\RelationManagers;
use App\Models\Divisidesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class DivisidesaResource extends Resource
{
    protected static ?string $model = Divisidesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'title';
    public static function getLabel(): string
    {
        return 'Divisi Desa';
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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true),
                    Forms\Components\Repeater::make('aparatur')
                        ->label('Tambahkan Anggota Divisi')
                        ->relationship()
                        ->schema([
                            Forms\Components\FileUpload::make('image')
                            ->label('Foto Aparatur Desa')
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
                            ->columnSpan('full')
                            ->disk('public')
                            ->directory('Aparatur-desa'),
                            Forms\Components\TextArea::make('nama')
                                ->label('Nama Anggota')
                                ->rows(2),
                            Forms\Components\TextArea::make('jabatan')
                                ->label('Jabatan')
                                ->rows(2),
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
                Tables\Columns\TextColumn::make('title')
                ->toolTip(fn($record) => $record->title)
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
            'index' => Pages\ListDivisidesas::route('/'),
            'create' => Pages\CreateDivisidesa::route('/create'),
            'edit' => Pages\EditDivisidesa::route('/{record}/edit'),
        ];
    }
}
