<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BedanamaResource\Pages;
use App\Filament\Resources\BedanamaResource\RelationManagers;
use App\Models\Bedanama;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class BedanamaResource extends Resource
{
    protected static ?string $model = Bedanama::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('perbedaan')
                    ->required()
                    ->label('Perbedaan Pada Dokumen')
                    ->columnSpan('full')
                    ->maxLength(255),
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
                Forms\Components\TextInput::make('nama_beda')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK Yang Benar')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->nik),
                Forms\Components\TextInput::make('nik_beda')
                    ->label('NIK Yang Salah')
                    ->maxLength(255)
                    ->placeholder('NIK Sudah Benar')
                    ->default(null),
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat Yang Benar')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->alamat),
                Forms\Components\Textarea::make('alamat_beda')
                    ->label('Alamat Yang Salah')
                    ->placeholder('Alamat Sudah Benar'),
                Forms\Components\Textinput::make('tempat_lahir')
                    ->label('tempat Lahir')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->tempat_lahir),
                Forms\Components\TextInput::make('tempat_lahir_beda')
                    ->maxLength(255)
                    ->placeholder('Tempat Lahir Sudah Benar')
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir Benar')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->tanggal_lahir),
                Forms\Components\DatePicker::make('tanggal_lahir_beda')
                    ->label('Tanggal Lahir Salah')
                    ->placeholder('Tanggal Lahir Sudah Benar'),
                Forms\Components\Select::make('agama')
                    ->label('Agama Benar')
                    ->options([
                       'islam' => 'Islam',
                        'kristen' => 'Kristen Protestan',
                        'katolik' => 'Katolik',
                        'hindu' => 'Hindu',
                        'buddha' => 'Buddha',
                        'khonghucu' => 'Khonghucu',
                    ])
                    ->disabled()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->agama),
                Forms\Components\Select::make('agama_beda')
                    ->options([
                       'islam' => 'Islam',
                        'kristen' => 'Kristen Protestan',
                        'katolik' => 'Katolik',
                        'hindu' => 'Hindu',
                        'buddha' => 'Buddha',
                        'khonghucu' => 'Khonghucu',
                    ])
                    ->placeholder('Agama Sudah Benar')
                    ->label('Agama Salah')
                    ->default(null),
                Forms\Components\TextInput::make('pekerjaan')
                    ->label('Pekerjaan Benar')
                    ->readOnly()
                    ->placeholder('Akan terisi automatis sesuai nama warga yang dipilih')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->pekerjaan),
                Forms\Components\TextInput::make('pekerjaan_beda')
                    ->placeholder('Pekerjaan Sudah Benar')
                    ->label('Pekerjaan Salah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('Kewarganegaraan')
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ])
                    ->label('Kewarganegaraan Benar')
                    ->disabled()
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->kewarganegaraan)
                    ->default('WNI'),
                Forms\Components\Select::make('Kewarganegaraan_beda')
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ])
                    ->placeholder('Kewarganegaraan Sudah Benar')
                    ->default('WNI'),
                Forms\Components\Select::make('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->disabled()
                    ->label('Jenis Kelamin Benar')
                    ->dehydrated(false)
                    ->formatStateUsing(fn ($record) => $record?->warga?->profil->jenis_kelamin)
                    ->default('WNI'),
                Forms\Components\Select::make('jenis_kelamin_beda')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->placeholder('Jenis Kelamin Sudah Benar')
                    ->Label('Jenis Kelamin salah'),
                Forms\Components\FileUpload::make('bukti_pdf')
                    ->required(),
                Forms\Components\FileUpload::make('pengantar_pdf')
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
            'index' => Pages\ListBedanamas::route('/'),
            'create' => Pages\CreateBedanama::route('/create'),
            'edit' => Pages\EditBedanama::route('/{record}/edit'),
        ];
    }
}
