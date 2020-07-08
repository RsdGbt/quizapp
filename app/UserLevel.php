<?php

namespace App;

use App\Model\Level;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }
}
