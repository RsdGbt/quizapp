<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class,'category_levels','level_id','category_id');
    }
    public function questions(){
        return $this->hasMany(Question::class,'level_id');
    }
}
