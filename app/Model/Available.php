<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    public $table="available";
    public function hotel()
    {
        
            return $this->belongsTo('App\Model\Hotel');
       
    }
}
