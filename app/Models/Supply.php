<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    public $fillable = [
        'SupplyName',
        'SupplyNumber',
        'SupplyItemID',
        'Status',
        'MainFactoryCompID',
        'Supporter',
        'SupporterType',
        'IsUsed',
        'Note',
        'SupplyCompID'
    ];

    //
    public function mainFactory()
    {
        return $this->belongsTo('App\Models\MainFactory', 'MainFactoryCompID', 'CompID');
    }
}
