<?php

namespace App\Imports;

use App\Models\Supply;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SuppliersImport implements ToModel,WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Supply([
            'SupplyName' => $row[0],
            'SupplyNumber' => $row[1],
            'SupplyItemID' => $row[2],
            'Status' => $row[3],
            'MainFactoryCompID' => $row[4],
        ]);
    }

    public function startRow():int
    {
        return 2;
    }

}
