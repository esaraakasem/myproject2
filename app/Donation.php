<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model 
{

    protected $table = 'donations';
      protected $guarded = [];
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsTo('App\Client');
    }
public function city()
    {
        return $this->belongsTo('App\City');
    }
}