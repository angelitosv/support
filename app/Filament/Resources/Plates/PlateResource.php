<?php

namespace App\Filament\Resources\Plates;

use App\Filament\Resources\Plates\Pages\CreatePlate;
use App\Filament\Resources\Plates\Pages\EditPlate;
use App\Filament\Resources\Plates\Pages\ListPlates;
use App\Filament\Resources\Plates\Schemas\PlateForm;
use App\Filament\Resources\Plates\Tables\PlatesTable;
use App\Models\Plate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PlateResource extends Resource
{
    protected static ?string $model = Plate::class;

    protected static ?string $navigationLabel = 'Plates';

    protected static string|UnitEnum|null $navigationGroup = 'Manage records';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QueueList;

    protected static ?string $recordTitleAttribute = 'plate';

    public static function form(Schema $schema): Schema
    {
        return PlateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlatesTable::configure($table);
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
            'index' => ListPlates::route('/'),
            'create' => CreatePlate::route('/create'),
            'edit' => EditPlate::route('/{record}/edit'),
        ];
    }
}
