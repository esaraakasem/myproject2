<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Government extends Model 
{

    protected $table = 'governments';
      protected $fillable =array ('client_id','contain','government_name');
    public $timestamps = true;

    public function cities()
    {
        return $this->hasMany('City');
    }

}