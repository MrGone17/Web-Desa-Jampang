<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratnikahResource\Pages;
use App\Filament\Resources\SuratnikahResource\RelationManagers;
use App\Models\Suratnikah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratnikahResource extends Resource
{
    protected static ?string $model = Suratnikah::class;

    protected static ?string $pluralModelLabel = 'Syrat';
    public static function getLabel(): string
    {
        return 'Surat Nikah';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('nama_lengkap')->required(),
            Forms\Components\TextInput::make('nik')->required(),
            Forms\Components\DatePicker::make('tgl_lahir')->required(),
            Forms\Components\Textarea::make('alamat')->required(),
            Forms\Components\TextInput::make('nama_pasangan')->required(),
            Forms\Components\DatePicker::make('tgl_nikah')->required(),
            Forms\Components\FileUpload::make('kk_foto')
                ->image()
                ->directory('uploads/kk_foto')
                ->visibility('public')
                ->imagePreviewHeight('150')
                ->required(),
            Forms\Components\FileUpload::make('kk_pdf')
                ->label('Upload PDF KK')
                ->acceptedFileTypes(['application/pdf'])
                ->directory('uploads/kk_pdf')
                ->visibility('public'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable(),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('tgl_lahir'),
                Tables\Columns\TextColumn::make('tgl_nikah'),

                // Preview & download KK foto
                Tables\Columns\ImageColumn::make('kk_foto')
                    ->label('Foto KK')
                    ->circular()
                    ->height(60),

                Tables\Columns\TextColumn::make('kk_foto')
                    ->label('Download Foto KK')
                    ->url(fn ($record) => asset('storage/' . $record->kk_foto))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Unduh'),

                // Download link untuk PDF
                Tables\Columns\TextColumn::make('kk_pdf')
                    ->label('Download PDF KK')
                    ->url(fn ($record) => asset('storage/' . $record->kk_pdf))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Unduh PDF'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
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
            'index' => Pages\ListSuratnikahs::route('/'),
            'create' => Pages\CreateSuratnikah::route('/create'),
            'edit' => Pages\EditSuratnikah::route('/{record}/edit'),
        ];
    }
}
