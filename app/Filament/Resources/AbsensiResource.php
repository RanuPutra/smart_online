<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiResource\Pages;
use App\Models\Absensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    
    protected static ?string $navigationLabel = 'Absensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< HEAD
                    Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\Select::make('employee_id')
                                ->relationship('employee', 'nama')
                                ->required()
                                ->searchable()
                                ->preload(),
                            Forms\Components\Select::make('lokasi_id')
                                ->relationship('lokasi', 'nama_lokasi') // Ganti 'nama' menjadi 'nama_lokasi'
                                ->required()
                                ->searchable()
                                ->preload(),
                            Forms\Components\DateTimePicker::make('clock_in')
                                ->required(),
                            Forms\Components\DateTimePicker::make('clock_out'),
                            Forms\Components\TimePicker::make('overtime'),
                            Forms\Components\FileUpload::make('picture')
                                ->image()
                                ->directory('absensis'),
                            Forms\Components\Textarea::make('notes')
                                ->maxLength(65535)
                                ->columnSpanFull(),
                        ]) //endcard
            ]);  //endform
=======
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'nama')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('lokasi_id')
                    ->relationship('lokasi', 'nama_lokasi')
                    ->required()
                    ->searchable(),
                Forms\Components\DateTimePicker::make('clock_in')
                    ->nullable(), // Ubah required menjadi nullable
                Forms\Components\DateTimePicker::make('clock_out')
                    ->nullable(), // Tambahkan nullable
                Forms\Components\TimePicker::make('overtime')
                    ->nullable(),
                Forms\Components\FileUpload::make('picture')
                    ->image()
                    ->directory('absensis')
                    ->nullable(),
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535)
                    ->nullable()
                    ->columnSpanFull(),
            ]);
>>>>>>> 32aac47af41cda5da2c1fcd3ea900aa9b5cc707f
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                Tables\Columns\TextColumn::make('overtime'),
                Tables\Columns\ImageColumn::make('picture'),
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
