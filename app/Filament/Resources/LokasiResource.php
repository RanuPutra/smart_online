<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LokasiResource\Pages;
use App\Models\Lokasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LokasiResource extends Resource
{
    protected static ?string $model = Lokasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}
    
    protected static ?string $navigationLabel = 'Lokasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_lokasi')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('alamat')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]) //endcard
            ]); //endform
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lokasi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('absensis_count')
                    ->counts('absensis')
                    ->label('Total Absensi'),
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLokasis::route('/'),
            'create' => Pages\CreateLokasi::route('/create'),
            'edit' => Pages\EditLokasi::route('/{record}/edit'),
        ];
    }

    public static function  getNavigationLabel(): string
    {
        return __('Lokasi');
    }

    public static function  getPluralModelLabel(): string
    {
        return __('Data Lokasi');
    }

}
