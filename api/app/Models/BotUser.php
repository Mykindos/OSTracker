<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class BotUser extends Model
{
    protected $fillable = ['username'];

    public function experience(){
        return $this->hasMany(BotExperience::class, 'botUserID');
    }

    public function runtime(){
        return $this->hasMany(BotRuntime::class, 'botUserID');
    }

    public function item(){
        return $this->hasMany(BotItem::class, 'botUserID');
    }

    public function logs(){
        return $this->hasMany(BotLog::class, 'botUserID');
    }
}
