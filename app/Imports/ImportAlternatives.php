<?php

namespace App\Imports;

// use App\Models\Alternative;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB; 

class ImportAlternatives implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::table('product_alternative')->insert([
                'product_id' => $row[0],
                'alternative' => $row[1] === 'null' ? null : $row[1]
            ]);
        }
        return  null;
    }
}
