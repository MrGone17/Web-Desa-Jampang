<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratPembuatanAktaLahirResource\Pages;
use App\Filament\Resources\SuratPembuatanAktaLahirResource\RelationManagers;
use App\Models\SuratPembuatanAktaLahir;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratPembuatanAktaLahirResource extends Resource
{
    protected static ?string $model = SuratPembuatanAktaLahir::class;

    protected static ?string $pluralModelLabel = 'Surat Pembuatan Akta Lahir';
    public static function getLabel(): string
    {
        return 'Surat Pembuatan Akta Lahir';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Select::make('warga_id')
                    ->label('Nama Pembuat Surat')
                    ->relationship('warga', 'name')
                    ->searchable()
                    ->disabled()
                    ->columns(1),
                Forms\Components\TextInput::make('nama_anak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_ortu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_lahir_ortu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl_lahir_ortu')
                    ->required()
                    ->displayFormat('d F Y'),  
                Forms\Components\TextInput::make('nik_ortu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('agama_ortu')
                        ->label('Agama Orang Tua')
                        ->options([
                        'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'katolik' => 'Katolik',
                            'hindu' => 'Hindu',
                            'buddha' => 'Buddha',
                            'khonghucu' => 'Khonghucu',
                        ]),
                Forms\Components\TextInput::make('pekerjaan_ortu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('usia_ortu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat_ortu')
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
                Tables\Columns\TextColumn::make('nama_ortu')
                    ->searchable()
                    ->label('Nama Orang Tua'),
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
            'index' => Pages\ListSuratPembuatanAktaLahirs::route('/'),
            'create' => Pages\CreateSuratPembuatanAktaLahir::route('/create'),
            'edit' => Pages\EditSuratPembuatanAktaLahir::route('/{record}/edit'),
        ];
    }
}
