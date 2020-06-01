<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trash extends Model
{
    use softDeletes;

    protected $table = 'trash';

    protected $dates = ['date'];
    
    public function destination()
    {
        return $this->hasOne('App\Destination', 'id', 'destination_id');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Employee', 'employee_trash', 'trash_id', 'employee_id');
    }

    public function materials()
    {
        return $this->belongsToMany('App\Material', 'material_trash', 'trash_id', 'material_id');
    }
}
