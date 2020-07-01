<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/1 0001
 * Time: 上午 10:18
 */

namespace App\Models;


trait dateTrait
{
    public function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }
}