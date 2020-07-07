<?php

namespace App\Model;

use App\Answer;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function category(){
        return $this->belongsToMany(Category::class,'question_categories');
    }
    public function answers(){
        return $this->hasMany(Answer::class,'question_id');
    }
    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }
}
