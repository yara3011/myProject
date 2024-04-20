<?php

namespace App\Filament\Resources\ProductResource\Widgets;
use App\Models\product;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ProductsChart extends ChartWidget
{
    protected static ?string $heading = 'Products';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $statuses = ['Alternative', 'Foreign']; // Define status values

        $data = [];
        foreach ($statuses as $status) {
            $count = Product::where('status', $status)->count(); // Count products for each status
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => $data,
                    'fill' => 'start',
                ],
            ],
            'labels' => $statuses,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
