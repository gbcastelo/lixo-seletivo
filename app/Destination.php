<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes;

    protected $table = 'destination';

    public function trash()
    {
        return $this->belongsTo('App\Trash', 'id', 'destination_id');
    }
}
