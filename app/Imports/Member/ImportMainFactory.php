<?php

namespace App\Imports\Member;

use App\Models\MainFactory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportMainFactory implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MainFactory([
            'Name'=>$row[0],
            'CompID'=>$row[1],
            'Status'=>$row[2]
        ]);
    }
    /**
     * 从第几行开始处理数据 就是不处理标题
     * @return int
     */
    public function startRow(): int
    {
       return 1;
    }
}
