<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKeteranganWaliResource\Pages;
use App\Filament\Resources\SuratKeteranganWaliResource\RelationManagers;
use App\Models\SuratKeteranganWali;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKeteranganWaliResource extends Resource
{
    protected static ?string $model = SuratKeteranganWali::class;

    protected static ?string $pluralModelLabel = 'Surat Keterangan Wali';
    public static function getLabel(): string
    {
        return 'Surat Keterangan Wali';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('warga_id')
                    ->label('Nama Pembuat Surat')
                    ->relationship('warga', 'name')
                    ->searchable()
                    ->disabled(),
                Forms\Components\Section::make('Data Pria')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nik')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir')
                        ->required()
                        ->displayFormat('d F Y'),
                    Forms\Components\TextInput::make('pekerjaan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('alamat')
                        ->required()
                        ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Data Wanita')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap_perempuan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nik_perempuan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir_perempuan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_perempuan')
                        ->required()
                        ->displayFormat('d F Y'),
                    Forms\Components\TextInput::make('pekerjaan_perempuan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('alamat_perempuan')
                        ->required()
                        ->columnSpanFull(),
                ]),
                Forms\Components\Select::make('shdk_wali')
                        ->label('Hubungan Wali')
                        ->options([
                            'Ayah' => 'Ayah',
                            'Ibu' => 'Ibu',
                            'Paman' => 'Paman',
                            'Bibi' => 'Bibi',
                            'Kakek' => 'Kakek',
                            'Nenek' => 'Nenek',
                            'Wali Lainnya' => 'Wali Lainnya',
                        ])
                        ->required()
                        ->searchable(),
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
                    ->label('Pembuat Surat')
                    ->formatStateUsing(fn ($state, $record) => $record->warga?->name ?? '-'),
                Tables\Columns\TextColumn::make('pengantar_pdf')
                    ->label('Download PDF Pengantar')
                    ->url(fn ($record) => asset('storage/' . $record->pengantar_pdf))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Unduh PDF'),
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->label('Nama Wali'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListSuratKeteranganWalis::route('/'),
            'create' => Pages\CreateSuratKeteranganWali::route('/create'),
            'edit' => Pages\EditSuratKeteranganWali::route('/{record}/edit'),
        ];
    }
}
