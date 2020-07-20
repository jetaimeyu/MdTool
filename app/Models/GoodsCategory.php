<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    use ModelTree, AdminBuilder;
    //
    public function __construct()
    {
        $this->orderColumn='id';
        $this->parentColumn='pid';
        $this->titleColumn='name';

    }

    public function children()
    {
        return $this->hasMany(get_class($this), 'pid', 'id');
    }

    public function parent()
    {
        return $this->hasOne(get_class($this), 'id', 'pid');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
