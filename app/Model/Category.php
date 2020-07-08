<?php

namespace App\Model;

use App\User;
use App\UserLevel;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function users(){
        return $this->belongsToMany(User::class,'category_users','category_id','user_id');
    }
    public function questions(){
        return $this->belongsToMany(Question::class,'question_categories','category_id','question_id');
    }
    public function levels(){
        return $this->belongsToMany(Level::class,'category_levels','category_id','level_id');
    }
}
