<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKuasaPengasuhanAnakResource\Pages;
use App\Filament\Resources\SuratKuasaPengasuhanAnakResource\RelationManagers;
use App\Models\SuratKuasaPengasuhanAnak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKuasaPengasuhanAnakResource extends Resource
{
    protected static ?string $model = SuratKuasaPengasuhanAnak::class;

protected static ?string $pluralModelLabel = 'Surat Kuasa Pengasuhan Anak';
    public static function getLabel(): string
    {
        return 'Surat Kuasa Pengasuhan Anak';
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
                    Forms\Components\TextInput::make('no_kk_anak')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nik_anak')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('jenis_kelamin_anak')
                       ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required()
                    ->label('Jenis Kelamin Anak'),
                    Forms\Components\TextInput::make('tempat_lahir_anak')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_anak')
                        ->required()
                         ->displayFormat('d F Y'), 
                    Forms\Components\Select::make('agama_anak')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\Textarea::make('alamat_anak')
                    ->required()
                    ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Data ortu')
                ->columns(2)
                ->schema([
                   Forms\Components\TextInput::make('nama_ortu')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nik_ortu')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_ortu')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\TextInput::make('no_kk_ortu')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('alamat_ortu')
                    ->required()
                    ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Data Pengasuh')
                ->columns(2)
                ->schema([
                   Forms\Components\TextInput::make('nama_pengasuh')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nik_pengasuh')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_pengasuh')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\TextInput::make('no_kk_pengasuh')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('alamat_pengasuh')
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
                Tables\Columns\TextColumn::make('nama_ortu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListSuratKuasaPengasuhanAnaks::route('/'),
            'create' => Pages\CreateSuratKuasaPengasuhanAnak::route('/create'),
            'edit' => Pages\EditSuratKuasaPengasuhanAnak::route('/{record}/edit'),
        ];
    }
}
