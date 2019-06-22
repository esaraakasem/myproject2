<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloods extends Model 
{

    protected $table = 'bloods';
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsToMany('Client');
    }

}