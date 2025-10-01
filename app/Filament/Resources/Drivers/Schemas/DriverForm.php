<?php

namespace App\Filament\Resources\Drivers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->description('Get the information')
                    ->columns(2)
                    ->icon('heroicon-m-identification')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('document')
                            ->required(),
                        TextInput::make('license')
                            ->required(),
                        TextInput::make('phone')
                            ->tel()
                            ->required(),
                    ])
            ]);
    }
}
