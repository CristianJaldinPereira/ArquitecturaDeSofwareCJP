<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenalidadResource\Pages;
use App\Filament\Resources\PenalidadResource\RelationManagers;
use App\Models\Penalidad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenalidadResource extends Resource
{
    protected static ?string $model = Penalidad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Select::make('reserva_id')
            ->relationship('reserva', 'id') // puedes personalizar con más info
            ->label('Reserva'),
        Forms\Components\TextInput::make('motivo')->required(),
    ]);
}

public static function table(Tables\Table $table): Tables\Table
{
    return $table->columns([
        Tables\Columns\TextColumn::make('reserva.usuario.nombre')->label('Usuario'),
        Tables\Columns\TextColumn::make('motivo'),
        Tables\Columns\TextColumn::make('created_at')->since(),
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
            'index' => Pages\ListPenalidads::route('/'),
            'create' => Pages\CreatePenalidad::route('/create'),
            'edit' => Pages\EditPenalidad::route('/{record}/edit'),
        ];
    }
}
