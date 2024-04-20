<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportAlternatives;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new ImportAlternatives, storage_path('app\product_alternative.xlsx'), null, \Maatwebsite\Excel\Excel::XLSX, ['product_alternative']);

    }
}
