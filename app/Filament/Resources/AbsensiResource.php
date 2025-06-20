<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiResource\Pages;
use App\Models\Absensi;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    
    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}

        
    protected static ?string $navigationLabel = 'Absensi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Select::make('employee_id')
                        ->relationship('employee', 'nama')
                        ->required()
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('lokasi_id')
                        ->relationship('lokasi', 'nama_lokasi')
                        ->required()
                        ->searchable()
                        ->preload(),

                    Forms\Components\DateTimePicker::make('clock_in')
                        ->nullable()
                        ->seconds(false),

                    Forms\Components\DateTimePicker::make('clock_out')
                        ->nullable()
                        ->seconds(false),
                    Forms\Components\TextInput::make('overtime')
                        ->disabled() // Read-only, karena dihitung otomatis
                        ->formatStateUsing(fn ($record) => $record?->overtime_hours),
                    Forms\Components\Textarea::make('notes')
                                ->maxLength(65535)
                                ->nullable()
                                ->columnSpanFull(),
                        ]) //endcard
            ]); //endform
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('employee.foto') // Reference employee's photo
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('employee.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi.nama_lokasi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clock_in')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clock_out')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('overtime_hours')->label('Overtime'),
                Tables\Columns\TextColumn::make('notes'),
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
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }

    public static function  getNavigationLabel(): string
    {
        return __('Absensi');
    }

    public static function  getPluralModelLabel(): string
    {
        return __('Data Absensi');
    }

}
