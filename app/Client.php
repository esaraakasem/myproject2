<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
      protected $fillable = array('username', 'name_hospital', 'password', 'city_id','blood', 'phone',
         'age','number','addres','notices','api_token');
    
    public $timestamps = true;

    public function donations()
    {
        return $this->hasMany('Donation');
    }

     public function tokens()
    {
        return $this->hasMany('Token');
    }
    
    public function notifications()
    {
        return $this->belongsToMany('Notification');
    }

    public function cities()
    {
        return $this->belongsToMany('City');
    }

    public function blood()
    {
        return $this->belongsToMany('Bloods');
    }

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    public function reports()
    {
        return $this->hasMany('Report');
    }

    public function connect()
    {
        return $this->hasMany('Connect');
    }
    
     protected $hidden = [
        'password', 'api_token',
    ];

}