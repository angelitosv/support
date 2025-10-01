<?php

namespace App\Filament\Resources\Plates\Pages;

use App\Filament\Resources\Plates\PlateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlates extends ListRecords
{
    protected static string $resource = PlateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
