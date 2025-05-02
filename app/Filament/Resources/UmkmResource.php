<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Filament\Resources\UmkmResource\RelationManagers;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make()
                ->columns([
                    'sm' => 1,
                    'md' => 2,
                ])
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Status')
                        ->default(true)
                        ->required(),
                    DateTimePicker::make('publish_date')
                        ->label('Tanggal Terbit')
                        ->default(fn() => now()->setTime(7, 0))
                        ->required(),
                ]),

            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->placeholder('Masukan Judul')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->required()
                        // ->columnSpan(3)
                        ->maxLength(1000),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->readOnly()
                        ->placeholder('Otomatis sesuai judul')
                        ->required(),
                    Forms\Components\RichEditor::make('description')
                        ->placeholder('Masukan Deskripsi (maximal 3000 karakter)')
                        ->label('Deskripsi'),
                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar')
                        ->image()
                        ->placeholder('Seret atau klik untuk masukan gambar (maximal 2048kb / 2MB)')
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->maxSize(2048)
                        ->imageResizeTargetWidth('500')
                        ->imageResizeTargetHeight('500')
                        ->imageEditor()
                        ->disk('public')
                        ->directory('Umkm'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('publish_date')
                    ->label('Terbit'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                // Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->html()
                    ->toolTip(fn($record) => $record->description)
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
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
                DeleteAction::make()
                    ->label('Arsipkan')
                    ->icon('heroicon-o-archive-box')
                    ->action(function ($record) {
                        // Logika untuk menghapus atau mengarsipkan data
                        $record->delete(); // Menghapus item dari database

                        // Menampilkan notifikasi setelah item berhasil diarsipkan
                        Notification::make()
                            ->title('Data Berhasil Diarsipkan')
                            ->success()
                            ->send();
                    })
                    ->modalHeading('Yakin ingin arsipkan Umkm?')
                    // ->modalSubheading('Apakah Anda yakin ingin mengarsipkan data ini? Data yang telah diarsipkan dapat dipulihkan nanti jika diperlukan.')
                    // ->modalButton('Arsipkan Data')
                    ->requiresConfirmation(), // Meminta konfirmasi sebelum menghapus
                RestoreAction::make()->visible(fn($record) => $record->trashed())
                    ->label('Restore')
                    ->icon('heroicon-o-arrow-path'), // Menam
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
