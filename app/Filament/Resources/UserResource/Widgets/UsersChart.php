<?php

namespace App\Filament\Resources\UserResource\Widgets;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{

    protected static ?string $heading = 'Users';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $genders = ['Female', 'Male']; // Define gender values

        $data = [];
        foreach ($genders as $gender) {
            $count = User::where('gender', $gender)->count(); // Count users for each gender
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data,
                //    'backgroundColor' => ['#ff6384', '#36a2eb'], 
                ],
            ],
            'labels' => $genders,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
