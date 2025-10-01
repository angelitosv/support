<?php

namespace App\Filament\Resources\States\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('States for plates')
                    ->description('Set name to states')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                    ]),

            ]);
    }
}
