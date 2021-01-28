<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $table = 'scripts';
    protected $fillable = ['name'];

    public function userScripts(){
        return $this->hasMany(UserScript::class, 'scriptID');
    }

    public function experience(){
        return $this->hasMany(BotExperience::class, 'scriptID');
    }

    public function runtime(){
        return $this->hasMany(BotRuntime::class, 'scriptID');
    }

    public function item(){
        return $this->hasMany(BotItem::class, 'scriptID');
    }

    public function logs(){
        return $this->hasMany(BotLog::class, 'scriptID');
    }
}
