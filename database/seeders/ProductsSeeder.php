<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProducts;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Excel::import(new ImportProducts, storage_path('app\products.xlsx'), null, \Maatwebsite\Excel\Excel::XLSX, ['products']);

    }
}
