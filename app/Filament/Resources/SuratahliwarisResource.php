<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratahliwarisResource\Pages;
use App\Filament\Resources\SuratahliwarisResource\RelationManagers;
use App\Models\Suratahliwaris;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratahliwarisResource extends Resource
{
    protected static ?string $model = Suratahliwaris::class;

    protected static ?string $pluralModelLabel = 'Surat Ahli Waris';
    public static function getLabel(): string
    {
        return 'Surat Ahli Waris';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Yang Mendapatkan waris')
                    ->description('Data warga yang mendapatkan waris.')
                    ->schema([
                    Forms\Components\Select::make('warga_id')
                    ->label('Nama Warga')
                    ->relationship('warga', 'name')
                    ->searchable()
                    ->disabled(fn ($livewire) => $livewire instanceof EditRecord)
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $warga = \App\Models\Warga::find($state);
                        $set('nik', $warga?->nik);
                    }),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->nik),
                 Forms\Components\Textinput::make('tempat_lahir')
                    ->label('tempat Lahir')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->tempat_lahir),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->tanggal_lahir),
                 Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->disabled()
                    ->label('Jenis Kelamin')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->jenis_kelamin),
                Forms\Components\TextInput::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->pekerjaan),
                Forms\Components\Select::make('Kewarganegaraan')
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ])
                    ->label('Kewarganegaraan')
                    ->disabled()
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->kewarganegaraan),
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->alamat),
                ]),
                Forms\Components\Section::make('Yang Memberi waris')
                    ->description('Data warga yang memberikan waris.')
                    ->schema([
                        Forms\Components\TextInput::make('nama_waris')
                            ->required()
                            ->label('Nama Yang Memberi waris')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nik_waris')
                            ->maxLength(255)
                            ->label('NIK Yang Memberi waris')
                            ->default(null),
                        Forms\Components\TextInput::make('tempat_lahir_waris')
                            ->required()
                            ->label('Tempat Lahir Yang Memberi waris')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal_lahir_waris')
                            ->required()
                            ->label('Tempat Lahir Yang Memberi waris'),
                        Forms\Components\Select::make('jenis_kelamin_waris')
                            ->options([
                                    'L' => 'Laki-Laki',
                                    'P' => 'Perempuan',
                                ])
                            ->label('Jenis Kelamin Yang Memberi waris')   
                            ->required(),
                        Forms\Components\TextInput::make('pekerjaan_waris')
                            ->required()
                            ->label('Pekerjaan Yang Memberi waris')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tempat_meninggal')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal_meninggal')
                            ->required(),
                        Forms\Components\Select::make('kewarganegaraan_waris')
                            ->options([
                                'WNI' => 'Warga Negara Indonesia',
                                'WNA' => 'Warga Negara Asing',
                            ])
                            ->label('Kewarganegaraan Yang Memberi waris')
                            ->required(),
                            Forms\Components\Textarea::make('alamat_waris')
                            ->required()
                            ->label('Alamat Yang Memberi waris')
                            ->columnSpanFull(),
                        ]),
                Forms\Components\FileUpload::make('pengantar_pdf')
                    ->required()
                    ->label('Surat Pengantar Dari RT'),
                Forms\Components\Select::make('status')
                    ->options([
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('diproses')
                    ->required()
                    ->afterStateUpdated(function ($state, $set, $get, $livewire) {
                    if (in_array($state, ['selesai', 'ditolak'])) {
                        $livewire->kirimEmailKonfirmasi($state, $get('catatan'));
                    }
                }),
                 Forms\Components\TextInput::make('catatan')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('warga_id')
                    ->label('Nama Warga')
                    ->formatStateUsing(fn ($state, $record) => $record->warga?->name ?? '-'),
                Tables\Columns\TextColumn::make('warga.nik')
                    ->label('NIK'),
                Tables\Columns\TextColumn::make('pengantar_pdf')
                    ->label('Download PDF Pengantar')
                    ->url(fn ($record) => asset('storage/' . $record->pengantar_pdf))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Unduh PDF'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'diproses' => 'warning',
                        'selesai' => 'success',
                        'ditolak' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListSuratahliwaris::route('/'),
            'create' => Pages\CreateSuratahliwaris::route('/create'),
            'edit' => Pages\EditSuratahliwaris::route('/{record}/edit'),
        ];
    }
}
