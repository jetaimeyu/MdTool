<?php

namespace App\Imports\Member;

use App\Models\MainFactory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMainFactory implements ToModel,WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     * //    */
    public function model(array $row)
    {
        return new MainFactory([
            'Name'=>$row[0],
            'CompID'=>$row[1],
            'Status'=>$row[2]
        ]);
    }

    public function startRow():int
    {
        return 2;
    }
}
