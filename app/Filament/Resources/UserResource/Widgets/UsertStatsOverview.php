<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Filament\Resources\UserResource\Pages\ListUsers;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageTable;


class UsertStatsOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

   
    protected function getStats(): array
    {
    return [
        Stat::make('Total Users', $this->getPageTableQuery()->count()),
    ];
}
protected function getTablePage(): string
{
return ListUsers::class;
}
}
