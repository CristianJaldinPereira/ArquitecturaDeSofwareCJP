<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservaResource\Pages;
use App\Filament\Resources\ReservaResource\RelationManagers;
use App\Models\Reserva;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservaResource extends Resource
{
    protected static ?string $model = Reserva::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Select::make('usuario_id')->relationship('usuario', 'nombre')->required(),
        Forms\Components\Select::make('espacio_id')->relationship('espacio', 'nombre')->required(),
        Forms\Components\DateTimePicker::make('fecha_inicio')->required(),
        Forms\Components\DateTimePicker::make('fecha_fin')->required(),
        Forms\Components\Select::make('estado')->options([
            'pendiente' => 'Pendiente',
            'aprobada' => 'Aprobada',
            'rechazada' => 'Rechazada',
            'cancelada' => 'Cancelada',
        ])->required(),
        Forms\Components\Textarea::make('motivo_rechazo'),
    ]);
}

public static function table(Tables\Table $table): Tables\Table
{
    return $table->columns([
        Tables\Columns\TextColumn::make('usuario.nombre')->label('Residente'),
        Tables\Columns\TextColumn::make('espacio.nombre'),
        Tables\Columns\TextColumn::make('fecha_inicio')->dateTime(),
        Tables\Columns\TextColumn::make('estado')->badge(),
    ])->actions([
        Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListReservas::route('/'),
            'create' => Pages\CreateReserva::route('/create'),
            'edit' => Pages\EditReserva::route('/{record}/edit'),
        ];
    }
}
