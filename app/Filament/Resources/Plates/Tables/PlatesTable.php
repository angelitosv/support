<?php

namespace App\Filament\Resources\Plates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PlatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('plate')
                    ->weight(FontWeight::Bold)
                    ->searchable(),
                TextColumn::make('branch.name')->label('Branch'),
                TextColumn::make('owner.name')->label('Owner')
                    ->searchable(),
                TextColumn::make('state.name')->label('State')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'autorizada' => 'success',
                        'indefinida' => 'danger',
                    }),
                IconColumn::make('active')->boolean(),
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
                SelectFilter::make('owner.name')
                    ->label('Owner')
                    ->relationship('owner', 'name'),


            ])
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->join('owners', 'plates.owner_id', '=', 'owners.id')
                ->select('plates.*')
                ->orderBy('owners.name')
                ->orderBy('plates.plate')
            )
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
