<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;


use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Imports\EmployeeImporter;
use Filament\Actions\ImportAction;



class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}
    
    protected static ?string $navigationLabel = 'Karyawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('id_karyawan')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->required(),
                                Forms\Components\Select::make('jenis_kelamin')
                                    ->native(false)
                                    ->options([
                                        'Laki-laki' => 'Laki-laki',
                                        'Perempuan' => 'Perempuan',
                                    ])
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('jabatan'),
                                Forms\Components\TextInput::make('departemen'),
                            ]),

                        Forms\Components\TextInput::make('email')
                            ->email(),

                        Forms\Components\TextInput::make('nomor_telepon'),

                        Forms\Components\Textarea::make('alamat'),

                        Forms\Components\DatePicker::make('tanggal_bergabung')  
                            ->suffixIcon('heroicon-o-calendar') 
                            ->native(false),
                            
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('employees'),
                    ]) //endcard
            ]);  //endform
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto') 
                    ->disk('public') 
                    ->circular(),
                Tables\Columns\TextColumn::make('id_karyawan')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('departemen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('No. Telp'),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->label('Gender'),
                Tables\Columns\TextColumn::make('tanggal_bergabung')
                    ->date(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function  getNavigationLabel(): string
    {
        return __('Employee');
    }

    public static function  getPluralModelLabel(): string
    {
        return __('Data Employee');
    }

}
