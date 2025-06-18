<?php

namespace App\Filament\Resources\PenalidadResource\Pages;

use App\Filament\Resources\PenalidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenalidads extends ListRecords
{
    protected static string $resource = PenalidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
