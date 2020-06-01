<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use softDeletes;

    protected $table = 'employee';

    public function trashs()
    {
        return $this->belongsToMany('App\Trash', 'employee_trash', 'employee_id', 'trash_id');
    }
}
