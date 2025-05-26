<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKetJualBeliResource\Pages;
use App\Filament\Resources\SuratKetJualBeliResource\RelationManagers;
use App\Models\SuratKetJualBeli;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKetJualBeliResource extends Resource
{
    protected static ?string $model = SuratKetJualBeli::class;

    protected static ?string $pluralModelLabel = 'Surat Jual Beli Usaha';
    public static function getLabel(): string
    {
        return 'Surat Jual Beli Usaha';
    }   
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('warga_id')
                    ->label('Nama Pembuat Surat')
                    ->relationship('warga', 'name')
                    ->searchable()
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\Section::make('Data Pihak Pertama')
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
                            ->format('Y-m-d')
                            ->closeOnDateSelection() 
                            ->displayFormat('d F Y'),
                        Forms\Components\Select::make('jenis_kelamin')
                        ->options([
                                'L' => 'Laki-Laki',
                                'P' => 'Perempuan',
                            ])
                            ->required()
                            ->label('Jenis Kelamin'),
                        Forms\Components\TextInput::make('pekerjaan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('kewarganegaraan')
                            ->required()
                            ->options([
                                'WNI' => 'Warga Negara Indonesia',
                                'WNA' => 'Warga Negara Asing',
                            ]),
                        Forms\Components\Textarea::make('alamat')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Data Pihak Kedua')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('nama_lengkap_pihaklain')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nik_pihaklain')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tempat_lahir_pihaklain')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tgl_lahir_pihaklain')
                            ->required()
                            ->format('Y-m-d')
                            ->closeOnDateSelection() 
                            ->displayFormat('d F Y'),
                        Forms\Components\Select::make('jenis_kelamin_pihaklain')
                        ->options([
                                'L' => 'Laki-Laki',
                                'P' => 'Perempuan',
                            ])
                            ->required()
                            ->label('Jenis Kelamin'),
                        Forms\Components\TextInput::make('pekerjaan_pihaklain')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('kewarganegaraan_pihaklain')
                            ->required()
                            ->options([
                                'WNI' => 'Warga Negara Indonesia',
                                'WNA' => 'Warga Negara Asing',
                            ]),
                        Forms\Components\Textarea::make('alamat_pihaklain')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\TextInput::make('nama_barang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('spesifikasi')
                    ->required()
                    ->maxLength(255),
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
                    ->searchable(),
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
            'index' => Pages\ListSuratKetJualBelis::route('/'),
            'create' => Pages\CreateSuratKetJualBeli::route('/create'),
            'edit' => Pages\EditSuratKetJualBeli::route('/{record}/edit'),
        ];
    }
}
