<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EspacioResource\Pages;
use App\Filament\Resources\EspacioResource\RelationManagers;
use App\Models\Espacio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EspacioResource extends Resource
{
    protected static ?string $model = Espacio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\TextInput::make('nombre')->required(),
        Forms\Components\Textarea::make('descripcion'),
        Forms\Components\TextInput::make('capacidad')->numeric()->required(),
        Forms\Components\TextInput::make('ubicacion'),
        Forms\Components\Select::make('encargado_id')
            ->relationship('encargado', 'nombre')
            ->label('Encargado del Espacio'),
        Forms\Components\Textarea::make('horarios_permitidos')
            ->label('Horarios Permitidos (JSON)')
            ->placeholder('["08:00-12:00", "14:00-18:00"]')
            ->required(),
    ]);
}

    public static function table(Tables\Table $table): Tables\Table
{
    return $table->columns([
        Tables\Columns\TextColumn::make('nombre')->searchable(),
        Tables\Columns\TextColumn::make('capacidad'),
        Tables\Columns\TextColumn::make('ubicacion'),
        Tables\Columns\TextColumn::make('encargado.nombre')->label('Encargado'),
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
            'index' => Pages\ListEspacios::route('/'),
            'create' => Pages\CreateEspacio::route('/create'),
            'edit' => Pages\EditEspacio::route('/{record}/edit'),
        ];
    }
}
