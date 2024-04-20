<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCategories implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /*public function startRow(): int
    {
        return 2; // Skip (header row)
    }*/

    public function model(array $row)
    {   //dd($row);
        if (isset($row[0])){
            return new Category([
            "category"=> $row[0],
            "parent_category"=> $row[1]

        ]);
    }
}
}
