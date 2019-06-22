<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
      protected $guarded = [];
    public $timestamps = true;

    public function catogery()
    {
        return $this->belongsTo('App\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('Client');
    }

}