<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainFactory extends Model
{
    //
    public  $fillable=[
        'Name','CompID','Status'
    ];
    public function supplies()
    {
        return $this->hasMany('App\Models\Supply', 'MainFactoryCompID', 'CompID');
    }

    public function details()
    {
        return $this->hasMany('App\Models\Detail', 'MainCompID', 'CompID');
    }
}
