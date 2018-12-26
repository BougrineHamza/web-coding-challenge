<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model 
{
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

   
}

