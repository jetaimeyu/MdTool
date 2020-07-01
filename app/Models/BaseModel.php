<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\dateTrait;

class BaseModel extends Model
{
    use dateTrait;
    //
//    public function serializeDate(\DateTimeInterface $dateTime)
//    {
//        return $dateTime->format($this->dateFormat ?: 'Y-m-d H:i:s');
//    }
}
