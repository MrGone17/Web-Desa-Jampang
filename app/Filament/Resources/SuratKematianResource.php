<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKematianResource\Pages;
use App\Filament\Resources\SuratKematianResource\RelationManagers;
use App\Models\SuratKematian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKematianResource extends Resource
{
    protected static ?string $model = SuratKematian::class;

    protected static ?string $pluralModelLabel = 'Surat Kematian';
    public static function getLabel(): string
    {
        return 'Surat Kematian';
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
                Forms\Components\Section::make('Data Yang Meninggal')
                ->columns(2)
                ->schema([
                     Forms\Components\TextInput::make('nama_meninggal')
                    ->required()
                    ->maxLength(255),
                     Forms\Components\Select::make('jenis_kelamin_meninggal')
                       ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required()
                    ->label('Jenis Kelamin Yang Meninggal'),
                    Forms\Components\DatePicker::make('tgl_lahir_meninggal')
                        ->required()
                         ->displayFormat('d F Y'),  
                    Forms\Components\TextInput::make('tempat_lahir_meninggal')
                        ->required(),
                    Forms\Components\DatePicker::make('tgl_meninggal')
                        ->required()
                         ->displayFormat('d F Y'),
                    Forms\Components\TextInput::make('tempat_meninggal')
                        ->required(),
                    Forms\Components\Select::make('kewarganegaraan_meninggal')
                    ->required()
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
                    Forms\Components\Textarea::make('alamat_meninggal')
                    ->required()
                    ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Data Yang Bersangkutan')
                ->columns(2)
                ->schema([
                   Forms\Components\TextInput::make('nama_bersangkutan')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nik_bersangkutan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_bersangkutan')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\TextInput::make('pekerjaan_bersangkutan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir_bersangkutan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_bersangkutan')
                        ->required()
                         ->displayFormat('d F Y'), 
                    Forms\Components\Select::make('jenis_kelamin_bersangkutan')
                        ->required()
                        ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
                    Forms\Components\Select::make('kewarganegaraan_bersangkutan')
                        ->required()
                        ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
                    Forms\Components\Select::make('shdk_bersangkutan')
                        ->required()
                        ->options([
                        'ayah' => 'Ayah',
                        'ibu' => 'Ibu',
                        'suami' => 'Suami',
                        'istri' => 'Istri',
                        'anak' => 'Anak',
                    ])
                    ->label('Status Hubungan Dalam Keluarga Sebagai'),
                    Forms\Components\Textarea::make('alamat_bersangkutan')
                    ->required()
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
                    ->label('Pembuat Surat')
                    ->formatStateUsing(fn ($state, $record) => $record->warga?->name ?? '-'),
               Tables\Columns\TextColumn::make('pengantar_pdf')
                    ->label('Download PDF Pengantar')
                    ->url(fn ($record) => asset('storage/' . $record->pengantar_pdf))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Unduh PDF'),
                Tables\Columns\TextColumn::make('nama_meninggal')
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
            'index' => Pages\ListSuratKematians::route('/'),
            'create' => Pages\CreateSuratKematian::route('/create'),
            'edit' => Pages\EditSuratKematian::route('/{record}/edit'),
        ];
    }
}
