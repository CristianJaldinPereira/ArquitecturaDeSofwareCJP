<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HabitacionResource\Pages;
use App\Models\habitacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class HabitacionResource extends Resource
{
    protected static ?string $model = Habitacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('numero_habitacion')
                    ->label('Número de habitación')
                    ->required()
                    ->unique(table: 'habitacions', ignorable: fn ($record) => $record),

                Select::make('tipo_habitacion_id')
                    ->label('Tipo de habitación')
                    ->relationship('tipohabitacion', 'nombre')
                    ->required(),

                TextInput::make('precio_por_noche')
                    ->label('Precio por noche')
                    ->numeric()
                    ->required(),

                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'disponible' => 'Disponible',
                        'ocupado' => 'Ocupado',
                        'mantenimiento' => 'Mantenimiento',
                    ])
                    ->required(),

                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('numero_habitacion')->label('Número')->searchable()->sortable(),
                TextColumn::make('tipohabitacion.nombre')->label('Tipo')->sortable(),
                TextColumn::make('precio_por_noche')->label('Precio')->money('USD', true)->sortable(),
                TextColumn::make('estado')->sortable(),
                TextColumn::make('descripcion')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListHabitacions::route('/'),
            'create' => Pages\CreateHabitacion::route('/create'),
            'edit' => Pages\EditHabitacion::route('/{record}/edit'),
        ];
    }
}
