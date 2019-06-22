<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model 
{

    protected $table = 'connects';
     protected $fillable = array('address', 'text');
    
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsTo('Client');
    }

}