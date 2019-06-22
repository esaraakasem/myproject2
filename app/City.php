<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
      protected $guarded = [];
    public $timestamps = true;

    public function government()
    {
        return $this->belongsTo('Government');
    }

    public function clients()
    {
        return $this->belongsToMany('Client');
    }
 public function donations()
    {
        return $this->belongsToMany('Donation');
    }
}