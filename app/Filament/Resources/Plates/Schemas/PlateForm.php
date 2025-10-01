<?php

namespace App\Filament\Resources\Plates\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PlateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(
                [
                    'sm' => 1,
                    'xl' => 2,
                ]                
            )
            ->components([
                Section::make('Plate Information')
                    ->description('Set the Plate Number')
                    ->schema([
                        TextInput::make('plate')
                            ->required(),
                    ])
                    ->compact(),
                Section::make('Relation')
                    ->description('Set information')
                    ->columns(2)
                    ->schema([
                        Select::make('branch_id')
                            ->relationship(name: 'branch', titleAttribute: 'name')
                            ->preload()
                            ->live()
                            ->required(),

                        Select::make('owner_id')
                            ->relationship(name: 'owner', titleAttribute: 'name')
                            ->preload()
                            ->live()
                            ->required(),
                    ])
                    ->compact(),
                Section::make('Observation')
                    ->description('Additional information')
                    ->schema([
                        Select::make('state_id')
                            ->relationship(name: 'state', titleAttribute: 'name')
                            ->preload()
                            ->live()
                            ->required(),
                        Checkbox::make('active'),
                    ])
                    ->compact(),
            ]);
    }
}
