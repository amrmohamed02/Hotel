<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $table="hotel";
    public function available()
    {
    
        return $this->hasMany('App\Model\Available');
       
    }
}
