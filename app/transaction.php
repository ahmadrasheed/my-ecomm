<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
    
    
     protected $fillable = [
        'title', 'title2','product_id','user_id'
    ];
    
}
