<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WargaResource\Pages;
use App\Filament\Resources\WargaResource\RelationManagers;
use App\Models\Warga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class WargaResource extends Resource
{
    protected static ?string $model = Warga::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Data Warga';
    protected static ?string $pluralModelLabel = 'Warga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->label('Nomor Induk Kependudukan (NIK)')
                    ->required()
                    ->maxLength(16) 
                    ->unique(ignoreRecord: true) 
                    ->numeric() 
                    ->extraAttributes(['placeholder' => 'Masukkan NIK']),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->placeholder('Jika ingin mengubah isi ini jika tidak biarkan saja')
                    ->hint('password lama tidak bisa dilihat')
                    ->password()
                    ->required(fn ($context) => $context === 'create') // hanya wajib saat create
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null) // hash jika diisi
                    ->dehydrated(fn ($state) => filled($state)) // hanya kirim jika diisi
                    ->autocomplete('new-password')
                    ->extraAttributes(['placeholder' => 'Biarkan kosong jika tidak ingin mengubah'])
                    ->maxLength(255),
                    Forms\Components\Section::make('Profil Warga')
                        ->relationship('profil')
                        ->label('Profil User')
                        ->schema([
                            Forms\Components\FileUpload::make('foto')
                                ->required()
                                ->label('Foto Profil')
                                ->directory('foto-profil')
                                ->image()
                                ->imageEditor()
                                ->columnSpan('full')
                                ->placeholder('Seret atau klik untuk masukan gambar (maximal 2048kb / 2MB)')
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->maxSize(2048)
                                ->imagePreviewHeight('155'),
                            Forms\Components\TextInput::make('warga_id')
                                ->required()
                                ->readOnly()
                                ->label('Warga ID'),
                            Forms\Components\Textarea::make('alamat')
                                ->label('Alamat Warga')    
                                ->required(),
                            Forms\Components\TextInput::make('tempat_lahir')
                                ->required(),
                            Forms\Components\DatePicker::make('tanggal_lahir')
                                ->required(),
                            Forms\Components\TextInput::make('agama')
                                ->required(),
                            Forms\Components\TextInput::make('pekerjaan')
                                ->required(),
                            Forms\Components\TextInput::make('telepon')
                                ->tel()
                                ->required(),

                            Forms\Components\Select::make('jenis_kelamin')
                                ->options([
                                    'L' => 'Laki-laki',
                                    'P' => 'Perempuan',
                                ])
                                ->required(),
                            Forms\Components\Select::make('kewarganegaraan')
                                ->options([
                                    'WNI' => 'Warga Negara Indonesia',
                                    'WNA' => 'Warga Negara Asing',
                                ])
                                ->required(),
                        ]) 
                        ->columns(2)
                        ->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
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
            'index' => Pages\ListWargas::route('/'),
            'create' => Pages\CreateWarga::route('/create'),
            'edit' => Pages\EditWarga::route('/{record}/edit'),
        ];
    }
}
