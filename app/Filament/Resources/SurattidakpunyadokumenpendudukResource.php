<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurattidakpunyadokumenpendudukResource\Pages;
use App\Filament\Resources\SurattidakpunyadokumenpendudukResource\RelationManagers;
use App\Models\Surattidakpunyadokumenpenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurattidakpunyadokumenpendudukResource extends Resource
{
    protected static ?string $model = Surattidakpunyadokumenpenduduk::class;

    protected static ?string $pluralModelLabel = 'Surat Tidak memiliki Dokumen Penduduk';
    public static function getLabel(): string
    {
        return 'Surat Tidak memiliki Dokumen Penduduk';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\Select::make('warga_id')
                    ->label('Nama Warga')
                    ->relationship('warga', 'name')
                    ->searchable()
                    ->disabled(fn ($livewire) => $livewire instanceof EditRecord)
                    ->reactive() // penting untuk bisa trigger afterStateUpdated
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
                Forms\Components\TextInput::make('nama_ibu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('pengantar_pdf')
                    ->required(),
                Forms\Components\Select::make('gol_darah')
                    ->label('Golongan Darah')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'AB' => 'AB',
                        'O' => 'O',
                        'tidak_mengetahui' => 'Tidak Mengetahui',
                    ])
                    ->placeholder('Pilih golongan darah')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('catatan')
                    ->maxLength(255)
                    ->default(null),
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
            'index' => Pages\ListSurattidakpunyadokumenpenduduks::route('/'),
            'create' => Pages\CreateSurattidakpunyadokumenpenduduk::route('/create'),
            'edit' => Pages\EditSurattidakpunyadokumenpenduduk::route('/{record}/edit'),
        ];
    }
}
