<?php

namespace App\Filament\Resources\Registers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RegistersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->heading('Register plates')
            ->description('Register support dates')
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('work_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('plate.plate')
                    ->label('Plate')
                    ->weight(FontWeight::Bold),
                TextColumn::make('plate.owner.name')->label('Owner'),
                TextColumn::make('plate.branch.name')->label('Branch'),
                
                TextColumn::make('plate.state.name')
                    ->label('State')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Registrada' => 'success',
                        'Desconocida' => 'danger',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
