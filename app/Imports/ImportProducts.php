<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {//dd($row);
        if(isset($row[0]) && isset($row[1]) && isset($row[2]) && isset($row[3]) && isset($row[4]) && isset($row[5])){
        return new Product([
            "category_id" =>$row[0],
            "name_en"=>$row[1],
            "name_ar"=>$row[2],
            "country"=>$row[3],
            "logo"=>$row[4],
            "status"=>$row[5],
        ]);
    }
    }
}
