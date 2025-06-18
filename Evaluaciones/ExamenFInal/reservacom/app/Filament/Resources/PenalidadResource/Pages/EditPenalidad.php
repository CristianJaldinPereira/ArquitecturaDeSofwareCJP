<?php

namespace App\Filament\Resources\PenalidadResource\Pages;

use App\Filament\Resources\PenalidadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenalidad extends EditRecord
{
    protected static string $resource = PenalidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
