<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratRujukCeraiResource\Pages;
use App\Filament\Resources\SuratRujukCeraiResource\RelationManagers;
use App\Models\SuratRujukCerai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratRujukCeraiResource extends Resource
{
    protected static ?string $model = SuratRujukCerai::class;

     protected static ?string $pluralModelLabel = 'Surat Keterangan Rujuk Cerai';
    public static function getLabel(): string
    {
        return 'Surat Keterangan Rujuk Cerai';
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
                    Forms\Components\TextInput::make('bin_bapak')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir')
                        ->required()
                        ->displayFormat('d F Y'),
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
                    Forms\Components\Select::make('kewarganegaraan')
                    ->required()
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
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
                    Forms\Components\TextInput::make('nama_lengkap_pasangan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('binti_bapak_pasangan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir_pasangan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir_pasangan')
                        ->required()
                        ->displayFormat('d F Y'),
                    Forms\Components\Select::make('agama_pasangan')
                        ->label('Agama')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                    Forms\Components\Select::make('kewarganegaraan_pasangan')
                    ->required()
                    ->options([
                        'WNI' => 'Warga Negara Indonesia',
                        'WNA' => 'Warga Negara Asing',
                    ]),
                    Forms\Components\TextInput::make('pekerjaan_pasangan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('alamat_pasangan')
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
            'index' => Pages\ListSuratRujukCerais::route('/'),
            'create' => Pages\CreateSuratRujukCerai::route('/create'),
            'edit' => Pages\EditSuratRujukCerai::route('/{record}/edit'),
        ];
    }
}
