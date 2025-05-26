<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKetPernahMenikahResource\Pages;
use App\Filament\Resources\SuratKetPernahMenikahResource\RelationManagers;
use App\Models\SuratKetPernahMenikah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKetPernahMenikahResource extends Resource
{
    protected static ?string $model = SuratKetPernahMenikah::class;

    protected static ?string $pluralModelLabel = 'Surat Keterangan Pernah Menikah';
    public static function getLabel(): string
    {
        return 'Surat Keterangan Pernah Menikah';
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
                Forms\Components\Section::make('Data Yang Mengkawinkan')
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
                    Forms\Components\Select::make('agama')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\Textarea::make('alamat')
                        ->required()
                        ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Data pria')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap_pria')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nik_pria')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir_pria')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_pria')
                        ->required()
                        ->format('Y-m-d')
                        ->closeOnDateSelection()
                        ->displayFormat('d F Y'),
                    Forms\Components\Select::make('jenis_kelamin_pria')
                        ->options([
                            'L' => 'Laki-Laki',
                            'P' => 'Perempuan',
                        ])
                        ->required()
                        ->label('Jenis Kelamin'),
                    Forms\Components\TextInput::make('pekerjaan_pria')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_pria')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\Textarea::make('alamat_pria')
                        ->required()
                        ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Data perempuan')
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
                        ->format('Y-m-d')
                        ->closeOnDateSelection()
                        ->displayFormat('d F Y'),
                    Forms\Components\Select::make('jenis_kelamin_perempuan')
                        ->options([
                            'L' => 'Laki-Laki',
                            'P' => 'Perempuan',
                        ])
                        ->required()
                        ->label('Jenis Kelamin'),
                    Forms\Components\TextInput::make('pekerjaan_perempuan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('agama_perempuan')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\Textarea::make('alamat_perempuan')
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
            'index' => Pages\ListSuratKetPernahMenikahs::route('/'),
            'create' => Pages\CreateSuratKetPernahMenikah::route('/create'),
            'edit' => Pages\EditSuratKetPernahMenikah::route('/{record}/edit'),
        ];
    }
}
