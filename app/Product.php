<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','imagePath', 'title', 'description', 'price'];

    public function category(){

        return $this->belongsTo(Category::class);
    }


}
