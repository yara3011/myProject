<?php

namespace App\Filament\Resources\ProductResource\Widgets;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductStatsOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

   

    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', $this->getPageTableQuery()->count()),
        ];
    }
    protected function getTablePage(): string
{
    return ListProducts::class;
}

}
