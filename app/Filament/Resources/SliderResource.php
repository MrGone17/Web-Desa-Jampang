<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Cache;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('order')
                ->hidden()
                ->numeric()
                ->default(0),
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Status')
                        ->default(true)
                        ->required(),
                ]),
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->placeholder('Masukan Judul')
                        // ->required()
                        ->maxLength(1000),
                    Forms\Components\Textarea::make('description')
                        ->placeholder('Masukan Deskripsi')
                        ->maxLength(100)
                        ->helperText('Maksimal 100 karakter')
                        ->label('Deskripsi'),
                    Forms\Components\FileUpload::make('image_cover')
                        ->label('Gambar Cover')
                        ->image()
                        ->placeholder('Seret atau klik untuk masukan gambar (maximal 2048kb / 2MB)')
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->maxSize(2048)
                        ->imageResizeTargetWidth('1920')
                        ->imageResizeTargetHeight('460')
                        ->helperText('Tinggi gambar harus 460px dan lebar 1920px. Pastikan ukuran gambar sesuai agar tampilannya optimal atau setelah upload edit terlebih dahulu dengan mengklik icon pensil.')
                        ->imageEditor()
                        ->disk('public')
                        ->directory('slider'),
                    Forms\Components\TextInput::make('button_text1')
                        ->placeholder('Masukan Teks Tombol')
                        ->label('Tombol Teks 1')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('button_link1')
                        ->placeholder('Masukan Link Tombol')
                        ->label('Tombol Link 1')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('button_text2')
                        ->placeholder('Masukan Teks Tombol')
                        ->label('Tombol Teks 2')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('button_link2')
                        ->placeholder('Masukan Link Tombol')
                        ->label('Tombol Link 2')
                        ->maxLength(255),
                    // ->default('center')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->reorderable('order')

        ->modifyQueryUsing(function (Builder $query) {
            // dump($recordId);

            return $query->orderBy('order', 'ASC');
        })
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->hidden(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->description)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_cover')
                    ->label('Gambar Cover'),
                Tables\Columns\TextColumn::make('button_text1')
                    ->label('Tombol Teks')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_link1')
                    ->label('Tombol Link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_text2')
                    ->label('Tombol Teks')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_link2')
                    ->label('Tombol Link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->label('Posisi Teks dan Tombol'),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
