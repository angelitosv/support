<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsPlate extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Plates registered', $this->getPlatesAuthorized()),
            Stat::make('Owners authorized', $this->getOwnersAuthorized()),
            Stat::make('Working dates', $this->getDatesWorked()),
        ];
    }

    protected function getPlatesAuthorized(): int
    {
        $totalPlates = DB::table('plates')->count();
        return $totalPlates;
    }

    protected function getOwnersAuthorized(): int
    {
        $totalOwners = DB::table('owners')->count();
        return $totalOwners;
    }

    protected function getDatesWorked(): int
    {
        $totalDates = DB::table('registers')->distinct('work_date')->count();
        return $totalDates;
    }

}
