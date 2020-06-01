<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use softDeletes;

    protected $table = 'material';

    public function trashs()
    {
        return $this->belongsToMany('App\Trash', 'material_trash', 'material_id', 'trash_id');
    }
}
