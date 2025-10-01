<?php

namespace App\Filament\Resources\Registers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RegisterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Working date from plates')
                    ->description('Set date and select plates to register')
                    ->columns(2)
                    ->schema([
                        DatePicker::make('work_date')
                            ->default(now())
                            ->required(),
                        Select::make('plate_id')
                        ->searchable()
                        ->relationship(name: 'plate', titleAttribute: 'plate')
                        ->preload()
                        ->required(),
                    ]),
            ]);
    }
}
