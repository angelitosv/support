<?php

namespace App\Filament\Resources\Plates\Pages;

use App\Filament\Resources\Plates\PlateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlate extends EditRecord
{
    protected static string $resource = PlateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
