<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotExperience extends Model
{
    protected $table = 'experiencegained';

    public function botusers(){
        return $this->hasOne(BotUser::class, 'id');
    }

    public function skills(){
        return $this->hasOne(Skill::class, 'id');
    }
}
