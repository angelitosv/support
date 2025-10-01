<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Branch Information')
                    ->description('Description values')
                    ->columns(2)
                    ->schema([
                        TextInput::make('letter')
                            ->required(),
                        TextInput::make('name')
                            ->required(),
                    ]),
            ]);
    }
}
