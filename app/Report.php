<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model 
{

    protected $table = 'reports';
   // protected $fillable=array('contain');
   protected $guarded = ['client_id'];
    
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsTo('Client');
    }

}