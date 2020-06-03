<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //
    public function mainFactory()
    {
        return $this->belongsTo('App\Models\MainFactory','MainFactoryCompID', 'CompID');
    }
}
