<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public $timestamps = false;
    //

    public function experience(){
        return $this->hasMany(BotExperience::class, 'skillID');
    }
}
