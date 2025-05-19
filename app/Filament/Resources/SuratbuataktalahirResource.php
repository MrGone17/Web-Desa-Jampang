<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratbuataktalahirResource\Pages;
use App\Filament\Resources\SuratbuataktalahirResource\RelationManagers;
use App\Models\Suratbuataktalahir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratbuataktalahirResource extends Resource
{
    protected static ?string $model = Suratbuataktalahir::class;

    protected static ?string $pluralModelLabel = 'Surat Keterangan Kelahiran';
    public static function getLabel(): string
    {
        return 'Surat Keterangan Kelahiran';
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
                Forms\Components\Section::make('Data Anak')
                ->columns(2)
                ->schema([
                     Forms\Components\TextInput::make('nama_anak')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_anak')
                        ->required()
                         ->displayFormat('d F Y'), 
                    Forms\Components\TextInput::make('anak_ke')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('waktu_lahir_anak')
                        ->required(),
                    Forms\Components\Select::make('jenis_kelamin_anak')
                       ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required()
                    ->label('Jenis Kelamin Anak'),
                    Forms\Components\Select::make('kewarganegaraan_anak')
                    ->required()
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
                ]),
                Forms\Components\Section::make('Data Ibu')
                ->columns(2)
                ->schema([
                   Forms\Components\TextInput::make('nama_ibu')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nik_ibu')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_ibu')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\TextInput::make('pekerjaan_ibu')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir_ibu')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_ibu')
                        ->required()
                         ->displayFormat('d F Y'), 
                    Forms\Components\Select::make('jenis_kelamin_ibu')
                        ->required()
                        ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
                    Forms\Components\Select::make('kewarganegaraan_ibu')
                        ->required()
                        ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
                ]),
                Forms\Components\Section::make('Data Ayah')
                ->columns(2)
                ->schema([
                   Forms\Components\TextInput::make('nama_ayah')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nik_ayah')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_ayah')
                    ->label('Agama')
                    ->options([
                       'islam' => 'Islam',
                        'kristen' => 'Kristen Protestan',
                        'katolik' => 'Katolik',
                        'hindu' => 'Hindu',
                        'buddha' => 'Buddha',
                        'khonghucu' => 'Khonghucu',
                    ]),
                    Forms\Components\TextInput::make('pekerjaan_ayah')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir_ayah')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_ayah')
                        ->required()
                         ->displayFormat('d F Y'), 
                    Forms\Components\Select::make('jenis_kelamin_ayah')
                        ->required()
                        ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
                    Forms\Components\Select::make('kewarganegaraan_ayah')
                        ->required()
                        ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
                ]),
                Forms\Components\Textarea::make('alamat_keluarga')
                    ->required()
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('nama_ayah')
                    ->searchable(),
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
            'index' => Pages\ListSuratbuataktalahirs::route('/'),
            'create' => Pages\CreateSuratbuataktalahir::route('/create'),
            'edit' => Pages\EditSuratbuataktalahir::route('/{record}/edit'),
        ];
    }
}
