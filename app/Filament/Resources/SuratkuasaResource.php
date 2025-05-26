<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratkuasaResource\Pages;
use App\Filament\Resources\SuratkuasaResource\RelationManagers;
use App\Models\Suratkuasa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratkuasaResource extends Resource
{
    protected static ?string $model = Suratkuasa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Yang Memberi Kuasa')
                    ->description('Data warga yang memberikan kuasa.')
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
                 Forms\Components\Select::make('Jenis Kelamin')
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
                Forms\Components\TextInput::make('alasan_kuasa')
                    ->required()
                    ->label('Alasan Memberikan Kuasa')
                    ->maxLength(255),
                    ]),
                Forms\Components\Section::make('Yang Diberi Kuasa')
                    ->description('Data warga yang di berikan kuasa.')
                    ->schema([
                        Forms\Components\TextInput::make('nama_kuasa')
                            ->required()
                            ->label('Nama Yang Diberi Kuasa')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nik_kuasa')
                            ->maxLength(255)
                            ->label('NIK Yang Diberi Kuasa')
                            ->default(null),
                        Forms\Components\TextInput::make('tempat_lahir_kuasa')
                            ->required()
                            ->label('Tempat Lahir Yang Diberi Kuasa')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal_lahir_kuasa')
                            ->required()
                            ->label('Tempat Lahir Yang Diberi Kuasa'),
                        Forms\Components\Select::make('jenis_kelamin_kuasa')
                            ->options([
                                    'L' => 'Laki-Laki',
                                    'P' => 'Perempuan',
                                ])
                            ->label('Jenis Kelamin Yang Diberi Kuasa')   
                            ->required(),
                        Forms\Components\TextInput::make('pekerjaan_kuasa')
                            ->required()
                            ->label('Pekerjaan Yang Diberi Kuasa')
                            ->maxLength(255),
                        Forms\Components\Select::make('kewarganegaraan_kuasa')
                            ->options([
                                'WNI' => 'Warga Negara Indonesia',
                                'WNA' => 'Warga Negara Asing',
                            ])
                            ->label('Kewarganegaraan Yang Diberi Kuasa')
                            ->required(),
                            Forms\Components\Textarea::make('alamat_kuasa')
                            ->required()
                            ->label('Alamat Yang Diberi Kuasa')
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
            'index' => Pages\ListSuratkuasas::route('/'),
            'create' => Pages\CreateSuratkuasa::route('/create'),
            'edit' => Pages\EditSuratkuasa::route('/{record}/edit'),
        ];
    }
}
